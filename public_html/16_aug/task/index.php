<?php 
	session_start();
	global $products;
	$cart=array();
    $products=array(
				"football"=>array(
								  "id"=>"101",
								  "name"=>"Product101",
								  "price"=>"$150",
								  "image"=>"football.png",

								  ),
							array(
								  "id"=>"102",
								  "name"=>"Product102",
								   "price"=>"$120",
								 "image"=>"tennis.png",
								),
							array(
								  "id"=>"103",
								  "name"=>"Product103",
								   "price"=>"$90",
								   "image"=>"basketball.png",
								),
							array(
								  "id"=>"104",
								  "name"=>"Product104",
								   "price"=>"$180",
								  "image"=>"table-tennis.png",
								),
							array(
								  "id"=>"105",
								  "name"=>"Product105",
								   "price"=>"$110",
								  "image"=>"soccer.png",
								),
		);
?>
<?php
function get_Product($productid)
{
	global $products;

	foreach($products as $key => $v)
	{
		
		if($v['id']==$id)
		{
			
			return $v;
			break;
		}
	}

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
					break;

				}

			}
			return false;
		}
	}
	

if(isset($_POST['productid']))
	{	
		$productid=$_POST['productid'];
		foreach($products as $key=> $v)
		 
		 if($v['id']==$productid)
			{
    			if(ProductExistInCart($productid))
				{
					$cart=$_SESSION['cart'];
					echo json_encode($cart);
			
				}

				else
				{
					if(isset($_SESSION["cart"]))
					{
					$cart=$_SESSION["cart"];
					}
					 	$cart=$v;
					$_SESSION["cart"]=$cart;
					 echo json_encode($_SESSION['cart']);
							
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
			 echo json_encode($_SESSION['cart']);
	  		

			
		}
	}  	
}

?>
