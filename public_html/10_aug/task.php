<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$products = array(
                "Electronics" => array(
                                    "Television" => array(
                                                        array(
                                                            "id" => "PR001",
                                                            "name" => "MAX-001",
                                                            "brand" => "Samsung"
                                                        ),
                                                        array(
                                                            "id" => "PR002",
                                                            "name" => "BIG-301",
                                                            "brand" => "Bravia"
                                                        ),
                                                        array(
                                                            "id" => "PR003",
                                                            "name" => "APL-02",
                                                            "brand" => "Apple"
                                                        )
                                                    ),
                                    "Mobile" => array(
                                                        array(
                                                            "id" => "PR004",
                                                            "name" => "GT-1980",
                                                            "brand" => "Samsung"
                                                        ),
                                                        array(
                                                            "id" => "PR005",
                                                            "name" => "IG-5467",
                                                            "brand" => "Motorola"
                                                        ),
                                                        array(
                                                            "id" => "PR006",
                                                            "name" => "IP-8930",
                                                            "brand" => "Apple"
                                                        )
                                                    )
                                ),
                "Jewelry" => array(
                                    "Earrings" => array(
                                                        array(
                                                            "id" => "PR007",
                                                            "name" => "ER-001",
                                                            "brand" => "Chopard"
                                                        ),
                                                        array(
                                                            "id" => "PR008",
                                                            "name" => "ER-002",
                                                            "brand" => "Mikimoto"
                                                        ),
                                                        array(
                                                            "id" => "PR009",
                                                            "name" => "ER-003",
                                                            "brand" => "Bvlgari"
                                                        )
                                                    ),
                                    "Necklaces" => array(
                                                        array(
                                                            "id" => "PR010",
                                                            "name" => "NK-001",
                                                            "brand" => "Piaget"
                                                        ),
                                                        array(
                                                            "id" => "PR011",
                                                            "name" => "NK-002",
                                                            "brand" => "Graff"
                                                        ),
                                                        array(
                                                            "id" => "PR012",
                                                            "name" => "NK-003",
                                                            "brand" => "Tiffany"
                                                        )
                                                    )                
                
                                 )
                );
       
?>
<!--For showing in table -->
<table>
	<tr>
		<th>Category</th>
		<th>Subcategory</th>
		<th>ID</th>
		<th>Name</th>
		<th>Brand</th>
	</tr>

<?php         
	foreach ($products as $key => $Category)
	{
		foreach ($Category as $ky => $v)
		{
			foreach($v as $k => $v1)
			{
?>
	<tr>
		<td><?php echo $key?></td>
		<td><?php echo $ky;?></td>
		<td><?php echo $products[$key][$ky][$k]['id'];?></td>
		<td><?php echo $products[$key][$ky][$k]['name']?></td>
		<td><?php echo $products[$key][$ky][$k]['brand'];?></td>
	</tr>
	
<?php
		    }
				
					
		}
	}
	
?>
	</table><br><br>
	<!--for listing mobile subcategory-->
	<table>
		<tr>
	    	<th>Category</th>
			<th>Subcategory</th>
			<th>ID</th>
			<th>Name</th>
			<th>Brand</th>
			</tr>
<?php
	foreach ($products as $key => $Category)
	{
		foreach ($Category as $ky => $v)
		{
			foreach($v as $k => $v1)
			{ 
				if($ky=="Mobile")
				{
?>
	<tr>
		<td><?php echo $key?></td>
		<td><?php echo $ky?></td>
		<td><?php echo $products[$key][$ky][$k]['id'];?></td>
		<td><?php echo $products[$key][$ky][$k]['name']?></td>
		<td><?php echo $products[$key][$ky][$k]['brand'];?></td>
	</tr>
<?php
				}

			}
		}
	}
?>

	</table><br><br>
	<!--for mentioning the products of samsung -->
	<table>
<?php
	foreach ($products as $key => $Category)
	{
		foreach ($Category as $ky => $v)
		{
			foreach($v as $k => $v1)
			{ 
				if($products[$key][$ky][$k]['brand']=="Samsung")
				{
?>

					
					<tr><td>Product ID:<?php echo $products[$key][$ky][$k]['id'];?></td></tr>
					<tr><td>Product Name:<?php echo $products[$key][$ky][$k]['name'];?></td></tr>
					<tr><td>Category:<?php echo $key;?></td></tr>
					<tr><td>Subcategory:<?php echo $ky;?></td></tr>
					
<?php
				}
			}
		}
	}
?>
	</table><br><br>
	<!--for deleting PR003-->
	<table>
	<tr>
		<th>Category</th>
		<th>Subcategory</th>
		<th>ID</th>
		<th>Name</th>
		<th>Brand</th>
	</tr>
<?php         
	foreach ($products as $key => $Category)
	{
		foreach ($Category as $ky => $v)
		{
			foreach($v as $k => $v1)
			{
				if($products[$key][$ky][$k]['id']=="PR003")
				{
					unset($products[$key][$ky][$k]);
				}
			}
		}
	}
?>
<?php
foreach ($products as $key => $Category)
	{
		foreach ($Category as $ky => $v)
		{
			foreach($v as $k => $v1)
			{
				?>
	<tr>
		<td><?php echo $key?></td>
		<td><?php echo $ky;?></td>
		<td><?php echo $products[$key][$ky][$k]['id'];?></td>
		<td><?php echo $products[$key][$ky][$k]['name'];
		?></td>
		<td><?php echo $products[$key][$ky][$k]['brand'];?></td>
	</tr>
	
           <?php

			}
				
					
		}
	}
	
?>
	</table><br><br>
	<!--for updating BIG-555-->
	<table>
	<tr>
		<th>Category</th>
		<th>Subcategory</th>
		<th>ID</th>
		<th>Name</th>
		<th>Brand</th>
	</tr>
	<?php         
	foreach ($products as $key => $Category)
	{
		foreach ($Category as $ky => $v)
		{
			foreach($v as $k => $v1)
			{
				if($v1['id']=="PR002")
					{
					$products[$key][$ky][$k]['name']="BIG-555";
					}
			}
		}
	}

?>
<?php
			foreach ($products as $key => $Category)
			{
				foreach ($Category as $ky => $v)
				{
					foreach($v as $k => $v1)
						{
?>
	<tr>
		<td><?php echo $key?></td>
		<td><?php echo $ky;?></td>
		<td><?php echo $products[$key][$ky][$k]['id'];?></td>
		<td><?php echo $products[$key][$ky][$k]['name']?></td>
		<td><?php echo $products[$key][$ky][$k]['brand'];?></td>
	</tr>
 <?php

			  }
				
					
			}
		}
?>
	</table><br><br>
	</body>
	</html>