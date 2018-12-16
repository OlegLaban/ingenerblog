<?php 
	$Cat = $db->query("SELECT * FROM `Cat`");
	$CatFetch = $Cat->fetchAll();
?>
