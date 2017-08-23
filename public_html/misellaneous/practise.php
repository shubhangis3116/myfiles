<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	Name:<input type="text" name="name" placeholder="Enter Name"><br>
	Address:<input type="text" name="address" placeholder="Enter Address"><br>
	<input type="submit" name="submit">
</form>
<?php
$name=$address=$email=$gender="";
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
			$name=$_POST['name'];
			if(empty($name))
			{
				
				echo "Enter name";
				
			}
			else
				echo "<pre>";
				echo $name;
			    echo "</pre>";
		
		$address=$_POST['address'];
			if(empty($address))
			{
				
				echo "Enter Address";
				
			}
			else
				echo "<pre>";
				echo $address;
			    echo "</pre>";
			}

		
?>

</body>
</html>