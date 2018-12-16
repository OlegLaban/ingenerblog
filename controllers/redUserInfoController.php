<?php
$form_key = 'user_info';
if(isset($_SESSION['user'])){

  if (isset($_POST['doSub'])){
    if(hash_equals($_SESSION['csrf_' . $form_key], $_POST['csrf'])){
      $message = array();
      if(trim($_FILES['loadImgBut']['name']) !== ""){
        if(!($_FILES['loadImgBut']['size'] <= 200000 && $_FILES['loadImgBut']['size'] > 0)){
          $message[4] = "<span style='color:red;'>Размер файла не может превышать 200кб.</span>";
        }else if($_FILES['loadImgBut']['type'] != "image/jpeg" || $_FILES['loadImgBut']['type'] != "image/png" ){
            $message[4] = "Изображение должно быть в одном из представленных форматов (.jpg, .png)";
        }


        if(empty($message)){
          $name =  md5(uniqid(rand(), true));
          $tmp_name = $_FILES['loadImgBut']['tmp_name'];
          move_uploaded_file($tmp_name, "img/users/" . $name);
          $loadNewImg = $db->prepare("UPDATE `users` SET `img` = :img WHERE `id` = :id_user");
          $loadNewImg->execute(
            array(
              ':img' => htmlspecialchars($name),
              ':id_user' => (int) $_SESSION['user']['id']

            )
          );
          $_SESSION['user']['img'] = htmlspecialchars($name);
          $message[4] = "<span>Аватар изменен для того чтобы он изменился в 'шапке' обновите страницу.</span>";
        }

      }



        $data = $_POST;


        if(mb_strlen(trim($data['newName'])) <= 3){
          if(mb_strlen(trim($data['newName'])) == 0){
              $message[0] = "Вы не ввели имя.";
          }else{
            $message[0] = "Имя не может быть короче 3-х символов." . mb_strlen(trim($data['newName']));
          }

        }

        //проверка валидности логина
        if(mb_strlen(trim($data['newLogin'])) <= 3){

           if(mb_strlen(trim($data['newLogin'])) == 0){
               $message[1] = "Вы не ввели Login.";
           }else{
             $message[1] = "Логин не может быть короче 3-х символов.";
           }
        }else{
          //Проверяем зарегистрирван ли пользователь с таким логином в базе
          $Isset_Login_In_Db = $db->prepare("SELECT * FROM `users` WHERE `Login` = :login");

          $Isset_Login_In_Db->execute(
            array(
              ':login' => htmlspecialchars($data['newLogin'])
            )
          );

          $Isset_Login_In_DbF = $Isset_Login_In_Db->fetch();

          if($Isset_Login_In_DbF){
            if($Isset_Login_In_DbF['Login'] == $data['newLogin']){
               $message[2] = "Пользователь с таким логином уже существует.";
            }
          }
        }

      if(!isset($message[0])){
        // если имя прошло проверку на валидность изменяем его значение в базе
        $AddNewName = $db->prepare("UPDATE `users` SET `name` = :name WHERE `id` = :id_user ");
        $AddNewName->execute(
          array(
            ':id_user' => (int) $_SESSION['user']['id'],
            ':name' => htmlspecialchars($data['newName'])
          )
        );
          $message[0] = "Имя изменено";
      }

      if(!isset($message[1]) && !isset($message[2])){
        //Если логин прошел проверку на валидность изменяем его значение в базе
        $AddNewName = $db->prepare("UPDATE `users` SET `Login` = :login WHERE `id` = :id_user ");
        $AddNewName->execute(
          array(
            ':id_user' => (int) $_SESSION['user']['id'],
            ':login' => htmlspecialchars($data['newLogin'])
          )
        );
        $_SESSION['user']['login'] = htmlspecialchars($data['newLogin']);
        $message[1] = "Логин изменен";
      }
  }
}


}else{
  header("Location: /");
}



?>
