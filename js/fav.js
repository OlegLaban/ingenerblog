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

										if(butS.childNodes[1].src != '<?php echo $domain; ?>/img/icons/starSelect.png'){

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
														butS.childNodes[1].src = "/img/icons/starSelect.png";
													}
												}
												console.log(butS.childNodes[1].src);
										}else if(butS.childNodes[1].src != '<?php echo $domain; ?>/img/icons/star.png'){
											console.log("work");
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
												console.log(answerServer);
												if(answerServer['addFav']){
													butS.childNodes[1].src = "/img/icons/star.png";
												}
											}
										}
								}
