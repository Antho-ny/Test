<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";

$db['link']=database_connect($db);
mysql_query("SET NAMES UTF8");

$id = mysql_real_escape_string($_REQUEST['id'],$db['link']);

$sql2='SELECT id,nom FROM pages';
$req2= mysql_query($sql2) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$pages=array();

while($row2=mysql_fetch_array($req2,MYSQL_ASSOC)){
  
    $pages[$row2['id']]=array('id'=>$row2['id'],'nom'=>$row2['nom']);
 }

database_disconnect($db['link']);
include 'templates/contact.html';


?>