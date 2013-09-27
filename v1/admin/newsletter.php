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

if (!empty ($_POST['texte'])){
    
    $sql="SELECT email FROM participants";     //récupération des données
    $req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
    
    $texte=$_POST['texte'];     //récupération du message dans le formulaire
    $sujet="Newsletter du site Kinder For Adults";     //mise en forme du message
    $entete="FROM: b.antho@gmail.com";
    $entete .="MIME-Version: 1.0\n";
    $entete .="Content-Type: multipart/alternative;boundary=$boundary\n";
    $message .= "\nThis is a multi-part message in MIME format.";
    $message .="\n--$boundary\nContent-Type: text/html;charset=\"iso-8859-1\"\n\n";
    $message .="$texte";
    $message .="\n--$boundary--\n end of the multi-part";
}

while($email=mysql_fetch_row($req))     //envoi du message à tous les emails de la base de données
    {
    $res=mail($email[0],$sujet,$message,$entete);
    }

include "templates/newsletter.html";

?>