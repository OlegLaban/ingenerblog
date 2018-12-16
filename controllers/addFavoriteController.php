<?php
  require "../config.php";

  $data = $_POST;

  if(!empty($_SESSION['user'])){
    if($data['bool'] == "true"){

        $verify_Availability_entry = $db->prepare("SELECT `id_fav` FROM `FavoritesArt` WHERE `id_art` = :id_art AND `id_user` = :id_user");
        $verify_Availability_entry->execute(
          array(
            ':id_art' => (int) $data['id_art'],
            ':id_user' => (int) $_SESSION['user']['id']
          )
        );

        if(empty($verify_Availability_entry->fetch())){
          $addFavoriteArt = $db->prepare("INSERT INTO `FavoritesArt` (`id_fav`, `id_art`, `id_user`) VALUES (NULL, :id_art, :id_user)");
          $addFavoriteArt->execute(
            array(
              ':id_art' => (int) $data['id_art'],
              ':id_user' => (int) $_SESSION['user']['id']
            )
          );

          echo json_encode(array('addFav'=> "true"));

        }else{
          echo json_encode(array('addFav'=> "false"));
        }

    }else if($data['bool'] == "false"){
      $verify_Availability_entry = $db->prepare("SELECT `id_fav` FROM `FavoritesArt` WHERE `id_art` = :id_art AND `id_user` = :id_user");
      $verify_Availability_entry->execute(
        array(
          ':id_art' => (int) $data['id_art'],
          ':id_user' => (int) $_SESSION['user']['id']
        )
      );

      if(!empty($verify_Availability_entry->fetch())){
        $addFavoriteArt = $db->prepare("DELETE FROM `FavoritesArt` WHERE `id_art` = :id_art AND `id_user` = :id_user");
        $addFavoriteArt->execute(
          array(
            ':id_art' => (int) $data['id_art'],
            ':id_user' => (int) $_SESSION['user']['id']
          )
        );

        echo json_encode(array('addFav'=> "true"));

      }else{
        echo json_encode(array('addFav'=> "false"));
      }
    };
  }


?>
