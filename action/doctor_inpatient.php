<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['doctor_date']);
$doctor_id = secureId($_POST['doctor_id']);
$description = $_POST['description'];
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */

if($dispatch == 'add')
{
	$doctor_price = getDoctorPrice($doctor_id);
	
	mysql_query("INSERT INTO `transaction_doctor` (id, transaction_id, date, doctor_id, description, price, status) VALUES (null, '$transaction_id', '$date', '$doctor_id', '$description', '$doctor_price', '$status');");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	$doctor_price = getDoctorPrice($doctor_id);
	
	mysql_query("UPDATE `transaction_doctor` SET transaction_id = '$transaction_id', date = '$date', doctor_id = '$doctor_id', description = '$description', price = '$doctor_price', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_doctor` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$doctor_id,$description,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/edit-inpatient.php?id=' . $transaction_id . '&ref=success');

?>