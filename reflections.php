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
	<link rel="stylesheet" type="text/css" href="style2.css">

</head>
<body>
	<div>
		<h2 class="header">Your Reflections</h2>
		<a href="index.php?logout='1'" class="logout">Log out</a>
	</div>
	<a href="index.php" class="backarrow"></a>

	<table class="reflections">
		<tr>
			<th>Reflection</th>
			<th>Date</th>
			<th>Feedback</th>
			<th>Date</th>
		</tr>
		<?php
			$email = $_SESSION['email'];
			$user = "SELECT userid FROM users WHERE email='$email'";
			$rowid = mysqli_fetch_assoc(mysqli_query($link, $user));
			$userid = $rowid['userid'];
			$sql = "SELECT reflectionID, reflection, dateandtime FROM reflections WHERE userid='$userid';";
			$result = mysqli_query($link, $sql);
			
			while ($row = $result-> fetch_array()) {
				$reflectionID = $row['reflectionID'];
				$sql1 = "SELECT feedback, dateandtime1 FROM feedbacks WHERE reflectionID1='$reflectionID'";
				$result1 = mysqli_query($link, $sql1);
				$row1 = $result1-> fetch_array();
				if (empty($row1["feedback"])) {
					$feedback = ''; 
					$dateandtime1 = '';
				}else{
					$feedback = $row1["feedback"];
					$dateandtime1 = $row1["dateandtime1"];
				}
				echo "<tr><td width=40%>". $row["reflection"] ."</td><td width=10%>". $row["dateandtime"] ."</td><td width=40%>". $feedback ."</td><td>". $dateandtime1 ."</td></tr>";
			}			
		?>
	</table>
	

</body>
</html>