<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Dokter - <?= TITLE_WEB; ?></title>
</head>

<body>

<?php
include('lib/connect.php');
$index = mysql_query("SELECT * FROM doctor WHERE id = " . $_GET['id']);
$data = mysql_fetch_assoc($index);
include('lib/close.php');
?>

<div id="page">
  <?php $menu = 'doctor'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Edit Dokter</h1>
    
    <form action="action/doctor.php" method="post" enctype="multipart/form-data" id="formModel">
    
    <form method="post" id="formModel">
	<table width="100%" border="0">
		<tr>
			<td width="19%">ID</td>
			<td width="10%">:</td>
			<td width="71%">
				<input name="id" type="text" class="input" placeholder="* Auto Generate *" value="<?= $data['id']; ?>" readonly="readonly" id="id" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Spesialis</td>
			<td>:</td>
			<td>
				<select name="specialist_id" class="input" id="specialist_id">
                	<option value="">Pilih:</option>
                    <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM specialist ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						if($data['specialist_id'] == $row['id']) { $class = ' selected="selected"'; } else { $class = ''; }
						echo "<option" . $class . " value='$row[id]'>$row[title] - $row[name]</option>";
					}
					include('lib/close.php');
					?>
			  	</select>
			</td>
		</tr>
        	<tr>
			<td>Nama</td>
			<td>:</td>
			<td>
				<input name="name" type="text" class="input" value="<?= $data['name']; ?>" id="name" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
            	<select name="gender_id" class="input" id="gender_id">
                	<option value="">Pilih:</option>
                    <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM gender");
					while($row = mysql_fetch_assoc($index)) {
						if($data['gender_id'] == $row['id']) { $class = ' selected="selected"'; } else { $class = ''; }
						echo "<option" . $class . " value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
			  	</select>
            </td>
		</tr>
        	<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td>
				<input name="birth_place" type="text" value="<?= $data['birth_place']; ?>" class="input" id="birth_place" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
            	<input name="birth_date" type="text" class="input calendar" value="<?= $data['birth_date']; ?>" id="birth_date" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>
				<textarea name="address" class="input" id="address" autocomplete="off" cols="65" rows="7"><?= $data['address']; ?></textarea>
			</td>
		</tr>
        	<tr>
			<td>Telepon</td>
			<td>:</td>
			<td>
				<input name="phone" type="text" class="input" id="phone" autocomplete="off" value="<?= $data['phone']; ?>" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Jadwal</td>
			<td>:</td>
			<td>
            	<input name="Jadwal" type="text" class="input" id="Jadwal" autocomplete="off" value="<?= $data['Jadwal']; ?>" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Harga</td>
			<td>:</td>
			<td>
				<input name="price" type="number" class="input" id="price" autocomplete="off" value="<?= $data['price']; ?>" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Status</td>
			<td>:</td>
			<td>
				<select name="status" class="input" id="status">
                	<option value="">Pilih:</option>
                    <option<?php if($data['status'] == 1){echo' selected="selected"';} ?> value="1">Aktif</option>
                    <option<?php if($data['status'] == 0){echo' selected="selected"';} ?> value="0">Non Aktif</option>
			  	</select>
			</td>
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
              	<input type="button" value="Simpan" class="button" onclick="return validateDoctor();" />
                <input type="reset" value="Batalkan" class="button" onclick="window.location='doctor.php'" />
                <input type="hidden" name="dispatch" value="update" />
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