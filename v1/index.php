<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";
include "functions/imgClass.php";
include "functions/more.fn.php";

$db['link']=database_connect($db);
mysql_query("SET NAMES UTF8");

//On selectionne les 3 dernires entrŽes
$sql='SELECT id,title,content,date FROM articles ORDER BY id DESC ';//LIMIT 3
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$articles=array();

while($row=mysql_fetch_array($req,MYSQL_ASSOC)){
  
    $articles[$row['id']]=array('title'=>$row['title'],'date'=>$row['date'],'content'=>$row['content']);
 }
 

$id = mysql_real_escape_string($_REQUEST['id'],$db['link']);

$sql2='SELECT id,nom FROM pages';
$req2= mysql_query($sql2) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$pages=array();

while($row2=mysql_fetch_array($req2,MYSQL_ASSOC)){
  
    $pages[$row2['id']]=array('id'=>$row2['id'],'nom'=>$row2['nom']);
 }
 
 $image=array();
 
 $sql3='SELECT id,alt,link FROM image';
$req3= mysql_query($sql3) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


while($row3=mysql_fetch_array($req3,MYSQL_ASSOC)){
    
       $image[$row3['id']]=array('link'=>$row3['link']);
 }
      
database_disconnect($db['link']);
include 'templates/home.html';


?>