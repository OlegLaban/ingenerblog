<?php
require "configAdmin.php";
$data = $_GET;
 $delStat = $dbA->prepare("DELETE FROM `podCat` WHERE `id` = :id");
 $delStat->execute(
   array(
     ':id' => (int) $data['id_pod_Cat']
   )
 );
 header("Location: /admin/adminPodCat.php");
?>
