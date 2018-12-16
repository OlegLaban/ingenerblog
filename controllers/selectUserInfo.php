<?php
if(isset($_SESSION['user'])){

  $UserInfoArr = $db->prepare("SELECT * FROM `users` WHERE `id` = :id_usr");
  $UserInfoArr->execute(
    array(
      ':id_usr' => (int) $_SESSION['user']['id']
    )
  );

   $UserInfoArrF = $UserInfoArr->fetch();

}

?>
