<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Medikasi - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
  <?php $menu = 'medicine'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Tambah Medikasi</h1>
    
    <form method="post" id="formModel" action="action/master-medicine.php">
	<table width="100%" border="0">
		<tr>
			<td width="19%">ID</td>
			<td width="10%">:</td>
			<td width="71%">
				<input name="id" type="text" class="input" readonly="readonly" placeholder="* Auto Generate *" id="id" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Kode</td>
			<td>:</td>
			<td>
				<input name="code" type="text" class="input" id="code" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Nama Obat</td>
			<td>:</td>
			<td>
				<input name="name" type="text" class="input" id="name" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Indikasi</td>
			<td>:</td>
			<td>
				<textarea name="indication" class="input" id="indication" autocomplete="off" cols="65" rows="7"></textarea>
			</td>
		</tr>
        	<tr>
			<td>Dosis</td>
			<td>:</td>
			<td>
				<input name="dossage" type="text" class="input" id="dossage" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Variant</td>
			<td>:</td>
			<td>
				<textarea name="variant" class="input" id="variant" autocomplete="off" cols="65" rows="7"></textarea>
			</td>
		</tr>
        	<tr>
			<td>Packaging</td>
			<td>:</td>
			<td>
				<input name="packaging" type="text" class="input" id="packaging" autocomplete="off" size="65" />
			</td>
		</tr>
        	<tr>
			<td>Stok</td>
			<td>:</td>
			<td>
				<input name="stock" type="number" class="input" id="stock" autocomplete="off" size="65" />
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
			<td>Kadaluarsa</td>
			<td>:</td>
			<td>
				<input name="expire" type="text" class="input calendar" id="expire" autocomplete="off" size="65" />
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
              	<input type="button" value="Simpan" class="button" onclick="return validateMasterMedicine();" />
                <input type="reset" value="Batalkan" class="button" onclick="window.location='medicine.php'" />
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