<?php
//get the q parameter from URL
$q=$_POST["q"];
$m=$_POST["m"];

$color = '#ffd6d6';
//lookup all hints from array if length of q>0
if (strlen($q) > 0 && strlen($m) > 0)
{
	switch($m)
	{
		case "pseudo":
			if (preg_match("/^[\w.\-]{4,33}$/",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "Name":
		case "lastName":
		case "LastName":
		case "firstName":
		case "FirstName":
			if (preg_match("/^[\w.\-]{2,33}$/",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "DateOfRelease":
		case "year":
			if (preg_match("/^[0-9]{4,4}$/",$q) == 1 && $q >= 1900 && $q < 2156)
				$color = '#dcffdc';
			break;
			
		case "day":
			if (preg_match("/^[0-9]{2,2}$/",$q) == 1 && $q > 0 && $q < 32)
				$color = '#dcffdc';
			break;
			
		case "month":
			if (preg_match("/^[0-9]{2,2}$/",$q) == 1 && $q > 0 && $q < 13)
				$color = '#dcffdc';
			break;
			
		case "DateOfEvent":
		case "BornDate":
			if (preg_match("~^[0-9]{2,2}/[0-9]{2,2}/[0-9]{4,4}$~",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "Runtime":
			if (preg_match("~^[0-9]{2,2}:[0-9]{2,2}:[0-9]{2,2}$~",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "phoneNumber":
			if (preg_match("/^[0-9 \+]{10,12}$/",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "address":
			if (preg_match("/^.{5,}$/",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "email":
			if(filter_var($q, FILTER_VALIDATE_EMAIL))
				$color = '#dcffdc';
			break;
			
		case"password":
			if (preg_match("/^.{6,33}$/",$q) == 1)
				$color = '#dcffdc';
			break;
			
		case "Synopsis":
		case "Bio":
		case "address":
		case "city":
		case "country":
			if (preg_match("/^.{2,}$/",$q) == 1)
				$color = '#dcffdc';
			break;
	}
}

// Set output to "no suggestion" if no hint were found
// or to the correct values

//output the response
echo $color;
?>