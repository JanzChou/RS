<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Rawat Jalan - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
  <?php $menu = 'outpatient'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Tambah Rawat Jalan</h1>
    
    <form action="action/outpatient.php" method="post" id="formModel">
	<table width="100%" border="0">
		<tr>
			<td width="19%">ID</td>
			<td width="10%">:</td>
			<td width="71%">
				<input name="id" type="text" class="input" placeholder="* Auto Generate *" readonly="readonly" id="id" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Dokter</td>
			<td>:</td>
			<td>
				<select name="doctor_id" class="input" id="doctor_id">
                	<option value="">Pilih:</option>
                    <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT doctor.*, specialist.title AS specialist_title, specialist.name AS specialist_name FROM doctor, specialist WHERE doctor.specialist_id = specialist.id ORDER BY doctor.name ASC;");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name], $row[specialist_title] - $row[specialist_name]</option>";
					}
					include('lib/close.php');
					?>
			  	</select>
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
						echo "<option value='$row[id]'>P" . str_pad($row['id'],6,'0',STR_PAD_LEFT) . " - $row[name]</option>";
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
              	<input type="button" value="Simpan" class="button" onclick="return validateRegistrationOutpatient();" />
                <input type="reset" value="Batalkan" class="button" onclick="window.location='outpatient.php'" />
                <input type="hidden" name="dispatch" value="add" />
              </td>
            </tr>
	</table>
</form>
    
  </div>
    <?php include('faces/footer.php'); ?>
</div>

</body>
</html>

<script type="text/javascript" src="assets/plugin/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/form.js"></script>