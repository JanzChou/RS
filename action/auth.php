<?php
include('../lib/config.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
include('../lib/connect.php');
$index = mysql_query("SELECT * FROM admin WHERE Username = '$username' AND Password = '$password' LIMIT 1;");
while($row = mysql_fetch_assoc($index)) {
	session_start();
	$_SESSION['id'] = $row['id'];
	$_SESSION['_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
}
include('../lib/close.php');
header('Location:' . URL_WEB);
?>