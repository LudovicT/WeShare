<?php 
function enregistrerFilm()
	{
		$erreurs = "";
		$erreur = "";
		
		$titre = getValeur("titre","");
		$resume = getValeur("resume","");
		$image = getValeur("image","");
		$duree = getValeur("duree","");
		$date = getValeur("date","");
		$support = getValeur("support","");
		$categorie = getValeur("categorie",0);
		
		if(!empty($titre))
		{
			connectionBDD();
			
			$requete = "INSERT INTO films SET ";
			$requete .= "titre='".addslashes($titre)."', ";
			$requete .= "resume='".addslashes($resume)."', ";
			$requete .= "duree='".$duree."', ";
			$requete .= "annee='".$date."', ";
			$requete .= "categorie='".$categorie."', ";
			$requete .= "support='".addslashes($support)."' ";
			
			if(executerRequete($requete))
			{
				$info[] = "ajout du film dans la base reussi";
				
				// on recupere l'id du film créé
				$id = mysql_insert_id();
				
				// traitement de l'image disque
				if($_FILES['imageUp']['size']>0)
				{
					list($erreurs,$illustration) = uploadImage($_FILES['imageUp'],$id);
					if(!empty($illustration))
					{
						if(executerRequete("UPDATE films SET illustration='".$illustration."' WHERE id=".$id))
						{
							$info[] = "envoi de l'image réussi";
						}
						else $erreur[] = "erreur lors de la mise à jour de l'illustration dans la base";
					}
				}	
				// traitement de l'image url
				else if(!empty($image))
				{					
					$contenuImg = file_get_contents($image);
					
					// on recupere l'image distante if($contenuImg = getContenuURL($image,'img'))
					if($contenuImg)
					{
						// on recupere l'extension
						$tbTmp = explode(".",$image);
						$extension = strtolower($tbTmp[count($tbTmp)-1]);
						
						$nomImg = $id.".".$extension;
						
						if($newImage = @fopen("../".REP_ILLUSTRATIONS.$nomImg,"w"))
						{
							if(@fputs($newImage,$contenuImg))
							{
								$illustration = $nomImg;
								reduireImages('non');
								if(executerRequete("UPDATE films SET illustration='".$illustration."' WHERE id=".$id))
								{
									$info[] = "envoi de l'image réussi";
								}
								else $erreur[] = "erreur lors de la mise à jour de l'illustration dans la base";
							}
							else $erreur[] = "impossible de copier le contenu de l'image distante dans l'image locale";
							@fclose($newImage);
						}
						else $erreur[] = "impossible de créer une image dans le repertoire d'illustrations";
					}
					else $erreur[] = "impossible de récuperer l'image distante";
				}	
			}
			else $erreur[] = "pas d'image recue pour le film";
			
			deconnectionBDD();
		}
		else
		{
			$erreur[] = "aucun titre de film recu, enregistrement annulé";
		}
		
		if(!empty($erreur) && !empty($erreurs))
		{
			$erreur = array_merge($erreur,$erreurs);
		}

		include "gabarits/traitementFilm.html";
		
	}
?>