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
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style type="text/css">
		.reflections1 { 
    		border: 3px inset #ff9933;
		    background-color: white;
		    width: 20%;
		    word-wrap: break-word;
		    margin-top: 100px;
		    margin-left: 20%;
		    text-align: center;
		}
		.buttonhome {
			width: auto;
			color: #ff9933;
			background: #ffe6cc;
			position: fixed;
			text-align: center;
			text-decoration: none;
			font-size: 60px;
			font-family: Georgia, serif;
			border: 3px solid orange;
			border-radius: 20px 20px 20px 20px;
			padding: 15px;
			margin-top: -20%;
			margin-left: 60%;
		}
		.buttonhome:hover{
			cursor: pointer;
			color: #e62e00;
			background: #ff944d;
			border-color: #e62e00;
			transition: 0.5s;
		}
	</style>
</head>
<body>
	<div>
		<h2 class="header">Students</h2>
		<a href="index1.php?logout='1'" class="logout">Log out</a>
	</div>
	<a href="index1.php" class="backarrow"></a>

	




	<table class="reflections1">
		<tr>
			<th>Students</th>
			
		</tr>
		<?php
			$email = $_SESSION['email'];
			$sql = "SELECT * FROM users WHERE email!='$email'";
			$result = mysqli_query($link, $sql);
			while($row=mysqli_fetch_assoc($result)) {
				echo "<tr><td><a href=reflections1.php?phpvar=$row[email]>".$row['email']."</a></td></tr>";
			}	
		?>	
	</table>
	<div>
		<a class="buttonhome" href="last5days.php">Last 5 days</a>
	</div>
</body>
</html>