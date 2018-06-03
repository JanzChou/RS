<?php
include('../lib/config.php');
include('../lib/connect.php');
include('../lib/core.php');

/*  *******************  MODEL TABLE  *******************  */
/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$transaction_id = secureId($_POST['transaction_id']);
$date = posting($_POST['laboratory_date']);
$laboratory_id = secureId($_POST['laboratory_id']);
$description = posting($_POST['description']);
$price = secureId($_POST['price']);
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	$laboratory_price = getLaboratoryPrice($laboratory_id);
	
	mysql_query("INSERT INTO `transaction_laboratory` (id, transaction_id, `date`, laboratory_id, description, price, status) VALUES (null, '$transaction_id', '$date', '$laboratory_id', '$description', '$laboratory_price', '$status');");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'update')
{
	$laboratory_price = getLaboratoryPrice($laboratory_id);
	
	mysql_query("UPDATE `transaction_laboratory` SET transaction_id = '$transaction_id', `date` = '$date', laboratory_id = '$laboratory_id', description = '$description', price = '$laboratory_price', status = '$status' WHERE transaction_id = '$transaction_id' LIMIT 1;");
	
	getTotalPrice($transaction_id);
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `transaction_laboratory` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$date,$laboratory_id,$qty,$price,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . $_SERVER['HTTP_REFERER']);

?>