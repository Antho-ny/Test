<?php
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/auth.fn.php";

session_start();
$db['link']=database_connect($db);
mysql_query("SET NAMES UTF8");
if(Auth::isLogged()){
}
else{
    header('Location:login.php');
}

$sql = 'SELECT COUNT(*) FROM participants';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

$row = mysql_fetch_row($req);

$sql2 = 'SELECT COUNT(*) FROM articles';
$req2= mysql_query($sql2) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

$row2 = mysql_fetch_row($req2);


$sql3 = 'SELECT COUNT(*) FROM image';
$req3= mysql_query($sql3) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

$row3 = mysql_fetch_row($req3);

$sql4 = 'SELECT COUNT(*) FROM image_galerie';
$req4= mysql_query($sql4) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

$row4 = mysql_fetch_row($req4);

include "templates/administration.html";
?>