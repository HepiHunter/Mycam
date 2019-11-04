<?php
  session_start();
  if (!isset($_SESSION["level"])) 
  {
    header("Location: ../homeAdmin.php");
  }
include "../../koneksi.php"; //memanggil file koneksi.php untuk menghubungkan ke database

if (isset($_POST['update'])) 
{
	$id_cam = $_POST['id_cam'];
	$nama_cam=$_POST['nama_cam'];
	$fitur=$_POST['fitur'];
	$perlengkapan=$_POST['perlengkapan'];
	$hrg_sewa=$_POST['hrg_sewa'];
	$status=$_POST['status'];

  if (empty($gambar)) {
    $data = mysqli_query($conn,"UPDATE kamera SET id_cam='$id_cam', nama_cam='$nama_cam', fitur='$fitur', perlengkapan='$perlengkapan', hrg_sewa='$hrg_sewa', status='$status' WHERE id_cam='$id_cam'") or die(mysqli_error($conn));
    echo "<script>alert('Data Berhasil di Update');document.location='dataKamera.php';</script>";
  }

  $ekstensi_fix = array('png','jpg','jpeg');
  $gambar = $_FILES['gambar']['name'];
  $x = explode('.', $gambar);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['gambar']['size'];
  $file_tmp = $_FILES['gambar']['tmp_name'];
   
  if(in_array($ekstensi, $ekstensi_fix) === true)
  {
    if($ukuran < 1044070)
    {     
      move_uploaded_file($file_tmp, '../../Gambar/'.$gambar);

      $data = mysqli_query($conn,"UPDATE kamera SET id_cam='$id_cam', nama_cam='$nama_cam', fitur='$fitur', perlengkapan='$perlengkapan', hrg_sewa='$hrg_sewa', status='$status', gambar='$gambar' WHERE id_cam='$id_cam'") or die(mysqli_error($conn));

		if ($data) 
	{
		echo "<script>alert('Data Berhasil di Update');document.location='dataKamera.php';</script>";	
	}
	else
	{
		echo "<script>alert('Proses Gagal');document.location='dataKamera.php';</script>";
	}
	}
	else
	{
		 echo "<script>alert('Terlalu Besar');document.location='dataKamera.php';</script>";;
	}
	}
	elseif (empty($nama_cam) ||empty($fitur) ||empty($perlengkapan) ||empty($hrg_sewa) ||empty($status)) 
	{
		echo "<script>alert('Tidak Boleh Ada Data Yang Kosong, COBA LAGI!!');document.location='dataKamera.php';</script>";	
	}
}

?>