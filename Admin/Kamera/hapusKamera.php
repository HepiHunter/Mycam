<?php
include "../../koneksi.php";

$id_cam=$_GET['id_cam'];
$modal=mysqli_query($conn, "DELETE FROM kamera WHERE id_cam='$id_cam'");
header('location:dataKamera.php');
if (isset($_GET['id_cam'])) {
	if(empty($_GET['id_cam'])){
		echo "Data yang Dihapus Tidak Ada";
	}else{
		$delete=mysqli_query($conn, "DELETE FROM kamera WHERE id_cam='$_GET[id_cam]'") or die(mysqli_error($conn));
		if($delete){
			echo "Berhasil Hapus";
			echo "<a href='dataKamera.php'>Kembali</a>";
		}
	}
}
?>