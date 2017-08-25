<?php
session_start();
include('config.php');
$role = "user";
	if(isset($_POST['register']))
	{
		$un = $_POST['username'];
		
		$stmt = $conn->prepare("SELECT id FROM users WHERE username='$un'");
	
		if(!$stmt)
		{
			echo "username already exists";
		}
		else {
				$sql = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
				$sql -> bind_param("sss", $_POST['username'], $_POST['password'], $role);
				$sql -> execute();
				echo "You are registered succesfull! Please Login Now!";
				$sql -> close();
			}
			$stmt->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="reg">
<form method="POST" action="" >
	Username:<input type="text" name="username" required>
	Password:<input type="password" name="password" required> 
	<input type="submit" name="register" value="Register">
</form>
</div>
<div>
	<a href="login.php">Login</a>
</div>
<div>
	<a href="logout.php">Logout</a>
</div>
</body>
</html>