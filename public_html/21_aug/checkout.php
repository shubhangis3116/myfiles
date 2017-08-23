<?php
session_start();
include('config.php');
global $conn;

if(isset($_POST['buy']))
{
	$stmt=$conn->prepare("INSERT INTO orders(username,date,time,totalcost,quantity) VALUES(?,?,?,?,?)");
	$stmt->bind_param("sssss", $username, $date, $time, $totalcost, $quantity);
	$username=$_SESSION['uname'];
	$date=date('Y/m/d');
	$time=time('H:i:s');
	$quantity=json_encode($_SESSION['cart']);

	$stmt->execute();
	$stmt->close();

	header("Location:buy.php");


}

?>
<!DOCTYPE html>
<html>
<head>
	<script src="jquery-3.2.1.min.js"></script>
	<title>Check_Out</title>
</head>
<body>
<div>
<form method="POST" action="">
<input type="submit" name="buy" value="Buy Now">
</form>
</div>


	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Image</th>
			<th>Action</th>
		</tr>

		<?php
		if(isset($_SESSION['cart']))
		{
			$totalp=0;
			

		foreach($_SESSION['cart'] as $key=> $value):
				$m = $value['quantity'] * $value['price']; 
				$totalp += $m;
			?>
						<tr>
							<td><?php echo $value['id'];?></td>
							<td><?php echo $value['name'];?></td>
							<td><?php echo $value['price'];?></td>
							<td><?php echo $value['quantity'];?></td>
							<td><?php echo $value['image'];?></td>
							
							
							
							<td><input type = "number" data-id ="<?php echo $value['id'];?>" class = "new" value = "<?php echo $value['quantity'];?>">Update</td>
							<td><a class = 'remove' href = '' data-id = "<?php echo $value['id'];?>">Delete</a></td>
							<td><a class = 'update' href = '' data-id = "<?php echo $value['id'];?>">Update</a></td>
						</tr>
					<?php 
				endforeach;
					?>
				</table>
				<?php 
		}?>
		<!--
		<script type="text/javascript">
		$(document).on('click', '.remove', function(){

			
			$.ajax({
				method: "POST",
				url: "ajax.php",
				data: {id:$(this).data('id')},
				dataType: "json"
			})
		});
			$(document).on('click', '.update', function(){

			
			$.ajax({
				method: "POST",
				url: "ajax.php",
				data: {uid:$(this).data('id'), qval: $(this).parent().parent().find(".new").val()},
				dataType: "json"
			})
		});

	</script>
	-->
	
	<div>
	<a href="main.php">Go Back</a>
	</div>

</body>
</html>