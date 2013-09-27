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

if(!empty($_FILES)){
    include("../functions/imgClass.php");
    $img = $_FILES['img'];
    $ext = strtolower (substr($img['name'],-3));
    $allow_ext = array('jpg','png','gif');
    if(in_array($ext,$allow_ext)){
        move_uploaded_file($img['tmp_name'],"../templates/images/surprises/".$img['name']);
        Img::creerMin("../templates/images/slider/".$img['name'],"../templates/images/surprises/min",$img['name'],680,400);
        Img::creerMin("../templates/images/slider/".$img['name'],"../templates/images/surprises/min/admin",$img['name'],100,100);
        Img::convertirJPG("../templates/images/surprises/".$img['name']);
        
        $titre = $_POST['titre'];
        $lien=$_FILES['img']['name'];
        
        $sql = "INSERT INTO image_galerie (id,titre,lien,lien_admin) VALUES ('','$titre','templates/images/surprises/min/$lien','../templates/images/surprises/min/admin/$lien')";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    }
    else{
        $erreur = "Votre fichier n'est pas une image";
    }
}


$dirname = '../templates/images/surprises/min/';
$dir = opendir($dirname); 

while($file = readdir($dir)) {
	if($file != '.' && $file != '..' && !is_dir($dirname.$file))
	{
		//echo '<a href="'.$dirname.$file.'">'.$file.'</a><br />';
	}
}

closedir($dir);


$sql = 'SELECT id,titre,lien,lien_admin FROM image_galerie ORDER BY id DESC';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$image_galerie=array();

while($row = mysql_fetch_array($req, MYSQL_ASSOC)){	

    $image_galerie[$row['id']]=array('id'=>$row['id'],'titre'=>$row['titre'],'lien'=>$row['lien'],'lien_admin'=>$row['lien_admin']);
}

include "templates/insert-image-galerie.html";
?>
