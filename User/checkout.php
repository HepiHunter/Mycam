<?php
	session_start();
	include "../koneksi.php";
	//user needs to login to checkout
	$_SESSION['message'] = 'DURUNG DIGAWE!!!!!!!!!!!!!!!!!!!!!!';
	header('location: viewCart.php');
?>