<form action="" method="post" style="margin-top: 3%; margin-left: 20%; margin-left: 20%;" >
	<table class="login">
		<tr>
			<td><h4>Авторизація</h4></td>
		</tr>
		<tr>
			<td><input type="text" name="login" placeholder="Логін"></td>
		</tr>
		<tr>
			<td><input type="password" name="password" placeholder="Пароль"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Вхід" name="btn"></td>
		</tr>
		<tr>
			<td>
				<?php extract($data); ?>
				<?php if($login_status=="access_denied") { ?>
				<p style="color:red;">Логін або пароль<br>введені невірно</p>
				<?php } ?>
			</td>
		</tr>
	</table>
</form>