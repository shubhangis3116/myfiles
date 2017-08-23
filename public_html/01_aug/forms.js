 var prd=[];
function addproduct()

{
	var product={ };
	       product.id=document.getElementById('pid').value;
	    product.name=document.getElementById('pname').value;
	product.price=document.getElementById('pprice').value;
  prd.push(product);

	     var html="<table><tr><th>Product ID</th><th>Product Name</th><th>Product Price</th></tr>";
	for(var i=0;i<prd.length;i++)
	{
		html+="<tr><td>"+prd[i].id+"</td><td>"+prd[i].name+"</td><td>"+prd[i].price+"</td></tr></table>";
	}


	document.getElementById('table').innerHTML=html;
}