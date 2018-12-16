<?php 
	$True_email_token = '';
	if( version_compare(PHP_VERSION, '7.0.0', '>=') ){
		$True_email_token= bin2hex(random_bytes(32));
	}else{
			
			if( function_exists('mcrypt_create_iv') ){
				$True_email_token = bin2hex(mycrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			}else{
				$True_email_token = bin2hex(openssl_random_pseudo_bytes(32));
			}
			
		}	
?>
