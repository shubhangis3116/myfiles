<?php
session_start();
include('config.php');
 if(isset($_POST['add-to-cart']))
 {
 	$stmt=$conn->prepare("INSERT INTO cart(name, price, image, quantity) VALUES(?,?,?,?)" );
 	$stmt->bind_param("sssi", $n,$p,$i,$q);
 	$n=$_POST['pname'];
 	$p=$_POST['pprice'];
 	$q=$_POST['pquant'];
 
 if(isset($_FILES['upload']))
	{
		$temp=$_FILES['upload']['tmp_name'];
		$nm=$_FILES['upload']['name'];
		if(move_uploaded_file($temp,"uploads/".$nm))
		{
			$i=$nm;

		}
	}
	$stmt->execute();
}
else if(isset($_GET['delid'])){

}

?>
 <!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
</head>
<body>
	<div id="wrapper">
	<h1>hello <i><?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];}?></i></h1>
	
		<div id="add_product_form">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype='multipart/form-data'>
			<label for="product_id">
				<span>Product ID</span> 
				<input type="text" name="product_id" value="<?php if(isset($_GET['e_id'])){echo $id11;}  ?>" id="product_id">
			</label>

			<label for="product_name">
				<span>Product Name</span> 
				<input type="text" name="product_name" value="<?php if(isset($_GET['e_id'])){echo $name11;}  ?>" id="product_name">
			</label>
			<label for="product_price">
				<span>Product Price</span> 
				<input type="text" name="product_price" id="product_price" value="<?php if(isset($_GET['e_id'])){echo $price11;}  ?>">
			</label>
			<label for="product_price">
				<span>Product Quantity</span> 
				<input type="text" name="product_quantity" id="product_quantity" value="<?php if(isset($_GET['e_id'])){echo $quantity11;}  ?>">
			</label>
			<label for="product_image">
				<span>Product Image</span> 
				<input type="file" name="imageToUpload" id="fileToUpload" value="<?php if(isset($_GET['e_id'])){echo '<img src=.$image11>';}  ?>">
			</label>
			<?php if(isset($_GET['e_id'])):?>
			<input type="hidden" name="edit_id_hidden" value="<?php echo $_GET['e_id']; ?>">
			<?php endif;?>
			<p class="submit">
			<?php if(isset($_GET["e_id"]))
			{
				echo 
				'<input type="submit" name="edit_product1" id="edit_product1" value="Update Details" style="background-color: #87BB40;">';

			}
			else{
			echo	'<input type="submit" name="add_product" id="add_product" value="show Product on page">';
			}
			
			?>	
			<input type="submit" background="url(logout.jpg)" name="logout" value="Logout">	
			</p>
			</form>
		</div>
		<div id="notification">
			
		</div>
		<div id="product_list">
		<table>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product Image</th>
				<th>Product Quantity</th>
				<th>Action</th>
			</tr>
		
			<?php foreach ($cart_array as $key => $value): ?>
				<tr>
				
				<td><?php echo $cart_array[$key]['id']; ?></td>
				<td><?php echo $cart_array[$key]['name']; ?></td>
				<td><?php echo $cart_array[$key]['price']; ?></td>
				<td><img src="<?php echo $cart_array[$key]['image']; ?>" height="64px" height="64px"></td>
				<td><?php echo $cart_array[$key]['quantity'];?></td>
				<td><a name="edit_link" href="cart.php?e_id=
				<?php echo $cart_array[$key]['id'];?>">  EDIT </a>
				<a name="delete_link" href="cart.php?d_id=
				<?php echo $cart_array[$key]['id'];?>"> DELETE </a></td>
				
				</tr>
				
			<?php endforeach ?>
			</table>
		</div>
		</div>
		</body>
		</html>
