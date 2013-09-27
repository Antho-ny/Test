<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";

$db['link']=database_connect($db);

 $image_galerie=array();
 
 $sql='SELECT id,titre,lien FROM image_galerie';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


while($row=mysql_fetch_array($req,MYSQL_ASSOC)){
    
       $image_galerie[$row['id']]=array('lien'=>$row['lien']);
 }
   
database_disconnect($db['link']);
include 'templates/surprises.html';


?>