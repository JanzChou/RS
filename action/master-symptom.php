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
	mysql_query("INSERT INTO `symptom` (id, name, description) VALUES ('$id', '$name', '$description');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `symptom` SET name = '$name', description = '$description' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `symptom` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$name,$description,$price);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/symptom.php?ref=success');


?>