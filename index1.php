<?php include('server.php');
	//redirect to student home page if user isn't the teacher
	if ($_SESSION['email']!=$admin) {
		header('location: index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Intern's Portal</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<style type="text/css">
		.studentsbtn {
			margin-top: 15%;
			margin-left: 15%;
		}
		.prfl1btn {
			margin-top: 15%;
			margin-left: 55%;
			padding-top: 50px;
			padding-bottom: 50px;
		}
</style>
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
	<a class="buttonhome studentsbtn" href="students.php">Students and Reflections</a>
	<a class="buttonhome prfl1btn" href="profile1.php">Your Profile</a>
</body>
</html>