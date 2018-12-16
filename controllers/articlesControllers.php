<?php

			function getArticles(){
			if( isset($_GET['id_podCat']) && isset($_GET['id']) ){
				$id = (int) htmlspecialchars($_GET['id']);
				$id_pod_cat = intval(htmlspecialchars($_GET['id_podCat']));
				if( $id == 0 || $id_pod_cat == 0 ){
					header("Location: /");
					die();
				}
				$db_G = $GLOBALS['db'];
				$articles = $db_G->prepare("SELECT articles.id, articles.title_art, articles.id_Cat, articles.id_pod_Cat, articles.pub_date, articles.views, articles.text_art, articles.img, podCat.title_pod_cat, Cat.title FROM `articles` INNER JOIN `Cat` ON (articles.id_Cat = Cat.id) INNER JOIN `podCat`
				ON (articles.id_pod_Cat = podCat.id) WHERE articles.id_pod_Cat = :id_podCat AND articles.id_Cat = :id ORDER BY `pub_date` DESC ");
				$articles->execute(
					array(
						':id' => $id,
						':id_podCat' => $id_pod_cat
					)
				);
				$articlesFret = $articles->fetchAll();
			}else if( isset($_GET['id']) ) {
				$id = intval(htmlspecialchars($_GET['id']));
				if( $id == 0 ){
					header("Location: /");
					die();
				}
				$db_G = $GLOBALS['db'];
				$articles = $db_G->prepare("SELECT articles.id, articles.title_art, articles.id_Cat, articles.id_pod_Cat, articles.pub_date, articles.views, articles.text_art, articles.img, podCat.title_pod_cat, Cat.title FROM `articles` INNER JOIN `Cat` ON (articles.id_Cat = Cat.id) INNER JOIN `podCat`
				ON (articles.id_pod_Cat = podCat.id)  WHERE articles.id_Cat = :id ORDER BY `pub_date` DESC ");
				$articles->execute(
					array(
						':id' => $id
					)
				);
				$articlesFret = $articles->fetchAll();
			}else{
					header("Location: /404.php");
					die();

			}



					return $articlesFret;
		}
		if(!empty($_SESSION['user'])){
			$db_G = $GLOBALS['db'];
			$favArr = $db_G->prepare("SELECT * FROM `FavoritesArt` WHERE `id_user` = :id_user");
			$favArr->execute(
				array(
					':id_user' => (int) $_SESSION['user']['id']
				)
			);
			while ($favArrFe = $favArr->fetch()) {
				$favArrF['id_fav'][] = $favArrFe['id_fav'];
				$favArrF['id_art'][] = $favArrFe['id_art'];
				$favArrF['id_user'][] = $favArrFe['id_user'];

			}
		}
