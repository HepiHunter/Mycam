<?php
session_start();
  if (!isset($_SESSION["level"])) 
  {
    header("Location: ../homeAdmin.php");
  }
include "../../koneksi.php";
$id_cam=$_GET['id_cam'];
$data = mysqli_query($conn, "SELECT * FROM kamera WHERE id_cam='$id_cam'");
while($datashow=mysqli_fetch_array($data))
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Hai <?php echo $_SESSION['username']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../User/addAdmin.php"> ADD ADMIN </a></li>
            <li><a href="../../logout.php"> LOGOUT </a></li>
          </ul>
        </li>
    </ul>
</div><br>

  <h2 align="center"><span class="glyphicon glyphicon-lock" ></span> Edit Kamera </h2>
    <form action="editKameraProses.php" method="POST" enctype="multipart/form-data">

    <div class="form1">
        <label for="id_cam" class="col-sm-3 col-form-label"> ID </label>
            <input type="text" name="id_cam" class="form-control"  value="<?php echo $datashow['id_cam'];?>" readonly>

        <label for="nama_cam" class="col-sm-3 col-form-label"> Nama Kamera </label>
            <input type="text" name="nama_cam" class="form-control" value="<?php echo $datashow['nama_cam'];?>">

        <label for="fitur" class="col-sm-3 col-form-label"> Fitur Kamera </label>
            <textarea name="fitur" class="form-control" required><?php echo $datashow['fitur'];?></textarea>

        <label for="perlengkapan" class="col-sm-3 col-form-label"> Perlengkapan Kamera </label>
            <textarea name="perlengkapan" class="form-control" required><?php echo $datashow['perlengkapan'];?></textarea>

        <label for="status" class="col-sm-3 col-form-label"> Status </label>
            <input type="hidden" name="status" class="form-control" value="<?php echo $datashow['id_cam']; ?>"></input>
        <select name="status" class="texbox" required>
            <option value="Ready" <?php if ($datashow['status']=="Ready") 
            { 
                echo "selected"; 
            } ?>>Ready</option>
            <option value="Booked" <?php if ($datashow['status']=="Booked") 
            { 
                echo "selected"; 
            } ?>>Booked</option>
            <option value="Rented" <?php if ($datashow['status']=="Rented") 
            { 
                echo "selected"; 
            } ?>>Rented</option>
        </select>

        <label for="hrg_sewa" class="col-sm-3 col-form-label"> Harga </label>
            <input type="text" name="hrg_sewa" class="form-control" value="<?php echo $datashow['hrg_sewa']; ?>">

      <div class="form-group">
      <label for="gambar" class="col-sm-3 col-form-label"> Gambar </label>
      <img src="../../Gambar/<?php echo $datashow['gambar'];?>" style="width: 150px; height: 130px"><br><br>
      <input type="file" class="form-control" name="gambar" value="<?php echo $datashow['gambar'];?>">
      </div>

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