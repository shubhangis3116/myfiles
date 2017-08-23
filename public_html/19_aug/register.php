<?php
session_start();
include('config.php');

if(isset($_POST['register'])){


	$role= "user";

	$stmt = $conn->prepare("INSERT INTO userlogin (username, password, role) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $_POST['username'], $_POST['password'], $role);
	$stmt->execute();
	$stmt->close();
	
	echo "You Are Registered Successfully..!!";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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