<?php
			function getArticles(){

					$db_G = $GLOBALS['db'];
					$articles = $db_G->prepare("SELECT articles.id, articles.title_art, articles.id_Cat, articles.id_pod_Cat, articles.pub_date, articles.views, articles.text_art, articles.img, podCat.title_pod_cat, Cat.title FROM `articles` INNER JOIN `Cat` ON (articles.id_Cat = Cat.id) INNER JOIN `podCat`
					ON (articles.id_pod_Cat = podCat.id) ORDER BY `pub_date` DESC LIMIT 5 ");
					$articles->execute();
					$articlesFret = $articles->fetchAll();
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
				while ( $favArrFe = $favArr->fetch()) {
					$favArrF['id_fav'][] = $favArrFe['id_fav'];
					$favArrF['id_art'][] = $favArrFe['id_art'];
					$favArrF['id_user'][] = $favArrFe['id_user'];

				}
			}
