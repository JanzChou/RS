<?php
include('../lib/config.php');
include('../lib/connect.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$room_category_id = secureId($_POST['room_category_id']);
$name = posting($_POST['name']);
$description = $_POST['description'];
$price = secureId($_POST['price']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	mysql_query("INSERT INTO `room` (id, room_category_id, name, description, price) VALUES ('$id', '$room_category_id', '$name', '$description', '$price');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `room` SET room_category_id = '$room_category_id', name = '$name', description = '$description', price = '$price' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `room` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$name,$description,$price);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/room.php?ref=success');


?>