<?php
// Core

function getTransID() {
	$id = 0;
	$index = mysql_query("SELECT id FROM transaction ORDER BY id DESC LIMIT 1;");
	while($row = mysql_fetch_assoc($index)) {
		$id = $row['id'];
	}
	return $id;
}

function getDoctorPrice($doctor_id) {
	$index = mysql_query("SELECT price FROM doctor WHERE id = $doctor_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['price'];
}

function getRoomPrice($room_id) {
	$index = mysql_query("SELECT price FROM room WHERE id = $room_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['price'];
}

function getMedicinePrice($medicine_id) {
	$index = mysql_query("SELECT price FROM medicine WHERE id = $medicine_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['price'];
}

function getLaboratoryPrice($laboratory_id) {
	$index = mysql_query("SELECT price FROM laboratory WHERE id = $laboratory_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['price'];
}

function getTherapyPrice($therapy_id) {
	$index = mysql_query("SELECT price FROM therapy WHERE id = $therapy_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['price'];
}

function getMedicalProcedurePrice($medical_procedure_id) {
	$index = mysql_query("SELECT price FROM medical_procedure WHERE id = $medical_procedure_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['price'];
}

function getTotalPrice($transaction_id) {
	$total = (int)0;

	$index = mysql_query("SELECT SUM(price) AS price FROM transaction_doctor WHERE transaction_id = $transaction_id");
	$doctor = mysql_fetch_assoc($index);
	$total += $doctor['price'];
	
	$index = mysql_query("SELECT SUM(price) AS price FROM transaction_room WHERE transaction_id = $transaction_id");
	$room = mysql_fetch_assoc($index);
	$total += $room['price'];
	
	$index = mysql_query("SELECT SUM(price) AS price FROM transaction_medicine WHERE transaction_id = $transaction_id");
	$medicine = mysql_fetch_assoc($index);
	$total += $medicine['price'];
	
	$index = mysql_query("SELECT SUM(price) AS price FROM transaction_laboratory WHERE transaction_id = $transaction_id");
	$laboratory = mysql_fetch_assoc($index);
	$total += $laboratory['price'];
	
	$index = mysql_query("SELECT SUM(price) AS price FROM transaction_therapy WHERE transaction_id = $transaction_id");
	$therapy = mysql_fetch_assoc($index);
	$total += $therapy['price'];
	
	$index = mysql_query("SELECT SUM(price) AS price FROM transaction_treatment WHERE transaction_id = $transaction_id");
	$medical_procedure = mysql_fetch_assoc($index);
	$total += $medical_procedure['price'];
	
	mysql_query("UPDATE transaction SET price = " . $total . " WHERE id = $transaction_id LIMIT 1");
	return $total;
}

function getCategoryName($category_id) {
	$index = mysql_query("SELECT name FROM room_category WHERE id = $category_id LIMIT 1");
	$data = mysql_fetch_assoc($index);
	return $data['name'];
}

function formatNumber($symbol,$number,$decimal_places)
{
	$number = strip_tags($number);
	$old_number = (int)$number;
	
	$number = str_replace(',','',$number);
	$number = str_replace('.','',$number);
	$number = str_replace('-','',$number);
	
	$character = strlen($number);
	
	if($character == 1)
	{
		$num = $number;
	}
	
	else if($character == 2)
	{
		$num = $number;
	}
	
	else if($character == 3)
	{
		$num = $number;
	}
	
	else if($character == 4)
	{
		$num = substr($number,0,1) . '.' . substr($number,1,3);
	}
	
	else if($character == 5)
	{
		$num = substr($number,0,2) . '.' . substr($number,2,3);
	}
	
	else if($character == 6)
	{
		$num = substr($number,0,3) . '.' . substr($number,3,3);
	}
	
	else if($character == 7)
	{
		$num = substr($number,0,1) . '.' . substr($number,1,3) . '.' . substr($number,4,3);
	}
	
	else if($character == 8)
	{
		$num = substr($number,0,2) . '.' . substr($number,2,3) . '.' . substr($number,5,3);
	}
	
	else if($character == 9)
	{
		$num = substr($number,0,3) . '.' . substr($number,3,3) . '.' . substr($number,6,3);
	}
	
	else if($character == 10)
	{
		$num = substr($number,0,1) . '.' . substr($number,1,3) . '.' . substr($number,4,3) . '.' . substr($number,7,3);
	}
	
	else if($character == 11)
	{
		$num = substr($number,0,2) . '.' . substr($number,2,3) . '.' . substr($number,5,3) . '.' . substr($number,8,3);
	}
	
	else if($character == 12)
	{
		$num = substr($number,0,3) . '.' . substr($number,3,3) . '.' . substr($number,6,3) . '.' . substr($number,9,3);
	}
	
	else if($character == 13)
	{
		$num = substr($number,0,1) . '.' . substr($number,1,3) . '.' . substr($number,4,3) . '.' . substr($number,7,3) . '.' . substr($number,10,3);
	}
	
	else if($character == 14)
	{
		$num = substr($number,0,2) . '.' . substr($number,2,3) . '.' . substr($number,5,3) . '.' . substr($number,8,3) . '.' . substr($number,11,3);
	}
	
	else if($character == 15)
	{
		$num = substr($number,0,3) . '.' . substr($number,3,3) . '.' . substr($number,6,3) . '.' . substr($number,9,3) . '.' . substr($number,12,3);
	}
	
	else if($character == 16)
	{
		$num = substr($number,0,1) . '.' . substr($number,1,3) . '.' . substr($number,4,3) . '.' . substr($number,7,3) . '.' . substr($number,10,3) . '.' . substr($number,13,3);
	}
	
	else if($character == 17)
	{
		$num = substr($number,0,2) . '.' . substr($number,2,3) . '.' . substr($number,5,3) . '.' . substr($number,8,3) . '.' . substr($number,11,3) . '.' . substr($number,14,3);
	}
	
	else if($character == 18)
	{
		$num = substr($number,0,3) . '.' . substr($number,3,3) . '.' . substr($number,6,3) . '.' . substr($number,9,3) . '.' . substr($number,12,3) . '.' . substr($number,15,3);
	}
	
	else if($character == 19)
	{
		$num = substr($number,0,1) . '.' . substr($number,1,3) . '.' . substr($number,4,3) . '.' . substr($number,7,3) . '.' . substr($number,10,3) . '.' . substr($number,13,3) . '.' . substr($number,16,3);
	}
	
	else if($character >= 20)
	{
		$num = 'NOT INDEX';
	}
	
	
	if($character <= 19)
	{
		if($num == 0) { $num = 0; }
		if($old_number < 0) { $num = '-' . $num; }
		
		$index = $symbol . $num . $decimal_places;
	}
	else
	{
		$num = $number;
	}
	
	unset($number,$num,$decimal_places,$symbol,$character,$old_number);
	
	return $index;

	unset($number,$num,$decimal_places,$symbol,$index,$character);
}

?>