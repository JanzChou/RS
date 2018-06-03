<?php include('lib/config.php'); include('lib/authlogin.php'); include('lib/core.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Billing - <?= TITLE_WEB; ?></title>
</head>

<body onload="window.print();">

<?php
include('lib/connect.php');
$index = mysql_query("SELECT transaction.*, transaction_doctor.doctor_id FROM transaction, transaction_doctor WHERE transaction.id = transaction_doctor.transaction_id AND transaction.id = " . $_GET['id']);
$data = mysql_fetch_assoc($index);

$total = getTotalPrice($data['id']);

$index = mysql_query("SELECT patient.*, gender.name AS gender FROM patient, gender WHERE patient.id = $data[patient_id] AND patient.gender_id = gender.id LIMIT 1;");
$patient = mysql_fetch_assoc($index);

include('lib/close.php');
?>

<div id="page">
  <div id="body">

	<img src="assets/img/header.png" width="540" height="85" />
    
    <br /><br />
    
   	<h1>Billing</h1>
    
	<table width="100%" border="0">
		<tr>
			<td width="15%">No</td>
			<td width="4%">:</td>
			<td width="81%"><?php
			if($_GET['medical_service_group_id'] == 1) {
				echo 'RJ';
			} else if($_GET['medical_service_group_id'] == 2) {
				echo 'RI';
			}
			 ?>-<?= str_pad($_GET['id'],6,'0',STR_PAD_LEFT); ?></td>
		</tr>
        	<tr>
        	  <td>Pasien</td>
        	  <td>:</td>
        	  <td><?= $patient['name']; ?></td>
      	  </tr>
          <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td><?= $patient['gender']; ?></td>
        </tr>
          <tr>
              <td>TTL</td>
              <td>:</td>
              <td><?= $patient['birth_place']; ?> <?= $patient['birth_date']; ?></td>
        </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $patient['address']; ?></td>
          </tr>
          <tr>
              <td>Telepon</td>
              <td>:</td>
              <td><?= $patient['phone']; ?></td>
      </tr>
	</table>
    
    <br /><br />
    
    <h1>Dokter</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="8%">No</th>
            <th width="15%">Tanggal</th>
            <th width="58%">Dokter</th>
            <th width="19%">Harga</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_doctor.*, doctor.name AS doctor_name FROM transaction_doctor, doctor WHERE transaction_doctor.transaction_id = $_GET[id] AND transaction_doctor.doctor_id = doctor.id ORDER BY transaction_doctor.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['doctor_name']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
        
    <?php if($_GET['medical_service_group_id'] == 2) { ?>
    
    <br /><br />
    
    <h1>Kamar</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="6%">No</th>
            <th width="13%">Tanggal</th>
            <th width="14%">Kamar</th>
            <th width="40%">Deskripsi</th>
            <th width="27%">Harga</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_room.*, room.name AS room_name FROM transaction_room, room WHERE transaction_room.transaction_id = $_GET[id] AND transaction_room.room_id = room.id ORDER BY transaction_room.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['room_name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
    
    <?php } ?>
    
    <br /><br />
    
    <h1>Diagnosa</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="6%">No</th>
            <th width="13%">Tanggal</th>
            <th width="14%">Keluhan</th>
            <th width="56%">Deskripsi</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_diagnose.*, symptom.name AS symptom_name FROM transaction_diagnose, symptom WHERE transaction_diagnose.transaction_id = $_GET[id] AND transaction_diagnose.symptom_id = symptom.id ORDER BY transaction_diagnose.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['symptom_name']; ?></td>
                <td><?= $row['description']; ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
    
    <br /><br />
    
    <h1>Medikasi</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="49%">Medikasi</th>
            <th width="15%">Jumlah</th>
            <th width="17%">Harga</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_medicine.*, medicine.name AS medicine_name FROM transaction_medicine, medicine WHERE transaction_medicine.transaction_id = $_GET[id] AND transaction_medicine.medicine_id = medicine.id ORDER BY transaction_medicine.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['medicine_name']; ?></td>
                <td align="center"><?= $row['qty']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
    
    <br /><br />
    
    <h1>Lab / Radiologi</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Lab / Radiologi</th>
            <th width="39%">Deskripsi</th>
            <th width="17%">Harga</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_laboratory.*, laboratory.name AS laboratory_name FROM transaction_laboratory, laboratory WHERE transaction_laboratory.transaction_id = $_GET[id] AND transaction_laboratory.laboratory_id = laboratory.id ORDER BY transaction_laboratory.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['laboratory_name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
    
    <br /><br />
    
    <h1>Terapi</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Terapi</th>
            <th width="39%">Deskripsi</th>
            <th width="17%">Harga</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_therapy.*, therapy.name AS therapy_name FROM transaction_therapy, therapy WHERE transaction_therapy.transaction_id = $_GET[id] AND transaction_therapy.therapy_id = therapy.id ORDER BY transaction_therapy.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['therapy_name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
    
    <br /><br />
    
    <h1>Prosedure Medis</h1>
    
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Prosedur Medis</th>
            <th width="39%">Deskripsi</th>
            <th width="17%">Harga</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT transaction_treatment.*, medical_procedure.name AS medical_procedure_name FROM transaction_treatment, medical_procedure WHERE transaction_treatment.transaction_id = $_GET[id] AND transaction_treatment.medical_procedure_id = medical_procedure.id ORDER BY transaction_treatment.id ASC");
		  $i = 1;
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><?= $row['date']; ?></td>
                <td><?= $row['medical_procedure_name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
        </table>
        
        <br /><br /><br />

        
        <h1>Total Biaya: <?= formatNumber('Rp. ',$total,',-'); ?></h1>
        
        <br />
    
  </div>
    <?php include('faces/footer.php'); ?>
</div>

</body>
</html>

<script type="text/javascript" src="assets/plugin/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/form.js"></script>