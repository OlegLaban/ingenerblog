<?php include 'includes/header.php'; ?>
				<div class="articles">
					<?php
						include 'controllers/IndexArticlesController.php';
						$articlesF = getArticles();
						include 'view/ArticlesView.php';
					?>
				</div>
				<div class="rigthSidebar">
					<?php require "controllers/PopArticlesController.php"; ?>
					<?php require "view/PopArticles.php"; ?>



				</div>
				</div>
		<div class="pagin">
					<span class="pagginBut1">Назад</span>
					<span class="pagginBut2">Вперед</span>
		</div>
		<script>




							var butStars =	$(".butStars");
						$(".butStars").bind("click", addFavorite);

							function addFavorite(){

										var idArt, objDataFavorite = {}, butS;
											for(var i = 0; i < butStars.length; i++){
												if(butStars[i].click){
														objDataFavorite['id_art'] = this.value;
														butS = this;
												}
											}
											console.log(butS.childNodes[0].src);
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

				</script>
<?php include 'includes/footer.php'; ?>
