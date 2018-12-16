<?php 
	require "../config.php";
	$form_key = 'resPass';
	
	$data = $_POST;
	if(isset($data['do_submit'])){
		if( hash_equals($_SESSION['csrf_' . $form_key], $data['token_csrf']) ){

			header("Location: /");
			if(!empty($data['email'])){
				 	
				function res_pass_f(){
						if( version_compare(PHP_VERSION, '7.0.0', '>=') ){
							$c= bin2hex(random_bytes(32));
						}else{

							if( function_exists('mcrypt_create_iv') ){
								$c = bin2hex(mycrypt_create_iv(32, MCRYPT_DEV_URANDOM));
							}else{
								$c = bin2hex(openssl_random_pseudo_bytes(32));
						}
					}
					return $c;
				}
				$tokenResPas = res_pass_f();
				$searchUser = $db->prepare("SELECT * FROM `users` WHERE `email` = :email");
				$searchUser->execute(
					array(
						':email' => trim($data['email'])
					)
				);
				$searchUserFetch = $searchUser->fetch();
				if(trim($searchUserFetch['email']) == trim($data['email'])){
					$searchUser = $db->prepare("UPDATE `users` SET `token_res_pass` = :tokenResPas WHERE `email` = :email");
					$searchUser->execute(
						array(
							':tokenResPas'=>trim($tokenResPas),
							':email' => trim($data['email'])
						)
					);
					include "../mail/mailRestorePass.php";
				}
			}
		}
	}
?>
