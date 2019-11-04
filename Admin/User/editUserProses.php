<?php
session_start();
  if (!isset($_SESSION["level"])) 
  {
    header("Location: ../homeAdmin.php");
  }
include "../../koneksi.php"; //memanggil file koneksi.php untuk menghubungkan ke database

if (isset($_POST['update'])) 
{
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password=$_POST['password'];
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];

	if (empty($gambar)) {
		$data = mysqli_query($conn, "UPDATE users SET id='$id', username='$username', password='$password', nama='$nama', jk='$jk', alamat='$alamat' WHERE id='$id'") or die("data salah : ".mysqli_error($conn));
		echo "<script>alert('Data Berhasil di Update');document.location='dataUser.php';</script>";
	}

	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$foto = $_FILES['foto']['name'];
	$x = explode('.', $foto);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['foto']['size'];
	$file_tmp = $_FILES['foto']['tmp_name'];	

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)
	{
		if($ukuran < 1044070)
		{			
			move_uploaded_file($file_tmp, '../../Gambar/'.$foto);

			$data = mysqli_query($conn, "UPDATE users SET id='$id', username='$username', password='$password', nama='$nama', jk='$jk', alamat='$alamat', foto='$foto' WHERE id='$id'") or die("data salah : ".mysqli_error($conn));

		if ($data) 
	{
		echo "<script>alert('Data Berhasil di Update');document.location='dataUser.php';</script>";	
	}
	else
	{
		echo "<script>alert('Proses Gagal');document.location='dataUser.php';</script>";
	}
	}
	else
	{
		 echo "<script>alert('Terlalu Besar');document.location='dataUser.php';</script>";;
	}
	}
	elseif (empty($username) || empty($password) || empty($nama) || empty($alamat))
	{
		echo "<script>alert('Tidak Boleh Ada Data Yang Kosong, COBA LAGI!!');document.location='dataUser.php';</script>";	
	}
}

?>