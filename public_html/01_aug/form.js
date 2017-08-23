function checking()
{
var x=document.getElementById("x").value;
	var y=document.getElementById("y").value;
	var z=document.getElementById("z").value;
	if(z>=5&&z<=7)
	{
		if(y<15)
			{
			document.getElementById("checking").innerHTML="Hello" +" " +x+ "!!!Your weight is less than recommended value of 15KG at an age between 5 to 7 ";
		}
		else if (y>20)
			{
			document.getElementById("checking").innerHTML="Hello" +" " +x+"!!!Your weight is greater than recommended value of 20KG at an age between 5 to 7 "
		}
		else
			document.getElementById("checking").innerHTML="Hello" +" "+x+"!!!Your weight is perfect";
	}
	if(z>=8&&z<=10)
	{
		if(y<21)
			{
			document.getElementById("checking").innerHTML="Hello " + " " +x+" !!!Your weight is less than recommended value of 21KG at an age between 8 to 10 ";
		}
		else if(y>25)
			{
			document.getElementById("checking").innerHTML="Hello" + " " +x+"!!!Your weight is greater than recommended value of 25KG at an age between 8 to 10 ";
		}

       else
       	document.getElementById("checking").innerHTML="Hello" + " " +x+ "!!!Your weight is perfect";
	}
	if(z>=11&&z<=15)
	{
		if(y<26)
			{
			document.getElementById("checking").innerHTML="Hello  " + " " +x+ " !!!Your weight is less than recommended value of 26KG at an age between 11 to 15 ";
		}
		else if(y>30)
			{
			document.getElementById("checking").innerHTML="Hello" + " "  +x+ "!!!Your weight is greater than recommended value of 26KG at an age between 11 to 15 ";
		}
		else
       	document.getElementById("checking").innerHTML="Hello " + " " +x+ "!!!Your weight is perfect";
	}
	if(z>=16&&z<=20)
	{
		if(y<31)
			{
			document.getElementById("checking").innerHTML="Hello " + " " +x+" !!!Your weight is less than recommended value of 31KG at an age between 16 to 20 ";
		}
		else if(y>40)
			{
			document.getElementById("checking").innerHTML="Hello" + " " +x+"!!!Your weight is greater than recommended value of 40KG at an age between 16 to 20";
		}
		else
       	document.getElementById("checking").innerHTML="Hello" + " " +x+"!!!Your weight is perfect";

	}
}

