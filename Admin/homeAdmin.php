<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location: ../login.php");
	}
	if ($_SESSION["level"] !== "ADM") {
		header("Location: ../login.php");
	}
	include("../koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>MYCAM_MALANG</title>
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/slide.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body id="myPage" data-spy="scroll" data-target=".nav" data-offset="50">
<!-- untuk mengatur isi dari navbar -->
<div class="nav">
    <ul>
        <li><a href="homeAdmin.php"> HOME </a></li>
        <li><a href="#contact"> CONTACT </a></li>
        <li><a href="User/dataUser.php"> DATA USER </a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> KAMERA
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Kamera/dataKamera.php"> DATA KAMERA </a></li>
            <li><a href="Kamera/addKamera.php">TAMBAH KAMERA</a></li>
          </ul>
        </li>
        <li><a href="Pesanan/dataPesanan.php"> PESANAN </a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Hai <?php echo $_SESSION['username']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../User/addAdmin.php"> ADD ADMIN </a></li>
            <li><a href="../logout.php"> LOGOUT </a></li>
          </ul>
        </li>
    </ul>
</div>
<div class="text-center">
 <!-- <div class=malasngoding-slider>
    <div class=isi-slider>
      <img src="../gambar/d3100.jpg" alt="Gambar 1">
      <img src="../gambar/d3400.jpg" alt="Gambar 2">
      <img src="../gambar/logo.jpg" alt="Gambar 3">
    </div>
  </div> -->

    <div class="container-fluid">
      <div class="jumbotron text-center">
        <div class="row" align="center">
          <div class="col-sm-3">
            <img src="..\Gambar\logo.jpg" style="height:200px" />
          </div>
          <div class="col-sm-9">
            <h1>Hello, Admin!</h1>
            <p>Selamat Datang di HomeSite Admin MyCam_Malang :)</p>
          </div>
      </div>
    </div>

    <div class="container" align="center">
      <h1>KOMENTAR CUSTOMER :)</h1><br>
    	<table id="kamera" class="table text-center table-bordered" >
      <thead>
        <b><tr class="active">
          <td width="100">ID</td>
          <td width="100">Nama</td>
          <td width="200">Komentar</td>
        </tr></b>
      </thead>
      <tbody>
        <?php
          $komentar = mysqli_query($conn, "SELECT * FROM komentar");
          while ($show = mysqli_fetch_array($komentar)) {
        ?>
        <tr>
          <td><?php echo $show['id_kom'];?></td>
          <td><?php echo $show['nama'];?></td>
          <td><?php echo $show['koment'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      </table>
    </div>

	<footer class="text-center">
	  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
	    <span class="glyphicon glyphicon-chevron-up"></span>
	  </a><br>
	  <div id="contact" align="center">
	  <h2 class="text-center">Contact</h3><br>
	    <p>Bingung ? Hubungi kami aja</p>
	    <p><span class="glyphicon glyphicon-map-marker"></span> Tlogomas, Malang, Jawa Timur</p>
	    <p><span class="glyphicon glyphicon-phone"></span> Phone : 081232275604</p>
	    <p><span class="glyphicon glyphicon-envelope"></span> Email : mycam_malang@gmail.com</p>
	  </div>
	</footer>
</body>
</html>