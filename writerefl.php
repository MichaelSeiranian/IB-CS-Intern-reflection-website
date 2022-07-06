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
		<h2 class="header">Write Reflection</h2>
		<a href="index.php?logout='1'" class="logout">Log out</a>
	</div>
	<a href="index.php" class="backarrow"></a>

	<form action="writerefl.php" method="post">
		<textarea class="textbox" type="text" placeholder="Write your reflection here..." name="reflection"></textarea>
		<button type="submit" name="submit" class="button">Submit</button>
	</form>

</body>