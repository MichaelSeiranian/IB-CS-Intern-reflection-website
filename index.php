<?php include('server.php');
	//redirect to login page if user isn't logged in
	if (empty($_SESSION['email'])) {
		header('location: login.php');
	}
	if ($_SESSION['email']==$admin) {
		header('location: index1.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Intern's Portal</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

	<div>
		<h2 class="header">Home Page</h2>
		<a href="index.php?logout='1'" class="logout">Log out</a>
	</div>
	<div>
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		
		
	</div>
	<a class="buttonhome reflbtn" href="reflections.php">Your Reflections</a>
	<a class="buttonhome newreflbtn" href="writerefl.php">Write a New Reflection</a>
	<a class="buttonhome prflbtn" href="profile.php">Your Profile</a>
</body>
</html>