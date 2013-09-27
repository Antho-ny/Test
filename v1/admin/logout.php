<?php
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/session.fn.php";

session_start();
session_disconnect();

header('Location: index.php');

echo 'vous venez d\'&ecirc;tre d&eacute;connect&eacute;';

?>