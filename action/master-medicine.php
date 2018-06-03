<?php
include('../lib/config.php');
include('../lib/connect.php');

/*  *******************  MODEL TABLE  *******************  */
$id = secureId($_POST['id']);
$code = posting($_POST['code']);
$name = posting($_POST['name']);
$indication = posting($_POST['indication']);
$dossage = posting($_POST['dossage']);
$variant = posting($_POST['variant']);
$packaging = posting($_POST['packaging']);
$stock = secureId($_POST['stock']);
$price = secureId($_POST['price']);
$expire = $_POST['expire'];


/*  *******************  REQUEST DISPATCH  *******************  */
$dispatch = $_POST['dispatch']; if($dispatch == '') { $dispatch = $_GET['dispatch']; }


/*  *******************  DATABASE METHOD  *******************  */
if($dispatch == 'add')
{
	mysql_query("INSERT INTO `medicine` (id, code, name, indication, dossage, variant, packaging, stock, price, expire) VALUES ('$id', '$code', '$name', '$indication', '$dossage', '$variant', '$packaging', '$stock', '$price', '$expire');");
}
else if($dispatch == 'update')
{
	mysql_query("UPDATE `medicine` SET code = '$code', name = '$name', indication = '$indication', dossage = '$dossage', variant = '$variant', packaging = '$packaging', stock = '$stock', price = '$price', expire = '$expire' WHERE id = '$id' LIMIT 1;");
}
else if($dispatch == 'delete')
{
	$id = secureId($_GET['id']);
	mysql_query('DELETE FROM `medicine` WHERE id = \'' . $id  . '\';');
}

include('../lib/close.php');

/*  *******************  DESTROY MODEL  *******************  */
unset($id,$code,$name,$indication,$dossage,$variant,$packaging,$stock,$price,$expire);

/*  *******************  REDIRECT PAGE  *******************  */
header('Location:' . URL_WEB . '/medicine.php?ref=success');


?>