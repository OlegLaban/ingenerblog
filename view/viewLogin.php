<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<form method="POST">
	<p id="outEr"></p>
	<label name="login">Введите ваш логин.</label><br>
	<input type="text" name="login" class="logIn" ><br>
	<label name="Пароль">Введите пароль.</label><br>
	<input type="password" name="password" class="logIn" ><br>
	<input type="hidden" name="csrf" class="logIn" value="<?php echo $csrf_token; ?>" >
	<input type="button"  id="subBut" value="Войти">
</form>
	<br>
<a href="restorePass.php">Забыли пароль?</a>
<script defer >
	var logInput = document.getElementsByClassName("logIn"), logInAr = [], p = document.getElementById("outEr");
	function logInVal(){

			for(var i = 0; i < logInput.length; i++ ){
				logInAr[i] = logInput[i].value;
			}

	}

	function funcSuccess(data){
		data = JSON.parse(data);
		if(data['bool'] == 0){
		 document.location.href = 'http://test3.local/'
		}else if(data['bool'] == 1){
				//console.log(data);
				p.style.color = "red";
				p.innerHTML = data['error'];
		}
	}

	$(document).ready(
		function(){

				console.log(logInAr);
				$("#subBut").bind("click", function(){
						logInVal();
						$.ajax({
								url: "../controllers/loginController.php",
								type: "POST",
								data:({ login: logInAr[0], password: logInAr[1], tokenCsrf:logInAr[2] }),
								dataType: "html",
								success: funcSuccess
							});
					});
		});

</script>
