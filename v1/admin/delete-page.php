<?php
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/auth.fn.php";

session_start();
$db['link']=database_connect($db);
if(Auth::isLogged()){
}
else{
    header('Location:login.php');
}

$sql = "DELETE FROM pages WHERE id= {$_GET["id"]}";
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

header ("Location: modif-pages.php");
?>


    