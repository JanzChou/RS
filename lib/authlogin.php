<?php
session_start();
if($_SESSION['_id'] == NULL) {
	header('Location:' . URL_WEB . '/login.php?ref=logout');
	exit();
}
?>