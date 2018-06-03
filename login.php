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
	<?php $menu = 'login'; include('faces/header-nologin.php'); ?>
    <div id="body">
      <form id="frmSubmit" name="frmSubmit" method="post" action="action/auth.php">
        <center>
        <table width="295" border="0">
          <tr>
            <td><h1>Masuk</h1></td>
          </tr>
          <tr>
            <td width="79">Username</td>
          </tr>
          <tr>
            <td><input name="username" type="text" class="input" id="username" size="40" /></td>
          </tr>
          <tr>
            <td>Password</td>
          </tr>
          <tr>
            <td><input name="password" type="password" class="input" id="password" size="40" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><input name="button" type="submit" class="button" id="button" value="Login" /></td>
          </tr>
        </table>
        </center>
      </form>
    </div>
    
    <br /><br />

    <?php include('faces/footer.php'); ?>
</div>

</body>
</html>