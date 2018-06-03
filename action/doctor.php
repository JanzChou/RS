<?php
include('../lib/config.php');
include('../lib/connect.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$specialist_id = secureId($_POST['specialist_id']);
$name = posting($_POST['name']);
$gender_id = secureId($_POST['gender_id']);
$birth_place = posting($_POST['birth_place']);
$birth_date = $_POST['birth_date'];
$address = $_POST['address'];
$phone = posting($_POST['phone']);
$Jadwal = posting($_POST['Jadwal']);
$price = secureId($_POST['price']);
$status = secureId($_POST['status']);


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	mysql_query("INSERT INTO `doctor` (id, specialist_id, name, gender_id, birth_place, birth_date, address, phone, Jadwal, price, status) VALUES ('$id', '$specialist_id', '$name', '$gender_id', '$birth_place', '$birth_date', '$address', '$phone', '$Jadwal', '$price', '$status');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `doctor` SET specialist_id = '$specialist_id', name = '$name', gender_id = '$gender_id', birth_place = '$birth_place', birth_date = '$birth_date', address = '$address', phone = '$phone', Jadwal = '$Jadwal', price = '$price', status = '$status' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `doctor` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$specialist_id,$name,$gender_id,$birth_place,$birth_date,$address,$phone,$photo,$price,$status);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/doctor.php?ref=success');


?>