<?php
/*
La fonction getUserMovies permet de r�cup�rer la liste des films appartenants
� l'utilisateur.

$error
$UserMovies

$error (S): int
-1	:	erreur requ�te invalide/probl�me avec la BDD;
$UserMovies (S) : tableau associatif contenant les films appartenants �
l'utilisateur.

Auteur : Vincent Ricard
*/

function getUserMovies($IdUser)
{
	$UserMovies;
	$iterator = 0;
	
	// Requ�te r�cup�rant les ID des films appartenants � l'utilisateur
	$query = sprintf("SELECT IdMovie FROM UserMovies WHERE IdUser = '%d'" 
					 ,$IdUser);
	$result = mysql_query($query, dbConnect());
	if ($result == false)
	 {
		$error = -1;
		return ($error);
	 }
	while(($ListIDMovieUser[] = mysql_fetch_assoc($result)) || array_pop($ListIDMovieUser));
	// while de parser permettant de r�cup�ter toutes les donn�es de chaque film
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