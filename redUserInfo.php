<?php
  require "includes/header.php";
  if(isset($_SESSION['user'])){
?>



<?php require 'controllers/redUserInfoController.php'; ?>

<?php require 'controllers/selectUserInfo.php'; ?>

<?php require 'controllers/CSRFuserController.php';  ?>

<?php require 'view/viewRedUserInfo.php'; ?>

<?php
}else{
  header("Location: /regLogin/login.php");
}
  require "includes/footer.php";
?>
