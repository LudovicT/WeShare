<?php
/* 
Cette fonction sert � se connecter � la base de donn�e

$error (S): int : 
0 -> pas d'erreurs
1 -> Connexion impossible � la bdd ;
2 -> Selection impossible de la bdd ;

$link (S) : retourne le lien de mysql_connect()

Auteur: Vincent Ricard
Modifi� par: Ludovic Tresson (ajout erreur(0|2)/constantes de la bdd)
*/

function dbConnect ()
{
	static $link = null;

	if ($link === null)
	{
		$error = 0;
		$link = mysql_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD');
		if (empty($link))
		{
			die("Impossible de se connecter : " . mysql_error());
			$error = 1;
			return ($error);
		}
		else
		{
			$db_selected = mysql_select_db('WeShare', $link);
			if (empty($db_selected))
			{
				die("Impossible de s�lectionner la base de donn�es : " 
				. mysql_error());
				$error = 2;
				return ($error);
			}
		}
	}
	else
	{
		return ($link);
	}
}
?>