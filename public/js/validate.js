function validate(obj, obj2)
{
	obj2 = typeof obj2 !== 'undefined' ? obj2 : 0;
	if(obj2 != 0)
	{
		if(obj2 != obj.value)
		{ 
			obj.style.background="#ff8585";
			obj.style.borderColor="red";
			return;
		}
		else if(obj2 == obj.value)
		{
			obj.style.background="lightgreen";
			obj.style.borderColor="lightgreen";
			return;
		}
	}
	else
	{
	var xmlhttp;
	if (obj.value.length==0)
	{ 
		obj.style.background="#ff8585";
		obj.style.borderColor="red";
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			obj.style.background=xmlhttp.responseText;
			obj.style.borderColor=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","/weshare/application/views/validate.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send('q='+obj.value+'&m='+obj.id);
	
	}
}