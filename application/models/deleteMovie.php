<?php 

/*
	Fonction qui permet de supprimer un film du site
	Auteur : ARNAL Alexandre
	Derni�re mise a jour : 26/04/2012
*/

function supprimerFilm()
	{
		$erreurs = "";
		$erreur = "";
		
		$id = getValeur("id","");
		
		if(!empty($id))
		{
			connectionBDD();
			
			// on r�cupere l'illistration correspondant au film
			if($film = recupererRequete("SELECT illustration FROM films WHERE id=".$id))
			{
				$illustration = $film[0]['illustration'];
			}
			else $erreur[] = "impossible de r�cup�rer le nom de l'ilustratin correspondante, l'image existe toujours";

			// suppresion du film dans la base
			if(executerRequete("DELETE FROM films WHERE id=".$id))
			{
				$info[] = "le film est supprim� de la base";
				
				// suppression de l'illustration
				if(!empty($illustration))
				{
					if(unlink("../".REP_ILLUSTRATIONS.$illustration))
					{
						$info[] = "l'illustration est supprim�e";
					}
					else $erreur[] = "impossible de supprimer l'illustration";
				}
			}
			else $erreur[] = "impossible de supprimer le film dans la base";
			
			deconnectionBDD();
		}
		else $erreur[] = "aucun id de film recu pour la suppression";
		
		include "gabarits/traitementFilm.html";
	}
?>