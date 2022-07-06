<?php
	session_start();

	$email = "";
	$errors = array();
	$successfuls = array();
	$user = 'root';
	$pass = '';
	$db = 'website';

	$link = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	//establish connection with database
	
	$admin = 'alexander.klaiss@pbis.cz';


	//saves appropriate data in the table when register button is clicked
	if (isset($_POST['register'])) {
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password_1 = mysqli_real_escape_string($link, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($link, $_POST['password_2']);
		//ensures that the registration/login form is filled in properly
		if (empty($email)) {
			//adding the error messages to the errors array
			array_push($errors, "Please type in your email"); 
		}
		if (empty($password_1)) {
			//adding the error messages to the errors array
			array_push($errors, "Please type in a password"); 
		}

		if ($password_1 != $password_2) {
			array_push($errors, "The entered passwords do not match");
		}
		$emailused="SELECT * FROM users WHERE email='$email'";
        $result1=mysqli_query($link, $emailused);
        $count=mysqli_num_rows($result1);
        if($count>0) {
        	array_push($errors, "This e-mail has already been taken");
        }
		//if there are no errors then save details in table
		if (count($errors) == 0) {
			$password = sha1($password_1); // hashes password for security
			$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')"; // stores data in table
			mysqli_query($link, $sql);
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "Welcome to Intern's Portal $email";
			if ($email==$admin) {
					header('location: index1.php'); //redirect to admin home page 
			}
			else{
					header('location: index.php'); //redirect to home page
			}
		}
	}


	//login from login page
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);

		//errors when filling in
		if (empty($email)) {
			//adding the error messages to the errors array
			array_push($errors, "Please type in your email"); 
		}
		if (empty($password)) {
			//adding the error messages to the errors array
			array_push($errors, "Please type in your password");
		}

		if (count($errors) == 0) {
			$password = sha1($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$result = mysqli_query($link, $query);

			if (mysqli_num_rows($result) == 1) {
				//log user in
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "Welcome to Intern's Portal $email";
				if ($email==$admin) {
					header('location: index1.php'); //redirect to admin home page 
				}
				else{
					header('location: index.php'); //redirect to home page
				}
			}else{
				array_push($errors, "The email and/or password is incorrect");
			}
		}
	}


	//logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
		header('location: login.php');
	}


	if (isset($_POST['submit'])) {
		$email = $_SESSION['email'];
		$reflection = mysqli_real_escape_string($link, $_POST['reflection']);
		$user = "SELECT userid FROM users WHERE email='$email'";
		$row = mysqli_fetch_assoc(mysqli_query($link, $user));
		$userid = $row['userid'];
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO reflections (reflection, dateandtime, userid) VALUES ('$reflection', '$date', '$userid')";
		if (empty($reflection)) {
			//adding the error messages to the errors array
			array_push($errors, "Please type in a reflection"); 
		}
		else{
			$link->query($sql);
			array_push($successfuls, "Reflection successfully added");
		}
	}

	if (isset($_POST['changepassword'])) {
		$email = $_SESSION['email'];
		$oldpwd1=$_POST['oldpwd'];
		$oldpwd=sha1($oldpwd1);
		$newpwd=$_POST['newpwd'];
		$confirmpwd=$_POST['confirmpwd'];
		$newpwd1=sha1($newpwd);


		$query="SELECT password FROM users WHERE email='$email'";
		$result=mysqli_query($link, $query);
		while($row=mysqli_fetch_assoc($result)) {
			$pass=$row['password'];
			if (empty($oldpwd1) or empty($newpwd) or empty($confirmpwd)) {
				array_push($errors, "Please fill in the required fields");
			}
			elseif ($oldpwd==$pass) {
				if ($newpwd==$confirmpwd) {
					$updatequery="UPDATE users SET password='$newpwd1' WHERE email='$email'";
					$update=mysqli_query($link, $updatequery);
					array_push($successfuls, "Password changed successfully");
				}else{
					array_push($errors, "The entered passwords do not match");
				}

			}else{
				array_push($errors, "Old password is incorrect");
			}
		}		
	}
	if (isset($_POST['student'])) {
		$email = $_POST['email'];	
	}	

	
	if (isset($_POST['feedbacksubmit'])) {
		error_reporting(E_PARSE);
		$email = $_SESSION['email'];
		$reflectionID = $_SESSION['varname'];
		$feedback = mysqli_real_escape_string($link, $_POST['feedback']);
		$user = "SELECT userid FROM users WHERE email='$email'";
		$row = mysqli_fetch_assoc(mysqli_query($link, $user));
		$userid = $row['userid'];
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO feedbacks (feedback, dateandtime1, reflectionID1, userid) VALUES ('$feedback', '$date', '$reflectionID', '$userid')";
		if (empty($feedback)) {
			//adding the error messages to the errors array
			array_push($errors, "Please type in a reflection"); 
		}
		else{
			$link->query($sql);
			array_push($successfuls, "Feedback successfully added");
		}
	}

?>