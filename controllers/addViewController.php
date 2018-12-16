<?php
  $addViews =  $db->prepare("UPDATE `articles` SET `views` = `views` + 1 WHERE  `id` = :id ");
  $addViews->execute(
    array(
      ':id'=> (int) htmlspecialchars($_GET['id'])
    )
  );


?>
