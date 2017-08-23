var item=new Array();
var itm1=new Object();
    itm1.id=01;
    itm1.brand="a";
    itm1.name="abc";
var itm2=new Object();
    itm2.id=02;
    itm2.brand="b";
    itm2.name="cba";
   item.push(itm1);
   item.push(itm2);

function addproduct(){
  var i;

var table="<table><tr><th>Product id</th><th>Product brand</th><th>Product Name</th></tr>";
  for(i=0;i<item.length;i++)
  {
    
  table+="<tr><td>"+item[i].id+"</td><td>"+item[i].name+"</td><td>"+item[i].brand+"</td></tr>";

     }
    table+="</table>";
  document.getElementById("table").innerHTML=table;
}