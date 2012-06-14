<?php
//système de notifications
//notif Events
$newNotifEvents = "";
$newNotifEventsEnd = "";
$notifEvents = checkEvents($userId);
if($notifEvents > 0)
{
	$newNotifEvents = "<div id='GotNotif'>";
	$newNotifEventsEnd = "  (".$notifEvents.")</div>";
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
	$newNotifProfil = "<div id='GotNotifProfil'>";
	$newNotifProfilEnd = "  (".$totalNotif.")</div>";
	if($notifPms > 0)
	{
		$newNotifProfilPms = "<div id='GotNotifPms'>";
		$newNotifProfilEndPms = "  (".$notifPms.")</div>";
	}
	if($notifFriends > 0)
	{
		$newNotifProfilFriends = "<div id='GotNotifFriends'>";
		$newNotifProfilEndFriends = "  (".$notifFriends.")</div>";
	}
}
?>