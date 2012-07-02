<?php
/*
Fichier de controle qui traite et redirige l'ajout de films
*/
if (isset($_POST["LastName"]) && !empty($_POST["LastName"]) &&
	isset($_POST["FirstName"])&&  !empty($_POST["FirstName"]) &&
	isset($_POST["Bio"])&&  !empty($_POST["Bio"]) &&
	isset($_POST["BornDate"]) && !empty($_POST["BornDate"]))
{

	if(isset($_FILES['userfile']['name']))
	{
		$uploaddir = realpath($_SERVER['DOCUMENT_ROOT'])."/WeShare/public/images/staff_pic/";
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
		$uploadfile = $uploaddir . basename($_POST["LastName"]."-".$_POST["FirstName"].".jpg");
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
			$addStaff_Poster = $_POST["LastName"]."-".$_POST["FirstName"].".jpg";
		}
		else
		{
			$addStaff_Poster = null;
		}
	}
	$error = addStaff($_POST["LastName"],
						$_POST["FirstName"], 
						$_POST["Bio"],
						changeDate($_POST["BornDate"]),
						$addStaff_Poster);
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