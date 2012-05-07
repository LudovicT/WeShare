<?php

if(isset($_POST["Name"]) && !empty($_POST["Name"]))
{
	$editMovie_Name = $_POST["Name"];
}
else
{
	$editMovie_Name = null;
}

if(isset($_POST["Synopsis"]) && !empty($_POST["Synopsis"]))
{
	$editMovie_Synopsis = $_POST["Synopsis"];
}
else
{
	$editMovie_Synopsis = null;
}

if(isset($_POST["DateOfRelease"]) && !empty($_POST["DateOfRelease"]))
{
	$editMovie_DateOfRelease = $_POST["DateOfRelease"];
}
else
{
	$editMovie_DateOfRelease = null;
}

if(isset($_POST["Runtime"]) && !empty($_POST["Runtime"]))
{
	$editMovie_Runtime = $_POST["Runtime"];
}
else
{
	$editMovie_Runtime = null;
}

if(isset($_POST["Poster"]) && !empty($_POST["Poster"]))
{
	$editMovie_Poster = $_POST["Poster"];
}
else
{
	$editMovie_Poster = null;
}

$error_editMovie = editMovie($editMovie_Name,
							$editMovie_Synopsis,
							$editMovie_DateOfRelease,
							$editMovie_Runtime,
							$editMovie_Poster);
		$search = searchData(0,"");

if ($error_editMovie == 0)
{
	$layout = "editMovie.php";
}
else
{
	$layout = "films.php";
}

?>