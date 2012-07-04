Cufon.replace('h3', { fontFamily: 'Myriad Pro Light' });
Cufon.replace('h3 b', { fontFamily: 'Myriad Pro Regular' });
Cufon.replace('h2', { fontFamily: 'Myriad Pro Light' });

function blinkColor()
{
  if(document.getElementById("GotNotif"))
  {
	document.getElementById("GotNotif").style.color="red";
  }
  if(document.getElementById("GotNotifProfil"))
  {
	document.getElementById("GotNotifProfil").style.color="red";
  }
  if(document.getElementById("GotNotifPms"))
  {
	document.getElementById("GotNotifPms").style.color="blue";
  }
  if(document.getElementById("GotNotifFriends"))
  {
	document.getElementById("GotNotifFriends").style.color="blue";
  }
  setTimeout("setblinkColor()",1500)
}

function setblinkColor()
{
  if(document.getElementById("GotNotif"))
  {
	document.getElementById("GotNotif").style.color="white";
  }
  if(document.getElementById("GotNotifProfil"))
  {
	document.getElementById("GotNotifProfil").style.color="white";
  }
  if(document.getElementById("GotNotifPms"))
  {
	document.getElementById("GotNotifPms").style.color="";
  }
  if(document.getElementById("GotNotifFriends"))
  {
	document.getElementById("GotNotifFriends").style.color="";
  }
  setTimeout("blinkColor()",750)
}

function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no')
}

function toggle_visibility(id) {
   var e = document.getElementById(id);
   if(e.style.display == 'block')
   {
	  $('#'+id).fadeTo(0.5, 0);
	  setTimeout('toggle_none("'+id+'")',500);
   }
   else
   {
	  $('#'+id).fadeTo(0.5, 1);
	  e.style.display = 'block';
   }
}
function toggle_none(id)
{
   var e = document.getElementById(id);
   e.style.display = 'none';
}