<?php include('lib/config.php'); include('lib/authlogin.php'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/stylesheet.css" />
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css" />
<title>Beranda - <?= TITLE_WEB; ?></title>
</head>

<body>

<div id="page">
	<?php $menu = 'home'; include('faces/header.php'); ?>
    <div id="body">
   <h1>About Us</h1>
      <h2> <br> <img src="assets/img/janz.jpg" width="200" height="200"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <img src="assets/img/kevin.jpg" width="200" height="200"/> </br> Nama: Januar Pangestu &nbsp; &nbsp; &nbsp; Nama: Kevin
            <br> Nim: 535140037 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nim: 535140038 </br> </h2>

   
    </div>
    <?php include('faces/footer.php'); ?>
</div>

</body>
</html>