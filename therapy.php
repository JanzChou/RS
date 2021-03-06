<?php include('lib/config.php'); include('lib/authlogin.php'); include('lib/core.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Terapi - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
	<?php $menu = 'therapy'; include('faces/header.php'); ?>
  <div id="body">
   	<h1>Terapi</h1>
    
    <input type="button" value="Tambah" class="button fl-left" onclick="window.location='add-therapy.php';" />
    
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get" class="fl-right">
    	<input type="search" name="q" id="q" placeholder="Pencarian..." value="<?= $_GET['q']; ?>" class="input" autocomplete="off" />
    </form>
    
    <br /><br /><br />
    
    <table width="100%" border="0" class="datagrid">
          <tr>
            <th width="7%">ID</th>
            <th width="27%">Nama</th>
            <th width="44%">Deskripsi</th>
            <th width="12%">Harga</th>
            <th width="10%"></th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT * FROM therapy WHERE name LIKE '%$q%' OR description LIKE '%$q%' ORDER BY name ASC;");
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td align="right"><?= formatNumber('Rp. ',$row['price'],',-'); ?></td>
                <td align="center">
                	<a title="Edit" href="edit-therapy.php?id=<?= $row['id']; ?>"><img src="assets/img/edit.png" width="14" /></a> &nbsp; 
                    <a title="Hapus" href="delete.php?tbl=therapy&id=<?= $row['id']; ?>" onclick="return confirmDelete();"><img src="assets/img/delete.png" width="14" /></a>
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