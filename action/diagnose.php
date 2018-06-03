<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['diagnose_date']);
$symptom_id = secureId($_POST['symptom_id']);
$description = $_POST['description'];
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */

if($dispatch == 'add')
{
	mysql_query("INSERT INTO `transaction_diagnose` (id, transaction_id, date, symptom_id, description, status) VALUES (null, '$transaction_id', '$date', '$symptom_id', '$description', '$status');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `transaction_diagnose` SET transaction_id = '$transaction_id', date = '$date', symptom_id = '$symptom_id', description = '$description', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_diagnose` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$symptom_id,$description,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . $_SERVER['HTTP_REFERER']);

?>