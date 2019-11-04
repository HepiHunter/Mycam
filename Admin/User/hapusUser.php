<?php
include "../../koneksi.php";

$id=$_GET['id'];
$modal=mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
header('location:dataUser.php');
if (isset($_GET['id'])) {
	if (empty($_GET['id'])) {
		echo "<b>Data yang Dihapus Tidak Ada</b>";
	}else{
		$delete = mysqli_query($conn, "DELETE FROM users WHERE id='$_GET[id]'") or die("Mysql Error : ".mysqli_error($conn));
		if ($delete) {
			echo "Berhasil Hapus";
			echo "<a href='dataUser.php'>Kembali</a>";
		}
	}
}
?>