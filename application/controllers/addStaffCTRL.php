<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["LastName"]) && !empty($_POST["LastName"]) &&
	isset($_POST["FirstName"])&&  !empty($_POST["FirstName"]) &&
	isset($_POST["Picture"])&&  !empty($_POST["Picture"]) &&
	isset($_POST["Bio"])&&  !empty($_POST["Bio"]) &&
	isset($_POST["BornDate"]) && !empty($_POST["BornDate"]))
{
	$error = addStaff($_POST["LastName"],
						$_POST["FirstName"], 
						$_POST["Bio"],
						$_POST["BornDate"],
						$_POST["Picture"]);
	if ($error == 0)
	{
		$search = searchData(2,"");
		$layout = "films.php";
	}
	else
	{
		$layout = "addStaff.php";
	}
}
else
{
	$layout = "addStaff.php";
}
?>