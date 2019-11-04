<?php
	session_start();
	include "../koneksi.php";
	unset($_SESSION['cart']);
	$_SESSION['message'] = 'Cart cleared successfully';
	header('location: homeCust.php');
?>