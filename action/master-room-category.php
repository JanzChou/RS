<?php
include('../lib/config.php');
include('../lib/connect.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$name = posting($_POST['name']);
$description = $_POST['description'];


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	mysql_query("INSERT INTO `room_category` (id, name, description) VALUES ('$id', '$name', '$description');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `room_category` SET name = '$name', description = '$description' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `room_category` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$name,$description);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/room-category.php?ref=success');


?>