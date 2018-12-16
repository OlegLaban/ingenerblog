<?php require "../config.php"; ?>
<?php if(trim($_GET['token']) == ""){
		header("Location: /");
		die();
	}?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../style/style.css">
	</head>
	<body> 
		
		<?php require "../controllers/resController.php"; ?>
		<?php require "../controllers/CSRFresController.php"; ?>
		<?php require "../view/viewResPassword.php"; ?>
	</body>
</html>
