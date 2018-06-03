<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['treatment_date']);
$medical_procedure_id = secureId($_POST['medical_procedure_id']);
$description = posting($_POST['description']);
$price = secureId($_POST['price']);
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	$medical_procedure_price = getMedicalProcedurePrice($medical_procedure_id);
	
	mysql_query("INSERT INTO `transaction_treatment` (id, transaction_id, `date`, medical_procedure_id, description, price, status) VALUES (null, '$transaction_id', '$date', '$medical_procedure_id', '$description', '$medical_procedure_price', '$status');");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	$medical_procedure_price = getMedicalProcedurePrice($medical_procedure_id);
	
	mysql_query("UPDATE `transaction_treatment` SET transaction_id = '$transaction_id', `date` = '$date', medical_procedure_id = '$medical_procedure_id', description = '$description', price = '$medical_procedure_price', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_treatment` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$medical_procedure_id,$medical_procedure_price,$price,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . $_SERVER['HTTP_REFERER']);

?>