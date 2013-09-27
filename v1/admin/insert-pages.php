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

if (!empty ($_POST['nom']) && !empty($_POST['text'])){

        $nom=$_POST['nom'];//mysql_real_escape_string($_POST['title']);
        $text=$_POST['text'];//mysql_real_escape_string($_POST['content']);
 
        $sql="INSERT INTO pages (id,nom,text) VALUES ('','$nom','$text')";
        $req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

   }
   
include "templates/insert-pages.html";
?>


    