<?php
define("DS", "/");

//localhost si acces en local
//adressi ip si pas en local
define("LOCATION","localhost");

//pas besoin d'y toucher si la base de donné est celle fournis
define("SUPERUSER","Dacove");

define("ADDRESS","http://".LOCATION."/WeShare");

require_once(".".DS."application".DS."controllers".DS."mainController.php")
?>