<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";
include "functions/imgClass.php";
include "functions/more.fn.php";

$db['link']=database_connect($db);
mysql_query("SET NAMES UTF8");



$sql='SELECT id,title,content,date FROM articles ORDER BY id DESC ';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$articles=array();

while($row=mysql_fetch_array($req,MYSQL_ASSOC)){
  
    $articles[$row['id']]=array('title'=>$row['title'],'date'=>$row['date'],'content'=>$row['content']);
}
   
database_disconnect($db['link']);
include 'templates/news.html';
?>