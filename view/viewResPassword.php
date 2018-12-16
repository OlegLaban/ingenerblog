<form method="POST" id="restorePass" action="">
			<label><strong>Введите новый пароль</strong></label><br>
			<input id="restorePassInp" type="password" name="password"><br>
			<label><strong>Повторите новый пароль</strong></label><br>
			<input id="restorePassInp" type="password" name="RepeatPassword"><br>
			<input id="token_csrf" type="hidden" value="<?php echo $csrf_token; ?>" name="token_csrf">
			<button id="sub" type="submit" name="do_submit">Восстановить пароль</button><br>
</form>

