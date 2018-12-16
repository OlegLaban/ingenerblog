<?php
if(isset($_SESSION['user'])){
  $articlesUser = $db->prepare("SELECT FavoritesArt.id_art, articles.id, articles.title_art, articles.id_Cat, articles.id_pod_Cat, articles.text_art, articles.img, Cat.title, podCat.title_pod_cat  FROM `FavoritesArt`  INNER JOIN `articles` ON (FavoritesArt.id_art = articles.id)
   INNER JOIN `Cat` ON (articles.id_Cat = Cat.id) INNER JOIN `podCat` ON articles.id_pod_Cat = podCat.id WHERE `id_user` = :id_user");
   $articlesUser->execute(
     array(
      ':id_user' => (int) $_SESSION['user']['id']
     )
   );
   $articlesUserF = $articlesUser->fetchAll();
   //var_dump($articlesUserF);
}else{
  header("Location: /");
}
?>
