<?php include 'includes/header.php'; ?>

				<?php include 'controllers/leftSidebarController.php'; ?>
				<div class="leftSidebar">
					<?php
						//функция для получения данных для вывода категории
						$catF = GetCategory();
						//функция для получения данных для вывода подкатегории
						$pod_catF = GetPodCategory();
					?>

					<?php
						//файл с html кодом (шаблон) для вывода информации на странице Левого сайдбара.
						include 'view/leftSidebarView.php';
					?>
				</div>

				<div class="articles">
					<?php
						include 'controllers/articlesControllers.php';
						$articlesF = getArticles();
					?>

					<?php include 'view/ArticlesView.php'; ?>
				</div>
				</div>
		<div class="pagin">
					<span class="pagginBut1">Назад</span>
					<span class="pagginBut2">Вперед</span>
		</div>

				<script>


					<?php		if(isset($_SESSION['user'])){ ?>
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
						<?php } ?>
				</script>
<?php include 'includes/footer.php'; ?>
