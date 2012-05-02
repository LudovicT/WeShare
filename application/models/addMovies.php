<?php 

/*
	Fonction qui permet de rajouter un film
	Auteur : ARNAL Alexandre + Ludo
	Dernière mise a jour : 26/04/2012
*/

function addMovie($name, $synopsis, $DateOfRelease, $Poster)
{

	$error[0] = 0;
	$error[1] = 0;
	$error[2] = 0;
	$error[3] = 0;
	if (strlen ($name) > 81)
	{
		$error[0] = 1;
	}
	if (strlen ($synopsis) > 2500)
	{
		$error[1] = 1;
	}
	if ($DateOfRelease)
	{
		$error[2] = 1;
	}
	if (stristr($Poster, ".jpg") || stristr($Poster, ".jpeg") 
		 || stristr($Poster, ".gif") || stristr($Poster, ".png")
		 || stristr($Poster, ".bmp"))
	{
		$error[3] = 1;
	}
	if ($error == 0)
	{
			$query = sprintf("INSERT INTO Movies (Name, Synopsis, DateOfRelease, Poster)
								VALUES ('%s','%s','%s','%s')",
							 $name, $synopsis, $DateOfRelease, $Poster);
			$result = mysql_query($query, dbConnect());
			if (!isset($result))
			{
				return 1;
			}
	}
	else
	{
		return 2;
	}
return ($error);
}

?>