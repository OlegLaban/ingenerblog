<?php foreach ($articlesF as $artArray){ ?>
					<div class="article">
						<img class="imgStat" src="/img/<?php echo $artArray['img']; ?>" alt="technical-drawing" >
						<h2 class="statName"><a href="/page/<?php echo $artArray['id']; ?>/"><?php echo $artArray['title_art']; ?></a></h2>
<button class="butStars" value="<?php echo $artArray['id'] ?>"><img src="<?php if(!empty($favArrF)) { if( in_array($artArray['id'], $favArrF['id_art'])){ echo '/img/icons/starSelect.png'; }else{ echo '/img/icons/star.png'; } }else{ echo '/img/icons/star.png'; } ?>" class="starsImg" alt="Добавить в избранное" title=" <?php if(!empty($favArrF)) { if( in_array($artArray['id'], $favArrF['id_art'])){ echo 'Убрать из избранного'; }else{ echo 'Добавить в избранное'; } }else{ echo "Добавить в избранное"; }?>  <?php if(!isset($_SESSION['user'])){ echo " (только для авторизованных пользователей)."; } ?>"></button>
						<p class="statInfo">Категория: <a href="/category/<?php echo $artArray['id_Cat']; ?>/"><span><?php echo $artArray['title']; ?></span></a></p>
						<p class="statInfo">Подкатегория: <a href="/podcategory/<?php echo $artArray['id_Cat']; ?>/<?php echo $artArray['id_pod_Cat']; ?>/"><span><?php echo $artArray['title_pod_cat']; ?></span></a></p>
						<p class="statInfo">Дата публикации: <span><?php echo $artArray['pub_date']; ?></span></p>
						<p class="statInfo">Колличество просмотров: <span><?php echo $artArray['views']; ?></span></p>
						<p class="textStat">
							<?php echo trim(mb_substr($artArray['text_art'], 0, 400)) . "... "; ?>
						 <a class="podr" href="/page/<?php echo $artArray['id']; ?>/"><strong>Подробнее</strong></a> </p>
						<div class="clear"></div>
					</div>
<?php } ?>
