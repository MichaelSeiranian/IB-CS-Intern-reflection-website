<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Intern's Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="text" name="email" placeholder="E-mail">
		</div>
		<div class="input-group">
			<input type="password" name="password_1" placeholder="Password">
		</div>
		<div class="input-group">
			<input type="password" name="password_2" placeholder="Repeat Password">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="button">Register</button>
		</div>
		<p>
			Already have an account? <a href="login.php">Sign in</a>
		</p>
	</form>

</body>
</html>