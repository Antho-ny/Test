<?php
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/auth.fn.php";
//include "../functions/session.fn.php";

session_start();
$db['link']=database_connect($db);

if(!empty($_POST['login']) && !empty($_POST['pass'])){
    
    $login=$_POST['login'];//mysql_real_escape_string($_POST['title']);
    $pass=$_POST['pass'];
    $sql = " SELECT id FROM users WHERE login='$login' AND pass='$pass' ";
    $req = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($req)>0){
        $_SESSION['Auth'] = array(
            'login' => $login,
            'pass' => $pass
        );
        header("Location:admin.php");
    }
    else{
        echo '<script type="text/javascript" src="../js/script.js"></script>';
    }
}

?>