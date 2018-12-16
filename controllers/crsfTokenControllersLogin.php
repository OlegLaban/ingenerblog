<?php 
	$crsf_token = '';
	$form_key = 'Login_forms';
	if( version_compare(PHP_VERSION, '7.0.0', '>=') ){
		$csrf_token= bin2hex(random_bytes(32));
	}else{
			
			if( function_exists('mcrypt_create_iv') ){
				$csrf_token = bin2hex(mycrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			}else{
				$csrf_token = bin2hex(openssl_random_pseudo_bytes(32));
			}
			
		}
	$_SESSION['csrf_' . $form_key] = $csrf_token;
	

