<?php
	$config = [
		'dbName' => 'ingenerblog2',
		'userDb' => 'root',
		'password' => '123',
		'serverName' => 'localhost',
		'AdminVkPage' => 'www.vk.com',
		'title' => 'IngenreBlog'
	];
	$domain = "http://test3.local";
	define('SITE_TEMPLATE_PATH', "http://test3.local/");
	$db = new PDO('mysql:host=localhost;dbname=ingenerblog2', 'root', '123');
	$db->exec("SET NAMES UTF8");
	session_start();
?>
