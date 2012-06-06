<?php
/*
La fonction getUserMovies permet de récupérer la liste des films appartenants
à l'utilisateur.

$error
$UserMovies

$error (S): int
-1	:	erreur requête invalide/problème avec la BDD;
$UserMovies (S) : tableau associatif contenant les films appartenants à
l'utilisateur.

Auteur : Vincent Ricard
*/

function getUserMovies($IdUser)
{
	$UserMovies;
	$iterator = 0;
	
	// Requête récupérant les ID des films appartenants à l'utilisateur
	$query = sprintf("SELECT IdMovie FROM UserMovies WHERE IdUser = '%d'" 
					 ,$IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = -1;
		return ($error);
	 }
	while(($ListIDMovieUser[] = mysql_fetch_assoc($result)) || array_pop($ListIDMovieUser));
	// while de parser permettant de récupéter toutes les données de chaque film
	while (isset($ListIDMovieUser[$iterator]) && !empty($ListIDMovieUser[$iterator]))
	{
		 foreach ($ListIDMovieUser[$iterator] as $key)
		 {
			$UserMovies[$iterator] = getMovie($key['IdMovie']);
		 }
		$iterator++;
	}
	return ($UserMovies);
}
?>