<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$date = posting($_POST['date']);
$medical_service_group_id = 1;
$doctor_id = secureId($_POST['doctor_id']);
$patient_id = secureId($_POST['patient_id']);
$price = secureId($_POST['price']);
$status = secureId($_POST['status']);

/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */

if($dispatch == 'add')
{
	// add transaction
	mysql_query("INSERT INTO `transaction` (id, `date`, medical_service_group_id, patient_id, price, status) VALUES ('$id', NOW(), '$medical_service_group_id', '$patient_id', '$price', '$status');");
	
	$transaction_id = getTransID();
	$doctor_price = getDoctorPrice($doctor_id);
	
	mysql_query("INSERT INTO transaction_doctor (id, transaction_id, `date`, doctor_id, price) VALUES (null, $transaction_id, NOW(), $doctor_id, $doctor_price);");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `transaction` SET medical_service_group_id = '$medical_service_group_id', patient_id = '$patient_id', price = 0 WHERE id = '$id' LIMIT 1;");
	
	$transaction_id = $id;
	$doctor_price = getDoctorPrice($doctor_id);
	
	mysql_query("UPDATE transaction_doctor SET doctor_id = $doctor_id, price = $doctor_price WHERE transaction_id = $transaction_id LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$medical_service_group_id,$patient_id,$price,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/edit-outpatient.php?id=' . $transaction_id . '&ref=success');

?>