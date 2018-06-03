<?php

$con = mysqli_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
if(!$con) {
	echo 'Database could not connect.';
	exit();
}

?>