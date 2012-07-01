<?php
//système de notifications
//notif Events
$newNotifEvents = "";
$newNotifEventsEnd = "";
$notifEvents = checkEvents($userId);
if($notifEvents > 0)
{
	$newNotifEvents = "<div id='GotNotif'>  (".$notifEvents.")</div>";
}

//notifs profil
$newNotifProfil = "";
$newNotifProfilEnd = "";
$newNotifProfilPms = "";
$newNotifProfilEndPms = "";
$newNotifProfilFriends = "";
$newNotifProfilEndFriends = "";
$notifPms = checkMp($userId);
$notifFriends = checkFriends($userId);
$totalNotif = $notifPms+$notifFriends;
if($totalNotif > 0)
{
	$newNotifProfil = "<div id='GotNotifProfil'>  (".$totalNotif.")</div>";
	if($notifPms > 0)
	{
		$newNotifProfilPms = "<div id='GotNotifPms'>  (".$notifPms.")</div>";
	}
	if($notifFriends > 0)
	{
		$newNotifProfilFriends = "<div id='GotNotifFriends'>  (".$notifFriends.")</div>";
	}
}
?>