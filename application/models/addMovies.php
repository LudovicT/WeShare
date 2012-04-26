<?php 

/*
	Fonction qui permet de rajouter un film
	Auteur : ARNAL Alexandre
	Dernière mise a jour : 26/04/2012
*/

function editMovie($IdMovie, $name, $synopsis, $DateOfRelease, $Poster)
{
	$error = 0;
	if (!empty($name))
	{
		if (strlen($FirstName) < 55)
		{
			$query = sprintf("INSERT INTO Movies (name, synopsis, DateOfRelease, Poster)
								VALUES ('%s'),
							 $name");
			$result = mysql_query($query, dbConnect());
			if (!isset($result))
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (isset($synopsis))
	{
		if ($strlen($synopsis) < 2500 )
		{
			$query = sprintf("UPDATE Movies SET synopsis = '%s' 
							WHERE IdMovie = '%d'",
							$synopsis, $IdMovie);
			$result = mysql_query($query, dbConnect());
			if (!isset($result))
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($DateOfRelease))
	{
		if (strlen($DateOfRelease) < 12)
		{
			$query = sprintf("UPDATE Movies SET DateOfRelease = '%s' 
							 WHERE IdMovie = '%d'",
							$DateOfRelease, $IdMovie);
			$result = mysql_query($query, dbConnect());
			if (!isset($result))
			{
				$error = 2;
			}
		}
		else
		{
			$error = 1;
		}
	}
	if (!empty($Poster))
	{
		if (stristr($Poster, ".jpg") || stristr($Poster, ".jpeg") 
		 || stristr($Poster, ".gif") || stristr($Poster, ".png")
		 || stristr($Poster, ".bmp"))
		{
			$query = sprintf("UPDATE Movies SET Poster = '%s' 
							 WHERE IdMovie = '%d'",
							 $Poster, $IdMovie);
			$result = mysql_query($query, dbConnect());
			if (!isset($result))
			{
				$error = 2;
			}
		}
		else
		{
			$error = 4;
		}
	}
return ($error);
}

?>