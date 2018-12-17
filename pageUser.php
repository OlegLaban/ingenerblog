<?php
include 'includes/header.php';
if(isset($_SESSION['user'])){
 ?>

				<div class="leftSidebar">
				<div class="userInfo">
            <?php
              $usrInf = $db->prepare("SELECT `name` FROM `users` WHERE `id` = :id_user");
              $usrInf->execute(
                array(
                  ':id_user' => (int) $_SESSION['user']['id']
                )
              );
              $usrInfF = $usrInf->fetch();
             ?>
             <span><?php echo $usrInfF['name']; ?></span><br>
						<span><a href="/changeinfo/">Редактировать профиль</a></span>
				</div>
				</div>
				<?php require "controllers/articlesUserController.php"; ?>
				<div class="articles">
				<?php foreach ( $articlesUserF  as $articlesUserData ) {?>
					<div class="articleUser">
						<ul class="articlesInfo">
							<li><h2 class="statName"><a href="/page/<?php echo $articlesUserData['id_art']; ?>/"><?php echo $articlesUserData['title_art']; ?></a></h2></li>
							<li> <button class="butStars" value="<?php echo $articlesUserData['id_art']; ?>"><img class="star" src="/img/icons/starSelect.png" alt="star" title="Убрать из избранного"></button></li>
						</ul>
						<img class="imgStat" src="/img/<?php echo $articlesUserData['img']; ?>" alt="fasd">
							<ul class="artUserAtr">
								<li class="artUserAtrLi"><a class="statInfo" href="/category/<?php echo $articlesUserData['id_Cat']; ?>/"><?php echo $articlesUserData['title']; ?></a></li>
								<li class="artUserAtrLi"><a href="/podcategory/<?php echo $articlesUserData['id_Cat']; ?>/<?php echo $articlesUserData['id_pod_Cat']; ?>/"><?php echo $articlesUserData['title_pod_cat']; ?></a></li>
							</ul>
							<p><?php echo trim(mb_substr($articlesUserData['text_art'], 0, 400)) . "..."; ?>
						<a class="podr" href="/page/<?php echo $articlesUserData['id_art'];?>/"><strong>Подробнее</strong></a></p>
						<div class="clear"></div>
					</div>
				<?php } ?>
				</div>

        <script>


					<?php		if(isset($_SESSION['user'])){ ?>

							 var log = true;
						<?php }else{ ?>
								 var log = false;
					<?php } ?>



				var butStars =	$(".butStars");
					$(".butStars").bind("click", addFavorite);

						function addFavorite(){
								if(log){
									var idArt, objDataFavorite = {}, butS;
										for(var i = 0; i < butStars.length; i++){
											if(butStars[i].click){
													objDataFavorite['id_art'] = this.value;
													butS = this;
											}
										}
                      ;
										if(butS.childNodes[0].src != '<?php echo $domain; ?>/img/icons/starSelect.png'){

											objDataFavorite['bool'] = true;
												$.ajax({
													url: "/controllers/addFavoriteController.php",
													type: "POST",
													data:objDataFavorite,
													dataType:"html",
													success:addFavSuccess
												});
												function addFavSuccess(data) {
													var answerServer = JSON.parse(data);
													if(answerServer['addFav']){

														butS.childNodes[0].src = "/img/icons/starSelect.png";
														butS.childNodes[0].title = "Убарть из избранного";

													}
												}
										}else if(butS.childNodes[0].src != '<?php echo $domain; ?>/img/icons/star.png'){
											objDataFavorite['bool'] = false;
											$.ajax({
												url: "/controllers/addFavoriteController.php",
												type: "POST",
												data:objDataFavorite,
												dataType:"html",
												success:addFavSuccess
											});
											function addFavSuccess(data) {
												var answerServer = JSON.parse(data);
												if(answerServer['addFav']){

													butS.childNodes[0].src = "/img/icons/star.png";
													butS.childNodes[0].title = "Добавить в избарнное";
												}
											}
										}
								}

						}

				</script>


<?php

 include "includes/footer.php";
}else{
	header("Location: /404.php");
}
 ?>
