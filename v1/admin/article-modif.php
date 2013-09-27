<?php
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/auth.fn.php";

session_start();
$db['link']=database_connect($db);
if(Auth::isLogged()){
}
else{
    header('Location:login.php');
}

$id = mysql_real_escape_string($_REQUEST['id'],$db['link']);

$sql = 'SELECT id,title,content FROM articles WHERE id='.$id.'';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
            
while($row=mysql_fetch_array($req,MYSQL_ASSOC)){
    
    $title = $row['title'];
    $content = $row['content'];

}

if(!empty($_POST)){
        extract($_POST);
        $sql="UPDATE articles SET title='$title', content='$content' WHERE id=$id";
        $req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
    }
 
database_disconnect($db['link']);
include 'templates/article-modif.html';

?>