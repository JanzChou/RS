<?php
include('../lib/config.php');
include('../lib/connect.php');

$id = secureId($_POST['id']);
$name = posting($_POST['name']);
$gender_id = secureId($_POST['gender_id']);
$birth_place = posting($_POST['birth_place']);
$birth_date = $_POST['birth_date'];
$address = $_POST['address'];
$phone = posting($_POST['phone']);
$email = posting($_POST['email']);
$photo = posting($_POST['photo']);
$register_date = posting($_POST['register_date']);
$create_date = posting($_POST['create_date']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */

if($dispatch == 'add')
{
	mysql_query("INSERT INTO `patient` (id, name, gender_id, birth_place, birth_date, address, phone, email, photo, register_date, create_date) VALUES ('$id', '$name', '$gender_id', '$birth_place', '$birth_date', '$address', '$phone', '$email', '$photo', NOW(), NOW());");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `patient` SET name = '$name', gender_id = '$gender_id', birth_place = '$birth_place', birth_date = '$birth_date', address = '$address', phone = '$phone', email = '$email', photo = '$photo' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `patient` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$name,$gender_id,$birth_place,$birth_date,$address,$phone,$email,$photo,$register_date,$create_date);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/patient.php?ref=success');


?>