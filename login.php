<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Intern's Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Sign in</h2>
	</div>

	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="text" name="email" placeholder="E-mail">
		</div>
		<div class="input-group">
			<input type="password" name="password" placeholder="Password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="button">Sign in</button>
		</div>
		<p>
			Don't have an account? <a href="register.php">Register</a>
		</p>
	</form>

</body>
</html>