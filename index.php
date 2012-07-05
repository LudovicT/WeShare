<?php
define("ROOT", "C:/wamp/www/WeShare/");
define("DS", "/");

//localhost si acces en local
//adressi ip si pas en local
define("LOCATION","localhost");

define("ADDRESS","http://".LOCATION."/WeShare");

require_once(".".DS."application".DS."controllers".DS."mainController.php")
?>