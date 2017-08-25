<?php 
session_start();
include('config.php');
global $conn;
$product=array();
$stmt=$conn->prepare("SELECT * FROM products");
$stmt->execute();
$stmt->bind_result($prid,$prname,$prprice,$primage);
while($stmt->fetch())
{

	    $id = $prid;
        $name = $prname;
        $price = $prprice;
        $image = $primage;
        array_push($product,array('id' => $id, 'name' => $name, 'price' => $price, 'image' => $image));
    }
?>
<!DOCTYPE html>
<html>
<head>
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
				<a href="checkout.php">Check Out</a>
			</div>
	</div>
	<div id="main">
		<div id="products">
		<?php
				foreach($product as $key=> $pro) :?>
	
			<div id="<?php echo $pro['name'];?>" class="product">
				<img src="images/<?php echo $pro['image'];?> ">
				<h3 class="title"><a href="#" ><?php echo $pro['name'];?></a></h3>
				<span><?php echo $pro['price'];?></span>
				<input type="button" data-id<?php echo $pro['id'];?> class="add-to-cart" value="Add To Cart">
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
		$(document).ready(function()
		{

			$(".add-to-cart").click(function(){
				<?php 
				if(isset($_SESSION['uname'])):?>

				$.ajax({
						method: "POST",
						url: "ajax.php",
						data:{id: $(this).data('id')},
						dataType:"json"
				})	

					.done(function(msg){
					var totalq=0;
					var totalp=0;
					for(var i=0;i<msg.cart.length; i++)
					{
						totalq=msg.cart[i].quantity;
						var m=msg.cart[i].quantity*msg.cart[i].price;
						totalp+=m;
					}	
					{
					var html='<tr><td>'+msg.cart[i].quantity+'</td><td>'+msg.cart[i].price+"</td></tr>";
					}
				html+='</table>';
				$('#show').html(html);

				<?php
		endif;
			?>
			});
		});
	});


	</script>
</body>
</html>