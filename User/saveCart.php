<?php
	session_start();
	include "../koneksi.php";
	if(isset($_POST['save'])){
		foreach($_POST['indexes'] as $key){
			$_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
		}

		$_SESSION['message'] = 'Cart updated successfully';
		header('location: viewCart.php');
	}
?>
