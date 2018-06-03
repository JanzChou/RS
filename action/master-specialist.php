<?php
include('../lib/config.php');
include('../lib/connect.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$title = posting($_POST['title']);
$name = posting($_POST['name']);
$description = $_POST['description'];


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	mysql_query("INSERT INTO `specialist` (id, title, name, description) VALUES ('$id', '$title', '$name', '$description');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `specialist` SET name = '$name', title = '$title', description = '$description' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `specialist` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$name,$description,$price);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/specialist.php?ref=success');


?>