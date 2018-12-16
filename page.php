<?php require "includes/header.php"; ?>
			
					<div class="articles articlePage">
					<?php $article_array = $db->prepare(" SELECT articles.title_art, articles.id_Cat, articles.id_pod_Cat, articles.pub_date, articles.views, articles.text_art, articles.img, Cat.title, podCat.title_pod_cat FROM `articles` INNER JOIN `Cat` ON (articles.id_Cat = Cat.id) INNER JOIN `podCat`
					ON  (articles.id_pod_Cat = podCat.id) WHERE articles.id = :id");
						$article_array->execute(
								array(
									':id' => (int) htmlspecialchars($_GET['id']),
								)
							);
							$article_arrayF = $article_array->fetch();
					?>
					<div class="breadCamp">
					<a href="/category/<?php echo $article_arrayF['id_Cat'];?>/"><?php echo $article_arrayF['title']; ?></a>><a href="/podcategory/<?php echo $article_arrayF['id_Cat'];?>/<?php echo $article_arrayF['id_pod_Cat'] ;?>/"><?php echo $article_arrayF['title_pod_cat']; ?></a>
					</div>
					<div class="article">
						<h2><?php echo $article_arrayF['title_art'];?></h2>
						<img class="imgStat" src="/img/<?php echo $article_arrayF['img']; ?>" alt="<?php echo $article_arrayF['title']; ?>">
						<div class="atrStat">
							<p class="MyColor">Дата: </p><p><?php echo $article_arrayF['pub_date']; ?></p><br>
							<p class="MyColor">Кол-во просмотров:  </p> <p><?php echo $article_arrayF['views']; ?></p>
						</div>
						<p>
							<?php echo $article_arrayF['text_art']; ?>
						</p>
					</div>
<?php require "controllers/addViewController.php"; ?>
<?php require "includes/footer.php" ?>
