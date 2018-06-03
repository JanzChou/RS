<?php
include('lib/config.php');
include('lib/connect.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_GET['id']);
$tbl = posting($_GET['tbl']);

mysql_query("DELETE FROM $tbl WHERE id = $id");

if($tbl == 'transaction') {
	mysql_query("DELETE FROM transaction_doctor WHERE transaction_id = $id");
}

include('lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$tbl);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . $_SERVER['HTTP_REFERER']);

?>