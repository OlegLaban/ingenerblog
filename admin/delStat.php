<?php
require "configAdmin.php";
$data = $_GET;
 $delStat = $dbA->prepare("DELETE FROM `articles` WHERE `id` = :id");
 $delStat->execute(
   array(
     ':id' => (int) $data['id']
   )
 );
 header("Location: /admin/");
?>
