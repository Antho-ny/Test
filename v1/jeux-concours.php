<?php
include "config/config.php";
include "functions/database.fn.php";
include "functions/session.fn.php";


$db['link']=database_connect($db);
    
        $nom=$_POST['nom'];//mysql_real_escape_string($_POST['title']);
        $prenom=$_POST['prenom'];//mysql_real_escape_string($_POST['content']);
        $email=$_POST['email'];//mysql_real_escape_string($_POST['content']);
        $adresse=$_POST['adresse'];
        $cp=$_POST['cp'];
        $telephone=$_POST['telephone'];
        
    if (!empty ($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){
	$sql='SELECT id,email FROM participants WHERE email="'.$_POST['email'].'"';
	$res = mysql_query($sql,$db['link']);
	$row = mysql_fetch_array($res, MYSQL_ASSOC);

	if($row==0){
            
		$sql2="INSERT INTO participants (id,nom,prenom,email,adresse,cp,telephone) VALUES ('','$nom','$prenom','$email','$adresse','$cp','$telephone')";
                $req= mysql_query($sql2) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
	}
        else{
            echo '<script> alert("Tu peux pas jouer 2 fois !?"); </script>' ;
                //echo    '<div id="error_message">Tu peux pas jouer 2 fois !!!</div>';
	}
    
        $aleatoire = mt_rand(1,5);
        if ($aleatoire == 1){
           echo 'vous avez gagnŽ ! ';
        }
        else{
            echo 'Vous avez perdu retentez votre chance !!';
        }
    }
    mysql_close();
    
include "templates/jeux-concours.html";

?>