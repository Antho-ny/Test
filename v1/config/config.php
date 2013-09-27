<?php

$db = array();
$db['host'] = 'localhost'; 
$db['user'] = 'root'; // utilisateur
$db['pass'] = 'root'; //password
$db['base'] = 'kinder'; //nom de la base de donnee

/*
if($_SERVER['SERVER_NAME'] != 'localhost'){
	$db['host'] = 'xxxx'; 
	$db['user'] = 'xxxx'; // utilisateur
	$db['pass'] = 'xxxxx'; //password
	$db['base'] = 'xxxx'; //nom de la base de donnee
}

define('UPLOAD_DIR','uploads/');
define('EMAIL_CONTACT','monclient@macomp.com');
*/

define('APPLICATION_VERSION','0.2');
define('APPLICATION_TITLE','Kinder For adults');
define('APPLICATION_NAME','Kinder For adults');
define('CAPTCHA_PUBLIC_KEY','6LflhL0SAAAAAE5ZYioGcumoaH8OpuPH4Vh5avJx');
define('CAPTCHA_PRIVATE_KEY','6LflhL0SAAAAAL2AuOBBbOcmLYE5r0A120gP2z4-');
?>