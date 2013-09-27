<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";
include "functions/imgClass.php";
include "functions/more.fn.php";

$db['link']=database_connect($db);
mysql_query("SET NAMES UTF8");



$id_article = mysql_real_escape_string($_REQUEST['id'],$db['link']);

$sql = 'SELECT id,title,content FROM articles WHERE id='.$id_article.' ';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
            
while($row=mysql_fetch_array($req,MYSQL_ASSOC)){

    $title = $row['title'];
    $content = $row['content'];

}

database_disconnect($db['link']);
include "templates/article.html";
?>