<?php 

/*
	Fonction qui permet d'afficher la liste des films
	Auteur : ARNAL Alexandre
	Derni�re mise a jour : 26/04/2012
*/

function getMovie($films)
{
	$S_query = ("SELECT * 
				FROM Movies
				HAVING Name = '".$films."'");
				
	$S_result = mysql_query($S_query, dbConnect());
	if (!isset($S_result))
	{
		return -1;
	}

	$films = mysql_fetch_assoc($S_result);

	mysql_close();
	return $profil;
}
?>