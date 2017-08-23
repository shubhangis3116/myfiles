<?php 
session_start();
include('config.php');
$product=array();
$stmt=$conn->prepare("SELECT * FROM products");
$stmt->execute();
$stmt->bind_result($id,$name,$price,$image);
while($stmt->fetch())
{
	array_push($product,array('id'=>$id,'name'=>$name, 'price'=>$price, 'image'=>$image));
}
 
?>
<!DOCTYPE html>
<html>
<head>
<!-- hh -->
	<title>
		Products
	</title>
	<script src="jquery-3.2.1.min.js"></script>

	<link href="style.css" type="text/css" rel="stylesheet">
	
</head>
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		
			<div id="menu">
				<a href="login.php">Login</a>
				<a href="register.php">Register</a>
				
			</div>
	</div>
	<div id="main">
		<div id="products">
		<?php
				foreach($product as $key=> $pro) :?>
	
			<div id="<?php echo $pro['name'];?>" class="product">
				<img src="images/<?php echo $pro['image'];?> ">
				<h3 class="title"><a href="#"><?php echo $pro['name'];?></a></h3>
				<span><?php echo $pro['price'];?></span>
				<input type="button" data-id= <?php echo $pro['id'];?> class="add-to-cart" value="Add To Cart">
			</div>
			<?php  endforeach;  ?>	
		</div>
	</div>
	<div id="division">
		<table id="table"></table>
	</div>
	<div id="footer">
		<nav>
			<ul id="footer-links">
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Declaimers</a></li>
			</ul>
		</nav>
	</div>
	<div id="show">
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('.add-to-cart').click(function(){
				$.ajax({
						method: "POST",
						url: "ajax.php",
						data:{id: $(this).data('id')},
						//dataType:"json"
						})
			.done(function(msg){
				
				var html="";
				html ="<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Image</th></tr>";
				for(var i=0;i<msg.length; i++)
				{

					var html += "<tr><td>"+msg[i].quantity+"</td><td>"+msg[i].price+"</td></tr>";
				}
				html +="</table>";
				$('#show').html(html);

			});
			
			});
		});


	</script>
</body>
</html>