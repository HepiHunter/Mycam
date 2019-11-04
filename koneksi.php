<?php
	$server = "localhost";
	$usernames = "root";
	$passwords = "";
	$database = "tubes";

	$conn = mysqli_connect($server, $usernames, $passwords, $database);

	//Check error, jika terdapat error tutup koneksi dengan mysql
	if (!$conn) {
		die("Gagal Terhubung dengan MySQL: ".mysqli_connect_error());
	}
?>