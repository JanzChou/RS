<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['room_date']);
$room_id = secureId($_POST['room_id']);
$description = $_POST['description'];
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */

if($dispatch == 'add')
{
	$room_price = getRoomPrice($room_id);
	
	mysql_query("INSERT INTO `transaction_room` (id, transaction_id, date, room_id, description, price, status) VALUES (null, '$transaction_id', '$date', '$room_id', '$description', '$room_price', '$status');");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	$room_price = getRoomPrice($room_id);
	
	mysql_query("UPDATE `transaction_room` SET transaction_id = '$transaction_id', date = '$date', room_id = '$room_id', description = '$description', price = '$room_price', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_room` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$room_id,$description,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/edit-inpatient.php?id=' . $transaction_id . '&ref=success');

?>