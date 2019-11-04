<?php 
  session_start();
  if (!isset($_SESSION["level"])) 
  {
    header("Location: ../homeAdmin.php");
  }
  include "../../koneksi.php";

   $carikode = mysqli_query($conn, "SELECT id_cam from kamera") or die (mysqli_error());
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
   $kodeotomatis = "KMR".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kodeotomatis = "KMR0001";
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
          <h2 align="center"><span class="glyphicon glyphicon-lock" ></span> Tambah Kamera </h2>
    <form action="addKameraProses.php" method="POST" enctype="multipart/form-data">
      <div class="form1">
        <label for="id_cam"> ID </label>
          <div class="col-sm-8">
            <input type="text" name="id_cam" class="form-control" value="<?php echo $kodeotomatis; ?>" readonly>
          </div>

      <label for="nama_cam"> Kamera </label>
      <input type="text" name="nama_cam"  placeholder="Kamera">

      <label for="fitur"> Fitur Kamera </label>
      <textarea name="fitur"  placeholder="Fitur"></textarea>

      <label for="perlengkapan"> Perlengkapan Kamera </label>
      <textarea name="perlengkapan"  placeholder="Perlengkapan"></textarea>

      <label for="ttl"> Harga Sewa </label>
      <input type="text" name="hrg_sewa"  placeholder="Harga Sewa per Hari">

      <!-- <label for="status"> Status </label>
      <input type="text" name="status"  placeholder="Status"> -->
      <label for="status" class="col-sm-3 col-form-label"> Status </label>
            <input type="hidden" name="status" class="form-control" value="<?php echo $datashow['id_cam']; ?>"></input>
      <select name="status" class="textbox" required>
            <option>Ready</option>
            <option>Booked</option>
            <option>Rented</option>
        </select>

      <div class="form-group">
      <label for="gambar">Gambar</label>
      <input type="file" class="form-control" name="gambar" required>
      </div>
      <br>
          <center><input type="submit" class="btn" name="submit" id="submit" value="Submit"/>
          <input type="reset" class="btn" name="reset" id="reset" value="Reset"/></center>
        </div></form>
      </div>
    </div>
  </div>
</body>
</html>