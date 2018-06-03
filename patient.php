<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Pasien - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
	<?php $menu = 'patient'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Pasien</h1>
    
    <input type="button" value="Tambah" class="button fl-left" onclick="window.location='add-patient.php';" />
    
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get" class="fl-right">
    	<input type="search" name="q" id="q" placeholder="Pencarian..." value="<?= $_GET['q']; ?>" class="input" autocomplete="off" />
    </form>
    
    <br /><br /><br />
    
    <table width="100%" border="0" class="datagrid">
          <tr>
            <th width="6%">ID</th>
            <th width="23%">Nama</th>
            <th width="7%">JK</th>
            <th width="18%">TTL</th>
            <th width="22%">Alamat</th>
            <th width="16%">Telepon</th>
            <th width="8%"></th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT patient.*, gender.name AS gender FROM patient, gender WHERE patient.gender_id = gender.id AND patient.name LIKE '%$q%' ORDER BY patient.name ASC");
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td align="center"><?= $row['gender']; ?></td>
                <td><?= $row['birth_place']; ?> <?= $row['birth_date']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td align="center">
                	<a title="Edit" href="edit-patient.php?id=<?= $row['id']; ?>"><img src="assets/img/edit.png" width="14" /></a> &nbsp; 
                    <a title="Hapus" href="delete.php?tbl=patient&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
                </td>
              </tr>  
              <?php
		  }
		  include('lib/close.php');
		  ?>
    </table>
    </div>
    <?php include('faces/footer.php'); ?>
</div>

</body>
</html>

<script type="text/javascript" src="assets/plugin/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/form.js"></script>