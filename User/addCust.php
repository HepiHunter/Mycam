<?php 
	session_start();
	include "../koneksi.php";

	if (isset($_GET["submit"])) {
		$id = $_GET["id"];
		$nama = $_GET["nama"];
		$jk = $_GET["jk"];
		$alamat = $_GET["alamat"];
		$username = $_GET["username"];
		$password = $_GET["password"];
		$level = "CS";
		$foto = "user.png";

		$data = mysqli_query($conn, "INSERT INTO users SET id = '$id', username = '$username', password = '$password', nama = '$nama', jk = '$jk', alamat = '$alamat', level = '$level', foto = '$foto'") or die ("Data Salah : ".mysqli_error($conn));
    echo "<script>alert('Data Berhasil DiTambah');document.location='../login.php';</script>";
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
   $kodeotomatis = "CS".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kodeotomatis = "CS0001";
  }
?>

<!DOCTYPE html>
<html lang="en">
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
        <li><a href="homeCust.php"> HOME </a></li>
        <li><a href="#contact"> CONTACT </a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Hai
          <span class="caret"></span></a>
          <ul class="dropdown-menu">      
          	<li><a href="../Login.php"> LOGIN </a></li>
          	<li><a href="addCust.php"> DAFTAR </a></li>
          </ul>
        </li>
    </ul>
</div>
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="jumbotron">
          <h2><span class="glyphicon glyphicon-lock"></span> Daftar Customer </h2>
      	</div>
		<form action="addCust.php" method="get">
          <div class="col-sm-1"></div>
	          <div class="col-sm-10">
		          <div class="form-group row">
		            <label for="id" class="col-sm-3 col-form-label"> ID Cust </label>
		            <div class="col-sm-8">
		              <input type="text" name="id" class="form-control" value="<?php echo $kodeotomatis; ?>" readonly>
		            </div>
		          </div>
					<div class="form-group row">
						<label for="username" class="col-sm-3 col-form-label"> Username </label>
						<div class="col-sm-8">
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-3 col-form-label"> Password </label>
						<div class="col-sm-8">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label"> Nama </label>
						<div class="col-sm-8">
							<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
						</div>
					</div>
					<fieldset class="form-group">
						<div class="row">
							<label for="jnsKlm" class="col-sm-3 col-form-label"> Jenis Kelamin </label>
							<div class="col-sm-8">
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="jk" value="Laki-laki" checked> Laki-laki
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="jk" value="Perempuan"> Perempuan
									</label>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label"> Alamat </label>
						<div class="col-sm-8">
							<input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah menurut KTP">
						</div>
					</div><br>
					<center><button type="submit" class="btn" name="submit"><span class="oi oi-person"></span> Register </button></center>
        </div>
        <div class="col-sm-1"></div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>