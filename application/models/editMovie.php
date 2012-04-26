<?php

/*
	Fonction qui permet d'�diter la fiche d'un film
	Auteur : ARNAL Alexandre
	Derni�re mise a jour : 26/04/2012
*/

function execModifierFilm()
	{
		$erreurs = ;
		$erreur = ;
		
		$id = getValeur(id,);
		$titre = getValeur(titre,);
		$resume = getValeur(resume,);
		$duree = getValeur(duree,);
		$date = getValeur(date,);
		$support = getValeur(support,);
		$categorie = getValeur(categorie,0);
		
		if(!empty($titre) && !empty($id))
		{
			connectionBDD();
			
			$requete = UPDATE films SET ;
			$requete .= titre='.addslashes($titre).', ;
			$requete .= resume='.addslashes($resume).', ;
			$requete .= duree='.$duree.', ;
			$requete .= annee='.$date.', ;
			$requete .= categorie='.$categorie.', ;
			$requete .= support='.addslashes($support).' ;
			$requete .= WHERE id=.$id;
			
			if(executerRequete($requete))
			{
				$info[] = modification du film dans la base reussie;
				
				// traitement de l'image disque
				if($_FILES['imageUp']['size']0)
				{
					list($erreurs,$illustration) = uploadImage($_FILES['imageUp'],$id);
					if(!empty($illustration))
					{
						if(executerRequete(UPDATE films SET illustration='.$illustration.' WHERE id=.$id))
						{
							$info[] = // envoi de l'image r�ussi;
						}
						else $erreur[] = // erreur lors de la mise � jour de l'illustration dans la base;
					}
				}
			}
			else $erreur[] = impossible de mettre � jour le film;
			
			deconnectionBDD();
		}
		else
		{
			$erreur[] = aucun titre ou id de film recu, enregistrement annul�;
		}
		
		if(!empty($erreur) && !empty($erreurs))
		{
			$erreur = array_merge($erreur,$erreurs);
		}
		
		include gabaritstraitementFilm.html;
		
?>