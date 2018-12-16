<?php require "../config.php" ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Авторизация</title>
		<link rel="stylesheet" type="text/css" href="../style/style.css">
	</head>
	<body>
		<?php require '../controllers/crsfTokenControllersLogin.php' ?>
		<div class="register">
			<?php require '../view/viewLogin.php'; ?>
		</div>
	</body>
</html>
