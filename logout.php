<?php
session_start();
	$_SESSION['logged'] = 0;
	header ('Refresh: 0; URL=adminlogin.php');
?>
