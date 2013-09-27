<?php
// version 3
// author : JL, gaspard

/**
 * session_get_uid
 *
 * @return (int) id of the connected user
 * @return (bool) false
 * @author gaspard,JL
 */

function session_get_uid(){
	if(isset($_SESSION['user_id'])) {
		$uid=$_SESSION['user_id'];
		return $uid; 
	}
	else {
		return false;
	}
}

/**
 * session_get_name
 *
 * @return (string) name of the connected user
 * @return (bool) false
 * @author gaspard
 * @use session_get_uid
 */

function session_get_uname(){
	$uid = session_get_uid();
	if($uid) {
		$sql = 'SELECT name FROM users WHERE id='.$uid.';';
		$res = mysql_query($sql);
		$info_connection = mysql_fetch_array($res,MYSQL_ASSOC);
		if(isset($info_connection['name']) && $info_connection['name']){
			return $info_connection['name'];
		}
		else{
			return false;
		}
	}
	else {
		return false;
	}
}


/**
 * session_connect
 *
 * @param string $login 
 * @param string $pass 
 * @return (int) id of the connected user
 * @return (bool) false
 * @author gaspard,JL
 * @need database_connect
 */

function session_connect($login, $pass){
	
	$sql = 'SELECT id FROM users WHERE login="'
		.mysql_real_escape_string($login)
		.'" and pass ="'
		.mysql_real_escape_string($pass).'";';
	$res = mysql_query($sql);
	$info_connection = mysql_fetch_array($res,MYSQL_ASSOC);

	if(isset($info_connection['id']) && $info_connection['id']){
		$_SESSION['user_id'] = $info_connection['id'];
		return $info_connection['id'];
		
	}
	else{
		return false;
	}
}

/**
 * session_disconnect
 *
 * @return (bool) true
 * @author gaspard
 * @need session_connect
 */

function session_disconnect() {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
	return true;
}

 
?>