

<form method="POST">
				<p id="er" style="color:red;"></p>
				<p><strong>Введите ваше имя</strong></p>
				<input type="text" class="regInput" name="name" value=""><br>
				<p><strong>Введите Логин</strong></p>
				<input type="text" class="regInput" name="login" value=""><br>
				<p><strong>Введите ваш Email</strong></p>
				<input type="email" class="regInput" name="email" value="" ><br>
				<p><strong>Введите пароль</strong></p>
				<input type="password" class="regInput" name="password"><br>
				<p><strong>Повторите пароль</strong></p>
				<input type="password" class="regInput" name="passwordRepeat"><br>
				<input type="hidden" class="regInput" name="csrf" value="<?php echo $csrf_token; ?>">
				<button type="button" id="subBut" name="do_register" >Зарегистрироваться</button>
</form>
