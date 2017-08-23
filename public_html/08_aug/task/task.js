var product=[];
  var psku;
   var pname;
   var pprice;
   var pquantity;
   var abc;
   function edit()
   {
    for(i=0;i<product.length;i++)
    { 
      if (i==abc) 
      {
        
        $("#product_sku").val(products[i].sku);
          $("#product_name").val(products[i].name);
          $("#product_price").val(products[i].price);
          $("#product_quantity").val(products[i].quantity);
      }
    }
    
}
  $(document).ready(function()
{
       $('.success').hide();
       $('.error').hide();
  

  $('#add_product').click(function()
  {
   
    psku=$('#product_sku').val();
    pname=$('#product_name').val();
    pprice=$('#product_price').val();
    pquantity=$('#product_quantity').val();
    
    product.push({id:psku, name:pname, price:pprice, quantity:pquantity});
    
   display();
    $('.success').show();
    $('.error').hide();
   });   
  function update()
{
     psku=$("#product_sku").val();
      pname=$("#product_name").val();
      pprice=$("#product_price").val();
      pquantity=$("#product_quantity").val();
      product[abc].sku=psku;
      product[abc].name=pname;
      product[abc].price=pprice;
      product[abc].quantity=pquantity;
      display();
}
   $(document).on('click', '.delete', function(pid){

       var c= confirm('Are you sure?');
      if(c==true){
      var del=$(this).data('pid');
      console.log("delete" +pid);
      for(i=0;i<product.length;i++)
        {
      if(del==product[i].id)
      product.splice(i,1);
      display();
      }

    }   
  
  }); 

  $(document).on('click','.edit',function(et)
  {
    et.preventDefault();
    var abc=$(this).data("id");
    edit();

  });
  
  $("#update_product").click(function()
  {
    update();
  });
});
    $('#add_product').val("Update Product");
    console.log("are you selecting the value?" +ID1);

  $(document).on('click', '#add_product', function(q)
  {
     for(i=0;i<product.length;i++)
       {
        if(product[i].sku==q)
       {
            $('#add_product').val("Update");
            $("#product_sku").val(product[i].sku);
            $("#product_name").val(product[i].name);
            $("#product_price").val(product[i].price);
            $("#product_quantity").val(product[i].quantity);
            product.splice(i,1);

        }
        }
    
  });




function display()
  {
  html=""; 
  html+="<tr> <th>SKU</th> <th>Name</th> <th>Price</th> <th>Quantity</th> <th>Action</th> </tr>"; 
    for(var i=0;i<product.length;i++)
    {
  html+="<tr><td>"+product[i].id+"</td> <td>"+product[i].name+"</td> <td>"+product[i].price+"</td> <td>"+product[i].quantity+"</td>";
  html+="<td> <a href='#' data-pid="+product[i].id+" class='edit' data-id="+i+">  Edit</a>";
  html+="<a href='#' data-pid="+product[i].id+" class='delete'>  Delete</a> </td> </tr>";
      }
      html+="</table>";
      $('#product_list').html(html);
   }

