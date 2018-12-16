<?php
	 require '../config.php';

	//переменная с данными из массива POST
	$data = $_POST;
	 $form_key = 'Login_forms';
	if( hash_equals($_SESSION['csrf_' . $form_key], $data['tokenCsrf'])){

		$errors = array();

		function repeatData($dataF, $name_column){
			$dbFunc = $GLOBALS["db"];
			$data_of_data_base =  $dbFunc->prepare("SELECT * FROM `users` WHERE `$name_column` = :data");
			$data_of_data_base->execute(
				array(
					':data' => $dataF
				)
			);
			$data_of_data_base_feth = $data_of_data_base->fetchAll();
			if( empty($data_of_data_base_feth) ){

				return true;

			}else{
				return false;
			}

	}



		if( empty(trim($data['login'])) ){
			$errors[] = 'Введите логин';
		}else if(repeatData($data['login'], "Login")){
			//echo json_encode(array('bool' => 1, 'error' => "прошло" );
			//die();
			$errors[] = 'Пользователя с таким логином не существует';
		}else if( empty(trim($data['password'])) ){
				$errors[] = 'Введите пароль';
		}

		if( empty($errors) ){

				$login = $db->prepare("SELECT * FROM `users` WHERE Login = :login ");
				$login->execute(
					array(
						':login' => $data['login']
					)
				);
				$logDataFetch = $login->fetchAll();
				foreach($logDataFetch as $logD){}
				if( !password_verify($data['password'], $logD['pass'])){
					echo  json_encode(array("bool" => 1, "error" => 'Неверный пароль'));
				}else if (intval(trim($logD['TrueEmail'])) != 1){
					echo  json_encode(array("bool" => 1, "error" => 'Вы не подтвердили свой Email'));
				}else{
					$_SESSION['user']['id'] = $logD['id'];
					$_SESSION['user']['login'] = $logD['Login'];
					$_SESSION['user']['email'] = $logD['email'];
					$_SESSION['user']['time'] = $logD['time'];
					$_SESSION['user']['img'] = $logD['img'];
					echo  json_encode(array("bool" => 0));
				}

			}else{
					echo  json_encode(array("bool" => 1, "error" => array_shift($errors)));
			}


		}else{
			echo  json_encode(array("bool" => 1, "error" => "АТАКА"));
		}



?>
