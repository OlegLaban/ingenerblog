<?php
require "configAdmin.php";
$data = $_GET;
 $delStat = $dbA->prepare("DELETE FROM `Cat` WHERE `id` = :id");
 $delStat->execute(
   array(
     ':id' => (int) $data['idCat']
   )
 );
 header("Location: /admin/adminCat.php");
?>
