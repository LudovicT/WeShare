Cufon.replace('h3', { fontFamily: 'Myriad Pro Light' });
Cufon.replace('h3 b', { fontFamily: 'Myriad Pro Regular' });
Cufon.replace('h2', { fontFamily: 'Myriad Pro Light' });

function blinkColor()
{
  if(document.getElementById("GotNotif"))
  {
	document.getElementById("GotNotif").style.color="lightgreen";
  }
  if(document.getElementById("GotNotifProfil"))
  {
	document.getElementById("GotNotifProfil").style.color="lightgreen";
  }
  if(document.getElementById("GotNotifPms"))
  {
	document.getElementById("GotNotifPms").style.color="lightgreen";
  }
  if(document.getElementById("GotNotifFriends"))
  {
	document.getElementById("GotNotifFriends").style.color="green";
  }
  setTimeout("setblinkColor()",1000)
}

function setblinkColor()
{
  if(document.getElementById("GotNotif"))
  {
	document.getElementById("GotNotif").style.color="";
  }
  if(document.getElementById("GotNotifProfil"))
  {
	document.getElementById("GotNotifProfil").style.color="";
  }
  if(document.getElementById("GotNotifPms"))
  {
	document.getElementById("GotNotifPms").style.color="";
  }
  if(document.getElementById("GotNotifFriends"))
  {
	document.getElementById("GotNotifFriends").style.color="";
  }
  setTimeout("blinkColor()",1000)
}