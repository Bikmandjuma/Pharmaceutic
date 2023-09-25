<?php
	session_start();
	session_destroy();
	include_once('Connect/connection.php');

	header('location:login.php');
?>