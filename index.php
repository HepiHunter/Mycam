<?php
//untuk mengkoneksikan antara index.php dengan koneksi.php agar terhubung dengan database
  session_start();
  // if (!isset($_SESSION["nama"])) {
  //   header("Location : index.php");
  // }
  include "koneksi.php";

  //masih gagal
  // if (isset($_GET['kirim'])) {
  //   $nama = $_GET['nama'];
  //   $email = $_GET['email'];
  //   $koment = $_GET['koment'];

  //   $data = mysqli_query($mysqli, "INSERT INTO komentar SET nama='$nama', email='$email', koment='$koment'");

  //   if ($data) {
  //       echo '<div id="tampil_modal">
  //       <div id="modal">
  //       <div id="modal_atas"><h2>Information</h2></div>
  //       <br>Terimakasih Atas Kritik dan Saran Anda :)</p>
  //       <a href="index.php"><button id="oke">Oke</button></a>
  //       </div></div>';
  //   } else {
  //       echo '<div id="tampil_modal">
  //       <div id="modal">
  //       <div id="modal_atas"><h2>Information</h2></div>
  //       <br><p align="center">Gagal Berkomentar !</p>
  //       <a href="index.php"><button id="oke">Oke</button></a>
  //       </div></div>';
  //   }
  // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MYCAM_MALANG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<!-- untuk mengatur isi dari navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">MYCAM_MALANG</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="active" href="index.php">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#mycam">MYCAM</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="addCust.php">DAFTAR</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- mengatur slide foto di halaman home -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="slide1.jpg" alt="Sunrise" width="1500" height="100">
        <div class="carousel-caption">
          <h3>Sunrise</h3>
          <p>Indahnya ciptaan sang kuasa</p>
        </div>      
      </div>
      <div class="item">
        <img src="slide2.jpg" alt="Togetherness" width="1500" height="100">
        <div class="carousel-caption">
          <h3>Togetherness</h3>
          <p>Indahnya kebersamaan harus selalu diingat dan dikenang.</p>
        </div>      
      </div>
      <div class="item">
        <img src="slide3.jpg" alt="Mancing" width="1500" height="100">
        <div class="carousel-caption">
          <h3>TI-1E Mancing</h3>
          <p>Bersama meraih satu tujuan.</p>
        </div>      
      </div>
      <div class="item">
        <img src="slide4.jpg" alt="Sticker" width="1500" height="100">
        <div class="carousel-caption">
          <h3>Sticker MyCam_Malang</h3>
          <p>Dapatkan Sticker MyCam_Malang setiap menyewa.</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (mengatur menu ABOUT) -->
<div id="about" class="container text-center">
  <h3>MYCAM_MALANG</h3>
  <p><em>Hello MyCammers!</em></p>
  <p>MyCam_Malang adalah sebuah jasa persewaan kamera yang berlokasi di JL. Raya Tlogomas, Malang, Jawa Timur. MyCam_Malang belum lama berdiri, kira kira pada bulan April 2017 kami mendirikan usaha persewaan kamera ini. Untuk anda yang hobi dengan dunia photography tapi tidak punya kamera atau bosan dengan hasil kamera hp bisa sewa di kami looo. Ada beberapa tipe kamera dari Nikon yang siap untuk disewa oleh MyCammers sekalian. Kami juga menyediakan YiCam yang simple untuk MyCammers yang tidak ingin repot membawa kamera yang besar hehehe. Mungkin saat ini hanya beberapa tipe kamera Nikon yang kami sewakan, tapi do'a kan saja semoga usaha persewaan kami semakin sukses dan bisa menambah stok kamera kami dengan tipe kamera yang berbeda, Aamiin. Untuk harga yang kami tawarkan sangat murah meriah, tidak menguras kantong kok MyCammers, dan juga banyak diskon-diskon yang siap kami berikan kepada MyCammers sekalian, jadi jangan khawatir jika uang kalian akan habis jika menyewa kamera di kami hehehe :D</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Gideon Mei Ditama</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="Gambar/user.png" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>Owner</p>
        <p>Sang pendiri MyCam_Malang :D</p>
        <p>Member since 2017</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>MyCam_Malang</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="Gambar/logo.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>Logo MyCam_Malang</p>
        <p>Created with @PicsArt 2017</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Mochamad Wildan Nur Fajar</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="Gambar/user.png" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Advertising</p>
        <p>Bagian Periklanan :p</p>
        <p>Member since 2017</p>
      </div>
    </div>
  </div>
</div>

<!-- Container (mengatur menu MYCAM) -->
<div id="mycam" class="bg-1">
  <div class="container">
    <h3 class="text-center">MY CAM</h3>
    <p class="text-center">Daftar Kamera yang kami sewakan.<br> Jangan lupa menyewa yaa, Log In dulu ;)</p>
    <table class="table text-center">
    <thead>
      <b><tr class="active">
        <td width="50">ID</td>
        <td width="200">Kamera</td>
      </tr></b>
    </thead>
    <tbody>
      <?php
        $kamera = mysqli_query($conn, "SELECT * FROM kamera");
        while ($show = mysqli_fetch_array($kamera)) {
      ?>
      <tr>
        <td><?php echo $show['id_cam'];?></td>
        <td><?php echo $show['nama_cam'];?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>

<!-- Container (mengatur menu CONTACT) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>

<form action="index.php" method="GET">
  <div class="row">
    <div class="col-md-4">
      <p>Bingung ? Hubungi kami aja</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Tlogomas, Malang, Jawa Timur</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone : 081232275503</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email : mycam_malang@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="nama" name="nama" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="koment" name="koment" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit" name="kirim" id="kirim">Send</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>

<!-- mengatur bagian Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <img src="Gambar/logo.jpg" alt="logo" width="60" height="60">
  <p>Instagram : @mycam_malang</a></p> 
</footer>
</body>
</html>
