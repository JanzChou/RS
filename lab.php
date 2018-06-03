<?php include('lib/config.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Login - <?= TITLE_WEB; ?></title>
</head>
<body>
<div id="page">
	<?php include('faces/header-nologin.php'); ?>
<div id="body">
<table width="100%" border="0" class="datagrid">
    <h2> Jenis Pemeriksaan Lab</h2>
          <tr>
            <th width="17%">ID</th>
            <th width="27%">Nama</th>
            <th width="44%">Deskripsi</th>
          </tr>
          <?php
		  include('lib/connect.php');
		  $q = $_GET['q'];
		  $index = mysql_query("SELECT * FROM laboratory WHERE name LIKE '%$q%' OR description LIKE '%$q%' ORDER BY name ASC;");
		  while($row = mysql_fetch_assoc($index)) {
			  ?>
              <tr>
                <td align="center"><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['description']; ?></td>
              </tr>  
              <?php
		  }
		  include('lib/close.php');
		  ?>
    </table>
    </div>
    <br /><br />

    <?php include('faces/footer.php'); ?>
</div>
</body>
</html>
