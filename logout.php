<?php
include('lib/config.php');
session_start();
session_destroy();
header('Location:' . URL_WEB);
?>