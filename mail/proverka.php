<?php
	
	require '../config.php';
	$token = trim($_GET['token']);
	if($token != ""){	
			$prov = $db->prepare("UPDATE `users` SET TrueEmail = 1, token = NULL WHERE token = :token");
			$prov-> execute(
				array(
						':token' => $token
				)
			);
			
		}
		
		header("Location: /");
?>
