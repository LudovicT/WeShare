function validate(obj, obj2)
{
	obj2 = typeof obj2 !== 'undefined' ? obj2 : 0;
	if(obj2 != 0)
	{
		if(obj2 != obj.value)
		{ 
			obj.style.background="#ffd6d6";
			obj.style.borderColor="#ffd6d6";
			return;
		}
		else if(obj2 == obj.value)
		{
			obj.style.background="#dcffdc";
			obj.style.borderColor="#dcffdc";
			return;
		}
	}
	else
	{
	var xmlhttp;
	if (obj.value.length==0)
	{ 
		obj.style.background="#ff8585";
		obj.style.borderColor="#ffd6d6";
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
function formSubmit(id)
{
document.getElementById(id).submit();
}

function info(obj)
{
var xmlhttp;
if (obj.value.length==0)
{ 
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
		document.getElementById(obj.value).value=xmlhttp.responseText;
	}
}
xmlhttp.open("POST","/weshare/application/views/info.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send('q='+obj.value);
}