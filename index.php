<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<form action="login.php" method="post">
		<h2>اضافه کردن کاربر</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error">
				<?php echo $_GET['error']; ?>
			</p>
		<?php } ?>
		<label>نام</label>
		<input type="text" name="name" placeholder="Name"><br>
		<label>نام کاربری</label>
		<input type="text" name="username" placeholder="User Name"><br>

		<label>رمز عبور</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">اضافه</button>
	</form>
</body>

</html>