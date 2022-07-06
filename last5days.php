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
	<div>
		<h2 class="header">Reflections of past 5 days</h2>
		<a href="index1.php?logout='1'" class="logout">Log out</a>
	</div>
	<a href="students.php" class="backarrow"></a>

	<table class="reflections">
		<tr>
			<th>Student</th>
			<th>Reflection</th>
			<th>Date</th>
			<th>Feedback</th>
			<th>Date</th>
		</tr>
		<?php
			$startdate = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"). '- 5 days'));
			$enddate = date("Y-m-d H:i:s");
			$sql = "SELECT * FROM reflections LEFT JOIN feedbacks on reflections.reflectionID = feedbacks.reflectionID1 LEFT JOIN users on reflections.userid = users.userid WHERE dateandtime  BETWEEN '$startdate' AND '$enddate'";
			$result = mysqli_query($link, $sql);
			while ($row=mysqli_fetch_array($result)) {
				$reflectionID = $row['reflectionID'];
				echo "<tr><td width=15%>".$row["email"]."</td><td width=32.5%><a href=feedback1.php?sendvalue=$reflectionID>".$row['reflection']."</a></td><td width=10%>".$row["dateandtime"]."</td><td width=32.5%>".$row["feedback"]."</td><td width=10%>".$row["dateandtime1"]."</td></tr>";
			}
		?>
	</table>
</body>
</html>