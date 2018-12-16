<?php
require "../configAdmin.php";
$data = $_POST;

var_dump($data);
  $Array_add = $dbA->prepare("INSERT INTO `articles`  (`title_art`, `id_Cat`, `id_pod_Cat`, `text_art`, `img`) VALUES (:tit_art, :id_Cat, :id_pod_Cat, :text_art, :img)");
  $Array_add->execute(
    array(
      ':tit_art' => trim($data['nameArt']),
      ':id_Cat' => (int) $data['idCat'],
      ':id_pod_Cat' => (int) $data['idpodCat'],
      ':text_art' =>  trim($data['text']),
      ':img' =>  trim($data['imgArt']),
    )
  );
?>
