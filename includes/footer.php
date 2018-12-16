

		</div>
		<footer>
			<div class="socButton">
				Социальные кнопки
			</div>
			<div class="copy">
				Олег Лабан &copy; 2018
			</div>
			 <script src="<?php echo SITE_TEMPLATE_PATH ?>js/script.js"></script>
			 <script>

				 adaptiveFooter();
				 window.addEventListener("resize", adaptiveFooter, false);

			function adaptiveFooter(){
					 var conten =	document.querySelector(".content"), header =	document.querySelector("header"), footer =	document.querySelector("footer");


					var mt = conten.clientHeight + header.clientHeight + footer.clientHeight ;
					if(window.screen.height > mt){
						var martop = window.screen.height - mt;

						footer.style = "margin-top:" + martop + "px";
					}
				}

			 </script>

		</footer>
	</body>
</html>
