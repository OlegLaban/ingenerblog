<?php
require 'config.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><? echo $config['title']; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_TEMPLATE_PATH;?>style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="wrapper">
			<header>
				<div class="logo">
					<a href="/"><img alt="ingenerBlog" src="<?php echo SITE_TEMPLATE_PATH;?>img/logo.png"></a>
				</div>
				<?php if(!isset($_SESSION['user'])){ ?>
				<div class="reg">
					<a href="/regLogin/reg.php">Регистрация</a>
					<a href="/regLogin/login.php">Авторизация</a>
				</div>
				<?php }else{ ?>
				<div class="reg">
				<img class="imgUserHead" src="/img/users/<?php echo $_SESSION['user']['img']; ?>" alt="userImage">
				<a class="userLoginHead" href="/user/" title="Перейти в личный кабинет." alt="Перейти в личный кабинет.">	<?php echo $_SESSION['user']['login']; ?>
					<a href="/regLogin/logout.php" title="Выйти">Выйти</a>
				</div>
				<?php } ?>
				<div class="quote"><p>Инженер - это тот человек, который делает из того, что есть то, что нужно.</p></div>
				<div class="clear"></div>
				<?php require 'controllers/menuController.php'; ?>
				<nav>
					<ul>
						<li><a href="/">Главная</a></li>
				<?php include 'view/menuView.php'; ?>
						<div class="clear"></div>
					</ul>
				</nav>
			</header>
			<div class="content">
