<?php
require "../configAdmin.php";
$data = $_POST;
var_dump($data);

  $Array_add = $dbA->prepare("UPDATE `articles` SET `title_art` = :tit_art, `id_Cat` = :id_Cat, `id_pod_Cat` = :id_pod_Cat, `text_art` = :text_art, `img` = :img WHERE articles.id = :id_art");
$a =  $Array_add->execute(
    array(
      ':tit_art' => trim($data['nameArt']),
      ':id_Cat' => (int) $data['idCat'],
      ':id_pod_Cat' => (int) $data['idpodCat'],
      ':text_art' =>  trim($data['textArt']),
      ':img' =>  trim($data['imgArt']),
      ':id_art' => (int) $data['id_art']
    )
  );

  var_dump($a);
?>
