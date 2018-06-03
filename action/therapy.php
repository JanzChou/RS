<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['therapy_date']);
$therapy_id = secureId($_POST['therapy_id']);
$description = posting($_POST['description']);
$price = secureId($_POST['price']);
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	$therapy_price = getTherapyPrice($therapy_id);
	
	mysql_query("INSERT INTO `transaction_therapy` (id, transaction_id, `date`, therapy_id, description, price, status) VALUES (null, '$transaction_id', '$date', '$therapy_id', '$description', '$therapy_price', '$status');");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	$therapy_price = getTherapyPrice($therapy_id);
	
	mysql_query("UPDATE `transaction_therapy` SET transaction_id = '$transaction_id', `date` = '$date', therapy_id = '$therapy_id', description = '$description', price = '$therapy_price', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_therapy` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$therapy_id,$qty,$price,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . $_SERVER['HTTP_REFERER']);

?>