<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";

$db['link']=database_connect($db);


database_disconnect($db['link']);
include 'templates/reglement.html';


?>