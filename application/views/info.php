<?php
//get the q parameter from URL
$q=$_POST["q"];


//lookup all hints from array if length of q>0
if (strlen($q) > 0)
{
	define("DS", "/");
	define("ADDRESS","http://localhost/WeShare");
	require_once("../../config/config.php");
	require_once('../models/mainModels.php');
	$user = getUser();
	if(isset($user) && !empty($user))
	{
			$profil = getProfil($user);
		
		switch($q)
		{
			case "address":
				echo $profil['Address'];
				break;
			case "city":
				echo $profil['City'];
				break;
			
		}
	}
}

// Set output to "no suggestion" if no hint were found
// or to the correct values

//output the response
?>