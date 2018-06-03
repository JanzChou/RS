<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['medicine_date']);
$medicine_id = secureId($_POST['medicine_id']);
$qty = secureId($_POST['qty']);
$price = secureId($_POST['price']);
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	$medicine_price = getMedicinePrice($medicine_id) * $qty;
	
	mysql_query("INSERT INTO `transaction_medicine` (id, transaction_id, `date`, medicine_id, qty, price, status) VALUES (null, '$transaction_id', '$date', '$medicine_id', '$qty', '$medicine_price', '$status');");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	$medicine_price = getMedicinePrice($medicine_id);
	
	mysql_query("UPDATE `transaction_medicine` SET transaction_id = '$transaction_id', `date` = '$date', medicine_id = '$medicine_id', qty = '$qty', price = '$medicine_price', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_medicine` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$medicine_id,$qty,$price,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . $_SERVER['HTTP_REFERER']);

?>