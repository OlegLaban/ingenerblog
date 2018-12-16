<?php
 require '../config.php';
 require '../controllers/crsfTokenControllersTrueEmail.php';
	// переменная с всеми данными из массива POST
	$data = $_POST;
	//фнкции для проверки на повоторение данных в базе данных
	// начинается проверка на CSRF атаку
	$form_key = 'sendmes_form';
if( hash_equals($_SESSION['csrf_' . $form_key], $data['tokenCsrf']) ){
	// она идет на все условие но сама проверка на этой строчке уже проведена и заканчивается там же где и скобка вышестоящего if

	function repeatData($dataF, $name_column){
			$dbFunc = $GLOBALS["db"];
			$data_of_data_base =  $dbFunc->prepare("SELECT * FROM `users` WHERE `$name_column` = :data");
			$data_of_data_base->execute(
				array(
					':data' => $dataF
				)
			);
			$data_of_data_base_feth = $data_of_data_base->fetchAll();
			if( !empty($data_of_data_base_feth) ){
				return $data_of_data_base_feth[0];
			}else{
				$dat = array();

				return $dat;
			}

	}

	//END проверки на повторение данных в базе.

		$errors = array();
		if ( empty(trim($data['name'])) ){
			$errors[] = "Введите ваше имя!";
		}else if( empty(trim($data['login'])) ){
			$errors[] = "Введите логин!";
		}else if(in_array(trim($data['login']), repeatData(trim($data['login']), "Login"))){
			$errors[] = "Пользователь с таким логином уже существует!";
		}else if( empty(trim($data['email'])) ){
			$errors[] = "Введите email!";
		}else if(in_array(trim($data['email']), repeatData(trim($data['email']), "email"))){
			$errors[] = "Пользователь с таким адресом электронной почты уже существует!";
		}else if( empty($data['password'])){
			$errors[] = "Введите пароль!";
		}else if(iconv_strlen($data['password']) < 8){
			$errors[] =  "Пароль должен быть длинной не менее восьми символов!";
		}else if( $data['password'] !== $data['passwordRepeat']){
			$errors[] = "Пароли не совпадают!";
		}


		if( !empty($errors) ){
			echo json_encode(array("bool" => 1, "error" => array($errors)));
		}else{

			$data['token'] = $True_email_token;
			$addUser = 	$db->prepare("INSERT INTO `users` (name, Login, email, pass, token, time) VALUES (:name, :login, :email, :pass, :token, :time)");
			$addUser->execute(
				array(
						':name' => htmlspecialchars(trim($data['name'])),
						':login' => htmlspecialchars(trim($data['login'])),
						':email' => htmlspecialchars(trim($data['email'])),
						':pass' => password_hash($data['password'], PASSWORD_DEFAULT),
						':token' => $data['token'],
						':time' => time()
					)
			);
			include "../mail/mail.php";

		}
	}else{
		echo json_encode(array("bool" => "1", "error" => "атака"));
	}


?>
