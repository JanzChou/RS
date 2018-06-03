<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Kamar - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
  <?php $menu = 'room'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Tambah Kamar</h1>
    
    <form method="post" id="formModel" action="action/master-room.php">
	<table width="100%" border="0">
		<tr>
			<td width="19%">ID</td>
			<td width="10%">:</td>
			<td width="71%">
				<input name="id" type="text" class="input" readonly="readonly" placeholder="* Auto Generate *" id="id" autocomplete="off" size="65" />
			</td>
		</tr>
        <tr>
			<td>Kategori Kamar</td>
			<td>:</td>
			<td>
			  <select name="room_category_id" class="input" id="room_category_id">
                	<option value="">Pilih:</option>
                    <?php
                    include('lib/connect.php');
					$index = mysql_query("SELECT * FROM room_category ORDER BY name ASC");
					while($row = mysql_fetch_assoc($index)) {
						echo "<option value='$row[id]'>$row[name]</option>";
					}
					include('lib/close.php');
					?>
	  	  </select></td>
		</tr>
        	<tr>
			<td>Nama Kamar</td>
			<td>:</td>
			<td>
				<input name="name" type="text" class="input" id="name" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Deskripsi</td>
			<td>:</td>
			<td>
				<textarea name="description" class="input" id="description" autocomplete="off" cols="65" rows="7"></textarea>
			</td>
		</tr>
        	<tr>
			<td>Harga</td>
			<td>:</td>
			<td>
				<input name="price" type="text" class="input" id="price" autocomplete="off" size="65" />
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
              	<input type="button" value="Simpan" class="button" onclick="return validateMasterRoom();" />
                <input type="reset" value="Batalkan" class="button" onclick="window.location='room.php'" />
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