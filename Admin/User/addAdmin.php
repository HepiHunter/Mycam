<?php 
session_start();
  if (!isset($_SESSION["level"])) 
  {
    header("Location: ../homeAdmin.php");
  }
	include "../../koneksi.php";

	if (isset($_GET["submit"])) {
		$id = $_GET["id"];
    $username = $_GET["username"]; 
    $password = $_GET["password"];
    $nama = $_GET["nama"];
    $jk = $_GET["jk"];
    $alamat = $_GET["alamat"];
    $level = ["ADM"];
    $foto = "user.png";

		$data = mysqli_query($conn, "INSERT INTO users SET id = '$id', username = '$username', password = '$password', nama = '$nama', jk = '$jk', alamat = '$alamat', level = 'ADM', foto = '$foto'") or die ("Data Salah : ".mysqli_error($conn));
    echo "<script>alert('Data Berhasil DiTambah');document.location='dataUser.php';</script>";

		
	}

  $carikode = mysqli_query($conn, "SELECT id from users") or die (mysqli_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kodeotomatis = "AD".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kodeotomatis = "AD0001";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>MYCAM_MALANG</title>
<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".nav" data-offset="50">
<div class="nav">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../homeAdmin"> HOME </a></li>
      <li><a href="#"> CONTACT </a></li>
      <li><a class="active" href="../User/dataUser.php"> DATA USER </a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> KAMERA
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Kamera/dataKamera.php"> Data Kamera </a></li>
          <li><a href="../Kamera/addKamera"> Tambah Kamera </a></li>
        </ul>
      </li>
      <li><a href="#"> PESANAN </a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Hai <?php echo $_SESSION['username']; ?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addAdmin.php"> ADD ADMIN </a></li>
          <li><a href="../../logout.php""> LOGOUT </a></li>
        </ul>
      </li>
    </ul>
  </div>
<br>
          <h2 align="center"><span class="glyphicon glyphicon-lock"></span> ADD ADMIN </h2>
        <form action="addAdmin.php" method="get">
          <div class="form1">
                <label for="id" class="col-sm-3 col-form-label"> ID Admin </label>
                  <div class="col-sm-8">
                  <input type="text" name="id" class="form-control" value="<?php echo $kodeotomatis; ?>" readonly>
                </div>

            <label for="username" class="col-sm-3 col-form-label"> Username </label>
              <input type="text" name="username" class="form-control" placeholder="Username">

            <label for="password" class="col-sm-3 col-form-label"> Password </label>
              <input type="password" name="password" class="form-control" placeholder="Password">

            <label for="nama" class="col-sm-3 col-form-label"> Nama </label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">

              <label for="jnsKlm" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jk" value="Laki-laki" checked> Laki-laki
                  </label>
                </div><br>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="jk" value="Perempuan"> Perempuan
                  </label>
                </div>


            <label for="alamat" class="col-sm-3 col-form-label"> Alamat </label>
              <input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah menurut KTP">
          <br>
           <center><button type="submit" class="btn" name="submit" id="submit"><span class="oi oi-person"></span> Register </button></center>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>