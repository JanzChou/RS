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
<h1>Jadwal Dokter</h1>
    
    <table width="100%" border="0" class="datagrid">
          <tr>
            <th width="7%">ID</th>
            <th width="21%">Nama</th>
            <th width="15%">Spesialis</th>
            <th width="20%">Jadwal</th>
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
                <td><?= $row['Jadwal']; ?></td>
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
