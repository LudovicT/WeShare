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