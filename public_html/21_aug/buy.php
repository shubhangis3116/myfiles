<?php
session_start();

if(isset($_SESSION['uname']))
{
	echo "Thank You Mr. ".$_SESSION['uname']." for shopping with us";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
<a href="index.php">Home</a>

</body>
</html>
