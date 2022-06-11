<form action="" method="post" style="margin-top: 3%; margin-left: 20%; margin-left: 44%;" >
	<table class="registration">
		<tr>
			<td><h4>Реєстрація</h4></td>
		</tr>
		<tr>
			<td><input type="text" name="login" placeholder="Логін"></td>
		</tr>
		<tr>
			<td><input type="password" name="password" placeholder="Пароль"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Зберігти" name="btn"></td>
		</tr>
		<tr>
			<td>
				<?php extract($data); ?>
				<?php if($registration_status=="new_password") { ?>
				<p style="color:green">Зміна паролю<br>пройшла успішно.</p>
				<?php } elseif($registration_status=="access_denied") { ?>
				<p style="color:red">Відбулася помилка,<br>повторіть пізніше.</p>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>
				<p style="color:black"><?php echo ($data["secret"]); ?></p>
			</td>
		</tr>
		<tr>
			<td>
				<p><img style="text-align: center; margin-left: 5%;" src="<?php echo ($data["qrCodeUrl"]); ?>"></p>
			</td>
		</tr>
	</table>
</form>