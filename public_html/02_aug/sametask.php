<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$products=array(
				"Football"=>array(
								  "id"=>"1",
								  "name"=>"Product101",
								  "price"=>"$150.00",
								  "quantity"=>"1",
								  ),
							array(
								  "id"=>"2",
								  "name"=>"Product102",
								  "price"=>"$120.00",
								  "quantity"=>"1",
								),
							array(
								  "id"=>"3",
								  "name"=>"Product103",
								  "price"=>"$90.00",
								  "quantity"=>"1",
								),
							array(
								  "id"=>"4",
								  "name"=>"Product104",
								  "price"=>"$110.00",
								  "quantity"=>"1",
								),
							array(
								  "id"=>"5",
								  "name"=>"Product105",
								  "price"=>"$80.00",
								  "quantity"=>"1",
								),
		);
	

?>
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		
	</tr>
	<?php         
	foreach ($products as $key => $value)
	{
		
?>
<tr>
		<td><?php echo $products[$key]['id'];?></td>
		<td><?php echo $products[$key]['name'];?></td>
		<td><?php echo $products[$key]['price']?></td>
		<td><?php echo $products[$key]['quantity']?></td>
		
</tr>
	<?php
		    }

?>
	</table>
	</body>
	</html>