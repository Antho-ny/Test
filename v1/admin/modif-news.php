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
    header('Location:index.php');
}

$sql = 'SELECT id,title FROM articles ORDER BY id DESC';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$tab=array();

while($row = mysql_fetch_array($req, MYSQL_ASSOC)){	

    $tab[$row['id']]=array('id'=>$row['id'],'title'=>$row['title']);
}
   
include "templates/modif-news.html";
?>


    