<?php
// version 1
// editeur : gaspard
/**
 * fonction de connection de base de donnee
 * @param $db (array) > mes identifiants de base 
 * @return lien de base
 */function database_connect($db){	$link = mysql_connect($db['host'],$db['user'],$db['pass']);	if(!$link) die("erreur de connexion a la base de donnee".mysql_error());	if(!mysql_select_db($db['base'])) die ("selection de la vase impossible");	return $link;}

/**
 * fonction de deconnection de base de donnee
 * @param $link lien de base
 * @return rien
 */
function database_disconnect($link){	mysql_close($link);
}