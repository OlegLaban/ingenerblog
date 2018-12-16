<?php
  $config = [
    'host' => 'localhost',
    'dbname' => 'ingenerblog2',
    'user' => 'root',
    'passw' => '123'
  ];
  $dbA = new PDO("mysql:host=localhost;dbname={$config['dbname']}", $config['user'], $config['passw']);
  $dbA->exec("SET NAMES UTF8");
?>
