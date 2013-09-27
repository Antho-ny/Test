<?php
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/auth.fn.php";

session_start();
$db['link']=database_connect($db);

if(Auth::isLogged()){
}
else{
    header('Location:index.php');
}

if (!empty ($_POST['title']) && !empty($_POST['content'])){

        $title=$_POST['title'];//mysql_real_escape_string($_POST['title']);
        $content=$_POST['content'];//mysql_real_escape_string($_POST['content']);
 
        $sql="INSERT INTO articles(id,title,content,date) VALUES ('','$title','$content',CURRENT_TIMESTAMP)";
        $req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

   }
   
include "templates/insert-news.html";
?>


    