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
	<style>
    table a {color: black; text-decoration: none; }
  </style>
</head>
<body>
	<?php
	$email = $_GET['phpvar'];
		echo "
			<h2 class=header>Reflections of $email</h2>
			<a href=index1.php?logout='1' class=logout>Log out</a>"
		
	?>
	<a href="students.php" class="backarrow"></a>

	<table class="reflections">
		<tr>
			<th>Reflection</th>
			<th>Date</th>
			<th>Feedback</th>
			<th>Date</th>
		</tr>
		<?php
			$email = $_GET['phpvar'];
			$user = "SELECT userid FROM users WHERE email='$email'";
			$rowid = mysqli_fetch_assoc(mysqli_query($link, $user));
			$userid = $rowid['userid'];
			$sql = "SELECT reflectionID, reflection, dateandtime FROM reflections WHERE userid='$userid';";
			$result = mysqli_query($link, $sql);
			
			while ($row=mysqli_fetch_assoc($result)) {
				$reflectionID = $row['reflectionID'];
				$sql1 = "SELECT feedback, dateandtime1 FROM feedbacks WHERE reflectionID1='$reflectionID';";
				$result1 = mysqli_query($link, $sql1);
				$row1 = $result1-> fetch_array();
				if (empty($row1["feedback"])) {
					$feedback = ''; 
					$dateandtime1 = '';
				}else{
					$feedback = $row1["feedback"];
					$dateandtime1 = $row1["dateandtime1"];
				}
				echo "<tr><td width=40%><a href=feedback.php?getvalue=$row[reflectionID]>".$row["reflection"]."</a></td><td>".$row["dateandtime"]."</td><td width=40%>".$feedback."</td><td>".$dateandtime1."</td></tr>";
				
			}
		?>
	</table>
	

</body>
</html>