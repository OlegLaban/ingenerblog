<form method="POST" id="restorePass" action="../controllers/restorePassController.php">
			<label><strong>Введите email указаный <br> при регистрации аккаунта</strong></label><br>
			<input id="restorePassInp" type="email" name="email"><br>
			<input id="token_csrf" type="hidden" value="<?php echo $csrf_token; ?>" name="token_csrf">
			<button id="subBut" type="submit" name="do_submit">Восстановить пароль</button><br>
</form>
