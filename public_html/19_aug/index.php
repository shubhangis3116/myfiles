<?php
session_start();
include("config.php");
/*to edit*/
if(isset($_GET['ide']))
		{
			$_SESSION['id1']=$_GET['ide'];
			$ide=$_GET['ide'];

			$stmt = $conn->prepare("SELECT * FROM product WHERE id=?");
			$stmt->bind_param("i", $ide);
			$stmt->execute();
	    	$stmt->bind_result($identity, $namess, $pricee, $immage);
			while ($stmt->fetch()) 
			{
				 $newname=$namess;
				 $newprice=$pricee;
			}
			$stmt->close();
		}

/*to delete */
if(isset($_GET['idd']))
    {
    	
   		$stmt = $conn->prepare("DELETE FROM product WHERE id=?");
		$stmt->bind_param("i", $_GET['idd']);
		$stmt->execute();
		$stmt->close();
		
	}
		

if(isset($_POST['submit1']))
{
	
	$stmt = $conn->prepare("INSERT INTO product(name, price, image) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $name, $price, $image);

	$name = $_POST['name'];
	$price = $_POST['price'];
	$image="";
	
if(isset($_FILES['upload']))
    {
        if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name']))
        {
            $image = $_FILES['upload']['name'];
        }
    }
	$stmt->execute();
}
$html="";

if(isset($_POST['update'])){
	$stmt = $conn->prepare("UPDATE product SET name=?, price=? WHERE id=?");
	$stmt->bind_param("ssi", $_POST['name'], $_POST['price'], $_SESSION['id1']);
	$stmt->execute();
	unset($_SESSION['id1']);
   	session_destroy();
	$_SESSION=[];


}
	$stmt=$conn->prepare("SELECT * FROM product");
		$stmt->execute();

	 $stmt->bind_result($id1, $nm, $prc, $img);
	  while($stmt->fetch())
	{
	  	
		$html .= "<tr><td> ".$id1." </td>   <td>".$nm."</td>  <td>".$prc."</td>  <td><img src=".$img."></td><td><a class='edit_class' href='index.php?ide=".$id1."' data-pid= ".$id1.">EDIT</a> <a class='delete_class' href='index.php?idd=".$id1."'  data-pid= ".$id1.">DELETE</a> </td></tr>";
    }
   
    	$stmt->close();
		$conn->close();


?>

<!DOCTYPE html>
<html>
<head>
	<title>jQuery</title>
	
</head>
<body>
<div id="wrapper">
	<form action="index.php" method="POST" enctype="multipart/form-data">
		Name:<input type="text" name="name" placeholder="Enter Name" value="<?php if(isset($_GET['ide'])){ echo $newname; } ?>" required><br>
		Price:<input type="text" name="price" placeholder="Enter Price" value="<?php if(isset($_GET['ide'])){ echo $newprice; } ?>" required><br>
		Image:<input type="file" name="upload">
				<?php  if(isset($_GET['ide'])){
					echo "<input type='submit' name='update' value='Update Product' >";

					}
					else{
						echo " <input type='submit' name='submit1' value='Submit' >";
					}


				?>

	</form>
	<div id="product_list">
			<table><br><br>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
				<tr>
					<?php 
					echo $html;

					?>
				</tr>
					
			</table>

		</div>
</div>
</body>
</html>