<?php include('lib/config.php'); include('lib/authlogin.php'); include('lib/core.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Rawat Inap - <?= TITLE_WEB; ?></title>
</head>

<body>

<?php
include('lib/connect.php');
$index = mysql_query("SELECT * FROM transaction WHERE id = " . $_GET['id']);
$data = mysql_fetch_assoc($index);
$total = getTotalPrice($data['id']);
include('lib/close.php');
?>

<div id="page">
  <?php $menu = 'inpatient'; include('faces/header.php'); ?>
  <div id="body">
  	
    <input type="button" class="button fl-right" value="Cetak" onclick="window.open('billing.php?id=<?= $_GET['id']; ?>&medical_service_group_id=2');" />
    
   	<h1>Detail Rawat Inap</h1>
    
    <form action="action/inpatient.php" method="post" id="formModel">
	<table width="100%" border="0">
		<tr>
			<td width="19%">ID</td>
			<td width="10%">:</td>
			<td width="71%">
				<input name="id" type="text" class="input" value="<?= $data['id']; ?>" placeholder="* Auto Generate *" readonly="readonly" id="id" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
        	  <td>Pasien</td>
        	  <td>:</td>
        	  <td><select name="patient_id" class="input" id="patient_id">
        	    <option value="">Pilih:</option>
        	    <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM patient ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						if($data['patient_id'] == $row['id']) { $class = ' selected="selected"'; } else { $class = ''; }
						echo "<option" . $class . " value='$row[id]'>P" . str_pad($row['id'],6,'0',STR_PAD_LEFT) . " - $row[name]</option>";
					}
					include('lib/close.php');
					?>
      	    </select></td>
      	  </tr>
                	<tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>
              	<input type="button" value="Simpan" class="button" onclick="return validateRegistrationInpatient();" />
                <input type="reset" value="Kembali" class="button" onclick="window.location='inpatient.php'" />
                <input type="hidden" name="dispatch" value="update" />
              </td>
            </tr>
	</table>
    </form>
    
    <br /><br />
    
    <h1>Dokter</h1>
    
    <form action="action/doctor_inpatient.php" method="post" id="formDoctor">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="6%">No</th>
            <th width="13%">Tanggal</th>
            <th width="14%">Dokter</th>
            <th width="40%">Deskripsi</th>
            <th width="27%">Harga</th>
            <th width="11%"></th>
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
                <td><?= $row['description']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_doctor&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="doctor_date" id="doctor_date" class="input calendar" /></td>
                <td><select name="doctor_id" class="input" id="doctor_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT doctor.*, specialist.title AS specialist_title, specialist.name AS specialist_name FROM doctor, specialist WHERE doctor.specialist_id = specialist.id ORDER BY doctor.name ASC;");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name], $row[specialist_title] - $row[specialist_name]</option>";
					}
					include('lib/close.php');
					?>
                </select></td>
                <td><input name="description" type="text" class="input" autocomplete="off" id="description" size="30" /></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
                	<input type="button" value="Simpan" class="button" onclick="return validateDoctorInpatient();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
    <h1>Kamar</h1>
    
    <form action="action/room_inpatient.php" method="post" id="formRoom">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="6%">No</th>
            <th width="13%">Tanggal</th>
            <th width="14%">Kamar</th>
            <th width="40%">Deskripsi</th>
            <th width="27%">Harga</th>
            <th width="11%"></th>
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
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_room&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="room_date" id="room_date" class="input calendar" /></td>
                <td><select name="room_id" class="input" id="room_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT room.*, room_category.name AS room_category FROM room, room_category WHERE room.room_category_id = room_category.id ORDER BY room.name ASC;");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name] - $row[room_category]</option>";
					}
					include('lib/close.php');
					?>
                </select></td>
                <td><input name="description" type="text" class="input" autocomplete="off" id="description" size="45" /></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
                	<input type="button" value="Simpan" class="button" onclick="return validateRoomInpatient();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
    <h1>Diagnosa</h1>
    
    <form action="action/diagnose.php" method="post" id="formDiagnose">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="6%">No</th>
            <th width="13%">Tanggal</th>
            <th width="14%">Keluhan</th>
            <th width="56%">Deskripsi</th>
            <th width="11%"></th>
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
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_diagnose&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="diagnose_date" id="diagnose_date" class="input calendar" /></td>
                <td><select name="symptom_id" class="input" id="symptom_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM symptom ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
                </select></td>
                <td><input name="description" type="text" class="input" autocomplete="off" id="description" size="61" /></td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
                	<input type="button" value="Simpan" class="button" onclick="return validateDiagnose();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
    <h1>Medikasi</h1>
    
    <form action="action/medicine.php" method="post" id="formMedicine">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="49%">Medikasi</th>
            <th width="15%">Jumlah</th>
            <th width="17%">Harga</th>
            <th width="11%"></th>
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
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_medicine&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="medicine_date" id="medicine_date" class="input calendar" /></td>
                <td><select name="medicine_id" class="input" id="medicine_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM medicine ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
              </select></td>
                <td><input name="qty" type="number" class="input" min="1" autocomplete="off" id="qty" size="90" /></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
                	<input type="button" value="Simpan" class="button" onclick="return validateMedicine();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
    <h1>Lab / Radiologi</h1>
    
    <form action="action/laboratory.php" method="post" id="formLaboratory">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Lab / Radiologi</th>
            <th width="39%">Deskripsi</th>
            <th width="17%">Harga</th>
            <th width="11%"></th>
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
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_laboratory&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="laboratory_date" id="laboratory_date" class="input calendar" /></td>
                <td><select name="laboratory_id" class="input" id="laboratory_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM laboratory ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
              </select></td>
                <td><input name="description" class="input" min="1" autocomplete="off" id="description" size="41" /></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
               	  <input type="button" value="Simpan" class="button" onclick="return validateLaboratory();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
    <h1>Terapi</h1>
    
    <form action="action/therapy.php" method="post" id="formTherapy">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Terapi</th>
            <th width="39%">Deskripsi</th>
            <th width="17%">Harga</th>
            <th width="11%"></th>
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
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_therapy&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="therapy_date" id="therapy_date" class="input calendar" /></td>
                <td><select name="therapy_id" class="input" id="therapy_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM therapy ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
              </select></td>
                <td><input name="description" class="input" min="1" autocomplete="off" id="description" size="47" /></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
               	  <input type="button" value="Simpan" class="button" onclick="return validateTherapy();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
    <h1>Prosedure Medis</h1>
    
    <form action="action/treatment.php" method="post" id="formTreatment">
    	<table width="100%" border="0" class="datagrid">
          <tr>
            <th width="4%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Prosedur Medis</th>
            <th width="39%">Deskripsi</th>
            <th width="17%">Harga</th>
            <th width="11%"></th>
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
                <td align="center">
                	<a title="Hapus" href="delete.php?tbl=transaction_treatment&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
			  $i++;
		  }
		  include('lib/close.php');
		  ?>
          	<tr>
                <td>&nbsp;</td>
                <td><input type="text" name="treatment_date" id="treatment_date" class="input calendar" /></td>
                <td><select name="medical_procedure_id" class="input" id="medical_procedure_id">
                  <option value="">Pilih:</option>
                  <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM medical_procedure ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
              </select></td>
                <td><input name="description" class="input" min="1" autocomplete="off" id="description" size="22" /></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                	<input type="hidden" name="transaction_id" value="<?= $_GET['id']; ?>" />
                    <input type="hidden" name="dispatch" value="add" />
               	  <input type="button" value="Simpan" class="button" onclick="return validateTreatment();" />
                </td>
          </tr>
        </table>
    </form>
    
    <br /><br />
    
  </div>
    <?php include('faces/footer.php'); ?>
</div>

</body>
</html>

<script type="text/javascript" src="assets/plugin/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/form.js"></script>