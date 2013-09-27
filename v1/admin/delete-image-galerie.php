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


    $sql = "DELETE FROM image_galerie WHERE id= {$_GET["id"]}";
    $req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

/*
$dirname = '../templates/images/surprises/min/';
$dirnameimg = '../templates/images/surprises/';
$dir = opendir($dirname); 

while($file = readdir($dir)) {
	if($file != '.' && $file != '..' && !is_dir($dirname.$file))
	{
		//echo '<a href="'.$dirname.$file.'">'.$file.'</a><br />';
                unlink($dirname.$file);
                $sql = "DELETE FROM image_galerie WHERE id= {$_GET["id"]}";
                $req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());

	}
}

closedir($dir);
*/



/*$adresse="../templates/images/surprises/min/";
$dir = opendir($adresse); 

if(isset($_FILES)){
    
    $nom=''.$adresse.$_GET&#91;'nom'&#93;.'';

    unlink($nom);

    echo 'Le fichier "'.$_GET&#91;'nom'&#93;.'" a été effacé !<br>';

    $requete = "DELETE FROM upload WHERE id = '".$_GET&#91;'nom'&#93;."'";

    mysql_query($requete) or die("Erreur SQL :".mysql_error());

     }

closedir($dossier);
*/

header ("Location: insert-image-galerie.php");
?>


    