<?php
session_start();
if (!isset($_SESSION['click_count'])) {
	$_SESSION['click_count'] = 0;
	$_SESSION['money'] = 0;
}

if (isset($_POST['click'])) {
	$_SESSION['click_count']++;
	$_SESSION['money'] +=1;
}


echo $_SESSION['money'];

?>