<?php
/* 
Fonction qui permet de se deconnecter

auteur : Alexandre Arnal.
*/
function deconnect()
{
// On appelle la session 

session_start(); 
 
// On �crase le tableau de session 

$_SESSION = array(); 
 
// On d�truit la session 

session_destroy();  
}
?>