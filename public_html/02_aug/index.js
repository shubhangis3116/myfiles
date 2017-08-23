var item=new Array();
var cart = new Array();
var itm1=new Object();
	itm1.img = new Image();
    itm1.img.src =  "images/football.png";
	itm1.id =1;
	itm1.name = "Product101";
	itm1.price = 150.00;
	itm1.quantity = 1;
  
var itm2=new Object();
	itm2.img = new Image();
   itm2.img.src = "images/tennis.png";
	itm2.id =2;
	itm2.name = "Product102";
	itm2.price = 120.00;
	itm2.quantity = 1;

var itm3=new Object();
	itm3.img = new Image();
    itm3.img.src = "images/basketball.png";
	itm3.id =3;
	itm3.name = "Product103";
	itm3.price = 90.00;
	itm3.quantity = 1;

var itm4=new Object();
	itm4.img = new Image();
    itm4.img.src = "images/table-tennis.png";
	itm4.id =4;
	itm4.name = "Product104";
	itm4.price = 110.00;
	itm4.quantity = 1;

var itm5 = new Object();
	itm5.img = new Image();
   itm5.img.src = "images/soccer.png";
	itm5.id =5;
	itm5.name = "Product105";
	itm5.price = 80.00;
	itm5.quantity = 1;

item.push(itm1);
item.push(itm2);
item.push(itm3);
item.push(itm4);
item.push(itm5);
function addtocart(id1)
{
	var check=false;
	var k=0,n1=0;

		for(k=0;k<cart.length;k++)
		{
		if(cart[k].id==id1)
		{
			cart[k].quantity++;
			check=true;
			break;
		}
		}
		if(check==false)
		{
		  for(var j=0;j<item.length;j++)
		  {
		   if(item[j].id==id1)
		   {
			n1=j;
		   break;
		   }
	     }
	     cart.push(item[n1]);
	   }
	   
   var i;
	var table="<table><tr><th>Product Image</th> <th>Product Id</th> <th>Product Name</th><th>Product Price</th><th>Quantity</th> </tr>";
	for(i=0;i<cart.length;i++)
	{
		
	table+="<tr><td><img src="+cart[i].img.src+"></td><td>"+cart[i].id+"</td><td>"+cart[i].name+"</td><td>"+cart[i].price+"</td><td>"+cart[i].quantity+"</td></tr>";

     }
    table+="</table>";
	document.getElementById("table").innerHTML=table;
}
