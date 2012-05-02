<?php 

/*
	Fonction qui permet de supprimer un film du site
	Auteur : ARNAL Alexandre
	Dernière mise a jour : 02/05/2012
*/

function deleteMovie()
{
	$S_query = ("DELETE FROM Movies
				WHERE IdMovie ='".$MovieId."");
	$S_result = mysql_query($S_query, dbConnect());
	if (!isset($S_result))
	{
		return 1;
	}
}
?>