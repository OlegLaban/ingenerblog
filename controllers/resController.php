<?php
	
	$form_key = 'res_pass_final';
	$token = htmlspecialchars($_GET['token']);
	$data = $_POST;
	$errors = [];
	if(isset($data['do_submit'])){
		if(hash_equals($data['token_csrf'], $_SESSION['csrf_' . $form_key])){
				if( empty($data['password']) ){
					$errors[] = "Введите пароль"; 
				}else if( empty($data['RepeatPassword']) ){
					$errors[] = "Введите пароль повторно";
				}else if( $data['password'] !== $data['RepeatPassword'] ){
						$errors[] = "Пароли не совпадают";
				}else if(strlen($data['password']) < 8){
					$errors[] = "Пароль должен быть не менее 8-ми символов";
				}
				
				if(!empty($errors)){
					echo array_shift($errors);
				}else{
					$resPassDb = $db->prepare("UPDATE `users` SET `token_res_pass` = NULL, `pass` = :pass WHERE `token_res_pass` = :token");
					$resPassDb->execute(
						array(
							':pass' => password_hash($data['password'], PASSWORD_DEFAULT),
							':token' => $token
						)
					);
					header("Location: /");
				}
		}
		
	
		
	} 
	
?>
