<?php
 $lastAddStat = $db->prepare("SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 4");
 $lastAddStat->execute();
$lastAddStatF =  $lastAddStat->fetchAll();
?>
