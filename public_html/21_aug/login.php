<?php
session_start();
include 'config.php';


if(isset($_POST["login"])){

	$count = 1;


	$stmt = $conn->prepare("SELECT * FROM users");
	$stmt->execute();
	$stmt->bind_result($id, $username, $password, $role);

	 while ($stmt->fetch()) {
	    
	    if($username==$_POST["uname"] && $password==$_POST["password"]){

	    
	    	$_SESSION["uname"]=$username;
	    	$_SESSION["role"]=$role;
	    	$count = 0;
	    	break;

	    }
	 }

	 if($count==0){
	 
	 	header("Location:index.php");
	 }

	 if($count==1){
	 	echo "Sorry! Please Register First!";
	 }
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form method="POST" action="">
	Username:<input type="text" name="uname" placeholder="Enter Username" >
	Password:<input type="pass" name="password">
	<input type="submit" name="login" value="Login">

</form>
<div>
	<a href="register.php">Register</a>
</div>
</body>
</html>