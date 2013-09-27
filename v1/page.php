<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/auth.fn.php";


$db['link']=database_connect($db);
mysql_query("SET NAMES UTF8");

$id = mysql_real_escape_string($_REQUEST['id'],$db['link']);

$sql = 'SELECT id,nom,text FROM pages WHERE id='.$id.'';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
            
while($row=mysql_fetch_array($req,MYSQL_ASSOC)){
    
    $nom = $row['nom'];
    $text = $row['text'];

}

database_disconnect($db['link']);

include 'templates/page.html';
?>