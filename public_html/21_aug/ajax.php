<?php 
	session_start();
	$product=array();
	global $product;
	global $conn;

	$cart=array();
	

 function get_Product($productid)
		{
			include("config.php");
			 $product=array();
			 

   				 $stmt=$conn->prepare("SELECT * FROM products");
   				 $stmt->execute();
   				 $stmt->bind_result($id,$name,$price,$image);

   				 while($stmt->fetch())
				{
					array_push($product,array('id'=>$id,'name'=>$name, 'price'=>$price, 'image'=>$image));
				}
				return $product;
 				$stmt->close();

		}
  
function UpdateProduct($productid)
{

	$cart= $_SESSION["cart"];
	
    foreach ($cart as $key => $value){

		if($value['id']==$productid){

			$cart[$key]['quantity'] += 1;
			break;
		}
	}
	return $cart;
}



 
function ProductExistInCart($productid)
	{
		if(isset($_SESSION['cart']))
		{
		$cart=$_SESSION['cart'];
	       foreach ($cart as $key => $value) 
	       {
		   		if($value['id']==$productid)
		   		{
			
					return true;
					

				}

			}
			return false;
		}
	}
	

 if(isset($_POST['id'])){
		$id=$_POST['id'];
		
		$product=get_Product($id);
		foreach($product as $key=> $pro)
			
		 {
		 if($pro['id']==$productid)
			{
    			if(ProductExistInCart($productid))
				{
					$cart=UpdateProduct($productid);
					$_SESSION['cart']=$cart;
					echo json_encode(array('cart'=>$_SESSION["cart"]));
					
				}


				else
				{
					if(isset($_SESSION["cart"]))
					{
						$cart=$_SESSION["cart"];
					}
					 	$poduct['quantity']=1;
					 	$cart[]=$product;
						$_SESSION["cart"]=$cart;
					 	echo json_encode(array('cart'=>$_SESSION["cart"]));
					 	
							
				}
			}
		}
	}


if(isset($_POST['valueid'])){
	$valueid= $_POST['valueid'];
	$cart= $_SESSION["cart"];

	foreach ($cart as $key => $value) 
	{

	  	if($value['id']== $valueid)
	  	{

	  		unset($cart[$key]);
	  		sort($cart); 
			$_SESSION["cart"] = $cart;
			echo json_encode(array('cart'=>$_SESSION["cart"]));
		}
	}  	
}
if(isset($_POST['uid'])){

	$uid= $_POST['uid'];
	$cart= $_SESSION["cart"];

	foreach ($cart as $key => $d) {

	  	if($value['id']== $uid){

		  	$cart[$key]['quantity']= $_POST['qval'];
			
			$_SESSION["cart"] = $cart;
			echo json_encode(array('cart'=>$_SESSION["cart"]));
	  	}
	}  	
}

?>
