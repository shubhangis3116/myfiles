var products = [{
					"id": "100",
					"name": "iPhone 4S",
					"brand": "Apple",
					"os": "iOS"
				},
				{
					"id": "101",
					"name": "Moto X",
					"brand": "Motorola",
					"os": "Android"	
				},
				{
					"id": "102",
					"name": "iPhone 6",
					"brand": "Apple",
					"os": "iOS"
				},
				{
					"id": "103",
					"name": "Samsung Galaxy S",
					"brand": "Samsung",
					"os": "Android"
				},
				{
					"id": "104",
					"name": "Google Nexus",
					"brand": "ASUS",
					"os": "Android"
				},
				{
					"id": "105",
					"name": "Surface",
					"brand": "Microsoft",
					"os": "Windows"
				}];
     var  brands=[];
     var os=[];
     //To show table initially
$(document).ready(function(){
var html='<table><tr><th>Product_ID</th><th>Product_Name</th><th>Product_Brand</th><th>OS</th></tr>';
for(var i=0;i<products.length;i++)
{
	html+='<tr><td>'+products[i].id+'</td><td>'+products[i].name+'</td><td>'+products[i].brand+'</td><td>'+products[i].os+'</td></tr>';
}
html+='</table>';
$('#display').html(html);
});

//for brands dropdown list
for(var i=0;i<products.length;i++){
		if(brands.indexOf(products[i].brand)===-1){
			brands.push(products[i].brand);
		}
	}
console.log(brands.toString());
$(document).ready(function(){
var html='';
	html+='<select id="brands">Select Brand';
	for(var i=0;i<brands.length;i++){
		html+='<option value="'+brands[i]+'">'+brands[i]+'</option>';

	}
	html+='</select>';
	$('#wrapper').html(html);
//For filter by brand
	$('#wrapper').on('change','#brands',function(){
		var temp=this.value;
		
		var html='<table><tr><th>Product_ID</th><th>Product_Name</th><th>Product_Brand</th><th>OS</th></tr>';
		for(i=0;i<products.length;i++)
		{
			if(temp==0)
			{
				html+='<tr><td>'+products[i].id+'</td><td>'+products[i].name+'</td><td>'+products[i].brand+'</td><td>'+products[i].os+'</td></tr>';
			}
			if(temp==products[i].brand)
			{
				html+='<tr><td>'+products[i].id+'</td><td>'+products[i].name+'</td><td>'+products[i].brand+'</td><td>'+products[i].os+'</td></tr>';
			}
		}
		html+='</table>';
		$('#display').html(html);

	});

	
});
//for OS dropdown list
  for(var i=0;i<products.length;i++){
		if(os.indexOf(products[i].os)===-1){
			os.push(products[i].os);
		}
	}
	console.log(os.toString());
	$(document).ready(function(){

var html='';
	html+='<select id="os">';
	for(var i=0;i<os.length;i++){
		html+='<option value="'+os[i]+'">'+os[i]+'</option>';
}
	html+='</select>';
	$('#wrapper').append(html);

//for filter by OS	
	$("#wrapper").on('change','#os', function(){
  		
  		var temp2=this.value;
  		
  		var html= '<table><tr><th>Product_Id</th><th>Product_Name</th><th>Product_Brand</th><th>OS</th></tr>';

  	     for(var i = 0; i <products.length; i++)
    	{	
    		if(temp2==0)
    		{
    			html+= '<tr><td>'+products[i].id+'</td><td>'+products[i].name+'</td><td>'+products[i].brand+'</td><td>'+products[i].os+'</td></tr>';	
    		}
           if(temp2==products[i].os)
    		{
    		html+='<tr><td>'+products[i].id+'</td><td>'+products[i].name+'</td><td>'+products[i].brand+'</td><td>'+products[i].os+'</td></tr>';
  			}
  		}	
  		html+='</table>';
  		$("#display").html(html);
  	});
});
$("#new").append("<input type=text id='search'>");


	var html="";
	html+="<table><tr><th>ID</th><th>name</th><th>Brand</th><th>OS</th></tr>";
	for(var i=0;i<product.length;i++)
	{
		html+="<tr><td>"+product[i].id+"</td><td>"+product[i].name+"</td><td>"+product[i].brand+"</td><td >"+product[i].os+"</td></tr>";
	}
	html+="</table>";
	$("#display").html(html);



                
