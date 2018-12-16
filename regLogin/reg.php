<?php require '../config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Регистрация</title>
		<link rel="stylesheet" type="text/css" href="../style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body>
		<header>
			<h2>Регистрация нового пользователя.</h2>
			<p>Для успешной регистрации введите данные в полях ниже и пройдите 'капчу'.</p>
		</header>
		<?php require '../controllers/crsfTokenControllersSF.php'; ?>
		<div>
			<div class="register">
				<?php require '../view/viewReg.php'; ?>
			</div>
		</div>
		<script defer src="../js/rege.js">

		</script>
	</body>
</html>
