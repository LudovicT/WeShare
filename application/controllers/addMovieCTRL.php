<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["Name"]) && !empty($_POST["Name"]) &&
	isset($_POST["Synopsis"])&&  !empty($_POST["Synopsis"]) &&
	isset($_POST["DateOfRelease"]) && !empty($_POST["DateOfRelease"]))
{
	$addMovie_Name = $_POST["Name"];
	$addMovie_Synopsis = $_POST["Synopsis"];
	$addMovie_DateOfRelease = $_POST["DateOfRelease"];
	settype($addMovie_DateOfRelease, "integer");
	if(isset($_FILES['userfile']['name']))
	{
		$uploaddir = realpath($_SERVER['DOCUMENT_ROOT'])."/WeShare/public/images/movie_pic/";
		$file_parts = pathinfo('dir/' . $_FILES['userfile']['name']);
		$file_extension = strtolower($file_parts['extension']);
		if ($file_extension == 'jpg') {
			$srcImg = imagecreatefromjpeg($_FILES['userfile']['tmp_name']);
		} 
		elseif ($file_extension == 'jpeg') {
			$srcImg = imagecreatefromjpeg($_FILES['userfile']['tmp_name']);
		} 
		elseif ($file_extension == 'png') {
			$srcImg = imagecreatefrompng($_FILES['userfile']['tmp_name']);
		} 
		elseif ($file_extension == 'gif') {
			$srcImg = imagecreatefromgif($_FILES['userfile']['tmp_name']);
		}
		if ($file_extension == 'jpg') {
			imagejpeg($srcImg, $_FILES['userfile']['tmp_name']);
		} 
		elseif ($file_extension == 'jpeg') {
			imagejpeg($srcImg, $_FILES['userfile']['tmp_name']);
		} 
		elseif ($file_extension == 'png') {
			imagepng($srcImg, $_FILES['userfile']['tmp_name']);
		} 
		elseif ($file_extension == 'gif') {
			imagegif($srcImg, $_FILES['userfile']['tmp_name']);
		}
		$uploadfile = $uploaddir . basename($_POST["Name"]."-".$_POST["DateOfRelease"].".jpg");
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
			$addMovie_Poster = $_POST["Name"]."-".$_POST["DateOfRelease"].".jpg";
		}
		else
		{
			$addMovie_Poster = null;
		}
	}
	
	$error_addMovie = addMovie($addMovie_Name,
								$addMovie_Synopsis, 
								$addMovie_DateOfRelease,
								$addMovie_Poster);
	if ($error_addMovie[0] == 0 && $error_addMovie[1] == 0 && $error_addMovie[2] == 0 && $error_addMovie[3] == 0)
	{
		$search = searchData(0,"");
		$layout = "films.php";
	}
	else
	{
		$layout = "addMovie.php";
	}
}
else
{
	$layout = "addMovie.php";
}
?>