<?php include('server.php');
	//redirect to login page if user isn't logged in
	if ($_SESSION['email']!=$admin) {
		header('location: index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Intern's Portal</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div>
		<h2 class="header">Your Profile</h2>
		<a href="index1.php?logout='1'" class="logout">Log out</a>
	</div>
	<a href="index1.php" class="backarrow"></a>

	
	<div class="YourProfile">
		<h2>Change Password</h2>
	</div>
	<form method="post" action="profile1.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="password" name="oldpwd" placeholder="Old password">
		</div>
		<div class="input-group">
			<input type="password" name="newpwd" placeholder="New password">
		</div>
		<div class="input-group">
			<input type="password" name="confirmpwd" placeholder="Repeat new password">
		</div>
		<div class="input-group">
			<button type="submit" name="changepassword" class="button">Change Password</button>
		</div>
	</form>
		
</body>
</html>