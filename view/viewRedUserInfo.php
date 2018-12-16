<?php if(isset($_SESSION['user'])){?>
<div id="wrap">
  <form method="post" action="" enctype="multipart/form-data">
 <?php echo @ $message[4]; ?>
    <div class="rowImg">
      <div><img class="userImgRed" src="/img/users/<?php echo $UserInfoArrF['img']; ?>" alt="Аватар"></div>
      <div class="textForImg">
        Вы можете изменить изображение загрузив новое.<br>
        Для этого нажмите на кнопку "загрузить файл" и выберите изображение на компьютере.<br>
        <div>
          <input type="file" name="loadImgBut" >
        </div>
      </div>

    </div>

    <div class="rowInfo">
        <span>Ваше Имя:</span><br>
        <input class="infoUsr" type="text" name="newName" value="<?php echo  @ $data['newName'];?>"> <?php  echo " " . @ $message[0]; ?><br>
        <span>Ваш логин:</span><br>
        <input class="infoUsr" type="text" name="newLogin" value="<?php echo  @ $data['newLogin'];?>"> <?php  echo " " . @ $message[1]; ?> <?php  echo " " . @$message[2];  ?><br>
        <input type="hidden" name="csrf" value="<?php echo $csrf_token; ?>">
    </div>
    <button class="usrInfoBut" type="submit" name="doSub">Сохранить</button>
  </form>
    <p>*Если вы хотите изменить только один параметр то просто оставте другие поля пустыми.</p>
    <span>*Для изменения пароля используйте функцию "забыли пароль" на странице <a href="/regLogin/login.php" title="авторизация">авторизации.</a></span>
</div>
<?php } ?>
