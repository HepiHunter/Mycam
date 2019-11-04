<?php
if (session_status()==PHP_SESSION_NONE) 
{
  session_start();
}
if (!isset($_SESSION["level"])) 
{
  header("Location: ../../login.php");
}
include "../../koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
while($datashow = mysqli_fetch_array($data))
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MYCAM_MALANG</title>

<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".nav" data-offset="50">
<!-- untuk mengatur isi dari navbar -->
<div class="nav">
    <ul>
        <li><a href="../homeAdmin.php"> HOME </a></li>
        <li><a href="#contact"> CONTACT </a></li>
        <li><a href="../User/dataUser.php"> DATA USER </a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> KAMERA
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../Kamera/dataKamera.php"> DATA KAMERA </a></li>
            <li><a href="../Kamera/addKamera.php">TAMBAH KAMERA</a></li>
          </ul>
        </li>
        <li><a href="../Pesanan/dataPesanan.php"> PESANAN </a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Hai <!-- <?php echo $_SESSION['id']; ?> -->
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../User/addAdmin.php"> ADD ADMIN </a></li>
            <li><a href="../../logout.php""> LOGOUT </a></li>
          </ul>
        </li>
    </ul>
</div><br>

   <h2 align="center"><span class="glyphicon glyphicon-lock" ></span> Edit User </h2>
    <form action="editUserProses.php" method="POST" enctype="multipart/form-data">

  <div class="form1">
		<label for="id" class="col-sm-3 col-form-label"> ID </label>
			<input type="text" name="id" class="form-control"  value="<?php echo $datashow['id'];?>" readonly>

		<label for="username" class="col-sm-3 col-form-label"> Username </label>
			<input type="text" name="username" class="form-control"  value="<?php echo $datashow['username'];?>">

		<label for="password" class="col-sm-3 col-form-label"> Password </label>
			<input type="text" name="password" class="form-control"  value="<?php echo $datashow['password'];?>">

		<label for="nama" class="col-sm-3 col-form-label"> Nama </label>
			<input type="text" name="nama" class="form-control"  value="<?php echo $datashow['nama'];?>">

    <label for="jk" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
                <div class="col-sm-8">
                  <label class="radio-inlines col-sm-8">
                    <input type="radio" name="jk" value="Laki-laki" <?php if ($datashow['jk'] == 'Laki-laki'){
                      echo 'checked';
                    }?>>Laki-laki &nbsp; &nbsp;
                  <input type="radio" name="jk" value="Perempuan" <?php if ($datashow['jk'] == 'Perempuan'){
                      echo 'checked';
                    }?>>Perempuan &nbsp; &nbsp;
                </div>

		<label for="alamat" class="col-sm-3 col-form-label"> Alamat </label>
			<input type="text" name="alamat" class="form-control"  value="<?php echo $datashow['alamat'];?>">

        <label for="foto" class="col-sm-3 col-form-label"> Foto </label>
        	<img src="../../Gambar/<?php echo $datashow['foto'];?>" style="width: 150px; height: 130px"><br><br>
        	<input type="file" class="form-control" name="foto" value="<?php echo $datashow['foto'];?>">
            <input type="submit" name="update" value="EDIT" class="btn btn-primary">
            <button onclick="goBack()">Cancel</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
                </div>
                </form>

            <?php } ?>
