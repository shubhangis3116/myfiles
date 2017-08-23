$(document).ready(function(){

  var current_entry='';
  var oprt='';
  var result='';
  
  $(".number").click(function(){
  current_entry+=$(this).val();
    $("#Result").val(current_entry);
  
  });

  $(".operator").click(function(){
    oprt=$(this).val();
    result=current_entry;
    current_entry="";
    
  });

  
  $(".equal").click(function(){
    if(oprt=="")
    {
      result=current_entry;
    }
  
    else if( oprt=="+")
    {
      result=parseInt(result)+parseInt(current_entry);
      $("#Result").val(result);
      
    }
    else if( oprt=="-")
    {
      result=parseInt(result)-parseInt(current_entry);
      $("#Result").val(result);
    }
    

    else if( oprt=="*")
    {
      result=parseInt(result)*parseInt(current_entry);
      $("#Result").val(result);

    }
    
    else if( oprt=="/")
    {
      result=parseInt(result)/parseInt(current_entry);
      $("#Result").val(result);
    }
    
    
    current_entry=result;
    
  });

  $(".clean").click(function(){
        current_entry="";
        oprt="";
        result="";
        $("#Result").val('');
    });
});