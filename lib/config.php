<?php
error_reporting(0);

/* ********************** CONFIGURATION WEBSITE ********************** */
define('TITLE_WEB',' Rumah Sakit Jakarta ');
define('URL_WEB','http://localhost/RS');

/* ********************** CONFIGURATION DATABASE ********************** */
define('DATABASE_HOST','localhost');
define('DATABASE_USER','root');
define('DATABASE_PASSWORD',''); //passw0rd@
define('DATABASE_NAME','hospital');


function posting($val) {
	return trim(strip_tags($val));
}

function secureId($val) {
	return posting($val);
}

function mysql_query($sql) {
	global $con;
	return mysqli_query($con, $sql);
}

function mysql_fetch_assoc($identifier) {
	return mysqli_fetch_assoc($identifier);
}

?>