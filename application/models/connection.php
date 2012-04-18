<?php
/* 
$error = 1; ---> Pseudo ou Mot de passe incorrect
$error = 2; ---> Les champs Pseudo et Mot de passe doivent �tre remplis
*/


// Indique le bon format des ent�tes (par d�faut apache risque de les envoyer au standard ISO-8859-1)
header('Content-type: text/html; charset=UTF-8');

function Verif_magicquotes ($chaine)
{
if (get_magic_quotes_gpc()) $chaine = stripslashes($chaine);

return $chaine;
}

// Initialisation du message de r�ponse
$message = null;


// Si le formulaire est envoy�
if (isset($_POST['pseudo']))
{

    /* R�cup�ration des variables issues du formulaire
    Teste l'existence les donn�es post en v�rifiant qu'elles existent, qu'elles sont non vides et non compos�es uniquement d'espaces.
    (Ce dernier point est facultatif et l'on pourrait se passer d'utiliser la fonction trim())
    En cas de succ�s, on applique notre fonction Verif_magicquotes pour (�ventuellement) nettoyer la variable */
    $pseudo = (isset($_POST['pseudo']) && trim($_POST['pseudo']) != '')? Verif_magicquotes($_POST['pseudo']) : null;
    $pass = (isset($_POST['pass']) && trim($_POST['pass']) != '')? Verif_magicquotes($_POST['pass']) : null;
   

    // Si $pseudo et $pass diff�rents de null
    if(isset($pseudo,$pass))
    {
         // Indique � mySql de travailler en UTF-8 (par d�faut mySql risque de travailler au standard ISO-8859-1)
         mysql_query("SET NAMES 'utf8'",dbConnect());
   
         // Pr�paration des donn�es pour les requ�tes � l'aide de la fonction mysql_real_escape_string
         $nom = ($pseudo);
         $password = ($pass);
   
   
         /* Requ�te pour r�cup�rer les enregistrements r�pondant � la clause :
         champ du pseudo et champ du mdp de la table = pseudo et mdp post�s dans le formulaire*/
        $S_requete = "SELECT * FROM membres WHERE pseudo = '".$nom."' AND pass = '".$password."'";  
   
         // Ex�cution de la requ�te
         $S_req_exec = mysql_query($S_requete,dbConnect()) or die(mysql_error());
   
         // Cr�ation du tableau associatif du r�sultat
         $S_resultat = mysql_fetch_assoc($S_req_exec);

         // Les valeurs (si elles existent) sont retourn�es dans le tableau $resultat;
         if (isset($S_resultat['pseudo'],$S_resultat['pass']))  
               {
                 session_start();
                 $_SESSION['login'] = $pseudo;
                }
                else
                {   
                $error = 1;
                }

    }
    else
    { 
    $error = 2;
    }
}
?>