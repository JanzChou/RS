<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Dokter - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
	<?php $menu = 'doctor'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Dokter</h1>
    
    <input type="button" value="Tambah" class="button fl-left" onclick="window.location='add-doctor.php';" />
    
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get" class="fl-right">
    	<input type="search" name="q" id="q" placeholder="Pencarian..." value="<?= $_GET['q']; ?>" class="input" autocomplete="off" />
    </form>
    
    <br /><br /><br />
    
    <table width="100%" border="0" class="datagrid">
          <tr>
            <th width="7%">ID</th>
            <th width="21%">Nama</th>
            <th width="15%">Spesialis</th>
            <th width="10%">JK</th>
            <th width="10%">Telepon</th>
            <th width="20%">Jadwal</th>
            <th width="6%"></th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT doctor.* , specialist.title AS specialist_title, specialist.name AS specialist_name, gender.name AS gender FROM doctor, specialist, gender WHERE doctor.specialist_id = specialist.id AND doctor.gender_id = gender.id AND doctor.name LIKE '%$q%' ORDER BY doctor.name ASC;");
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $row['id']; ?></td>
                <td><?= $row['name']; ?>, <?= $row['specialist_title']; ?></td>
                <td><?= $row['specialist_name']; ?></td>
                <td align="center"><?= $row['gender']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['Jadwal']; ?></td>
                <td align="center">
                	<a title="Edit" href="edit-doctor.php?id=<?= $row['id']; ?>"><img src="assets/img/edit.png" width="14" /></a> &nbsp; 
                    <a title="Hapus" href="delete.php?tbl=doctor&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
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