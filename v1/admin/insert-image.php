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
        move_uploaded_file($img['tmp_name'],"../templates/images/slider/".$img['name']);
        Img::creerMin("../templates/images/slider/".$img['name'],"../templates/images/slider/min",$img['name'],668,320);
        Img::creerMin("../templates/images/slider/".$img['name'],"../templates/images/slider/min/admin",$img['name'],100,100);
        Img::convertirJPG("../templates/images/slider/".$img['name']);
        
        $alt = $_POST['alt'];
        $link=$_FILES['img']['name'];
        
        $sql = "INSERT INTO image (id,alt,link,link_admin) VALUES ('','$alt','templates/images/slider/min/$link','../templates/images/slider/min/admin/$link')";
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    }
    else{
        $erreur = "Votre fichier n'est pas une image";
    }
}


$dirname = '../templates/images/slider/min/';
$dir = opendir($dirname); 

while($file = readdir($dir)) {
	if($file != '.' && $file != '..' && !is_dir($dirname.$file))
	{
		//echo '<a href="'.$dirname.$file.'">'.$file.'</a><br />';
	}
}

closedir($dir);


$sql = 'SELECT id,alt,link,link_admin FROM image ORDER BY id DESC';
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());


$image_slide=array();

while($row = mysql_fetch_array($req, MYSQL_ASSOC)){	

    $image_slide[$row['id']]=array('id'=>$row['id'],'alt'=>$row['alt'],'link'=>$row['link'],'link_admin'=>$row['link_admin']);
}

include "templates/insert-image.html";
?>
