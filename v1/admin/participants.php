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

$sql = 'SELECT id,nom,prenom,email,adresse,cp,telephone FROM participants ORDER BY id DESC';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$tab=array();

while($row = mysql_fetch_array($req, MYSQL_ASSOC)){	

    $tab[$row['id']]=array('id'=>$row['id'],'nom'=>$row['nom'],'prenom'=>$row['prenom'],'email'=>$row['email'],'adresse'=>$row['adresse'],'cp'=>$row['cp'],'telephone'=>$row['telephone']);
}
   
include "templates/participants.html";
?>


    