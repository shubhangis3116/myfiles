<?php
session_start();
include('config.php');

if(isset($_POST['login'])){

	$flag=0;
	$stmt = $conn->prepare("SELECT * FROM userlogin");
	$stmt->execute();
	$stmt->bind_result($userName, $Password, $id, $Role);
	while($stmt->fetch())
		{
		if($userName==$_POST['username'] && $Password==$_POST['password'])
			{
				
				$_SESSION["username"]=$userName;
	    		$_SESSION["role"]=$Role;
	    		$flag=1;
				echo "Login Successfull!!!..Welcome".$userName;
			}
		}
				if($flag==1)
				{
					header("Location:index.php");
				}
				if($flag==0)
				{
					echo "Something Went wrong";
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
	Username:<input type="text" name="username" placeholder="Enter Username" >
	Password:<input type="password" name="password">
	<input type="submit" name="login" value="Login">

</form>
<div>
	<a href="register.php">Register</a>
</div>
<div>
	<a href="logout.php">Logout</a>
</div>
</body>
</html>