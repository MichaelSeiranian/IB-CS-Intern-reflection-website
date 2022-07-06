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
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div>
		<h2 class="header">Write Feedback</h2>
		<a href="index.php?logout='1'" class="logout">Log out</a>
	</div>
	<a href="students.php" class="backarrow"></a>
	<?php $reflectionID1 = $_GET['getvalue'];
	$_SESSION['varname'] = $reflectionID1; ?>
	<form action="feedback.php" method="post">	
		<textarea class="textbox" type="text" placeholder="Write feedback here..." name="feedback"></textarea>
		<button type="submit" name="feedbacksubmit" class="button">Submit</button>
	</form>

</body>