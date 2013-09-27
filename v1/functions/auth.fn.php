<?php
    class Auth{
        static function isLogged(){
            if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['pass']) ){
                extract($_SESSION['Auth']);
                mysql_connect("localhost", "root","root");
                mysql_select_db("kinder");
                $sql = "SELECT id FROM users WHERE login='$login' AND pass='$pass'";
                $req = mysql_query($sql) or die(mysql_error());
                    if(mysql_num_rows($req)>0){
                        return true;
                    }
                    else{
                        return false;
                    }
            }
            else{
                return false;
            }
        }
    }
?>