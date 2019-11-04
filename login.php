<?php
	if (isset($_GET["pesan"])) {
		$pesan = $_GET["pesan"];
	}

	if (isset($_POST["submit"])) {
		$username = htmlentities(strip_tags(trim($_POST["username"])));
		$password = htmlentities(strip_tags(trim($_POST["password"])));
		$pesan_error = "";

		if (empty($username)) {
			$pesan_error .= "<b>Username Belum Terisi</b><br>";
		}
		if (empty($password)) {
			$pesan_error .= "<b>Password Belum Terisi</b><br>";
		}

		include("koneksi.php");
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		$password_sha1 = sha1($password);

		$mysqlquery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$hasil_mysqlquery = mysqli_query($conn, $mysqlquery);

		session_start();

		if (mysqli_num_rows($hasil_mysqlquery) > 0) {
			$pesan_error .= "";
			session_start();
			$jumlah = mysqli_fetch_assoc($hasil_mysqlquery);
			$_SESSION["username"] = $jumlah["username"];
			$_SESSION["level"] = $jumlah["level"];

			if ($jumlah["level"] == "ADM") {
				$_SESSION['id'] = $jumlah['id'];
				$_SESSION['username'] = $jumlah['username'];
				header("Location: Admin/homeAdmin.php");
			} else if ($jumlah["level"] == "CS") {
				$_SESSION['id'] = $jumlah['id'];
				$_SESSION['username'] = $jumlah['username'];
				header("Location: User/homeCust.php");
			}
		} else {
			$pesan_error .= "<script>alert('Login Gagal, Coba Lagi')</script>";
		}
	} else {
		$username = "";
		$password = "";
		$pesan_error = "";
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>MYCAM_MALANG</title>
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/slide.css">
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
          	<li><a href="User/addCust.php"> DAFTAR </a></li>
          </ul>
        </li>
    </ul>
</div>
<div id="title" align="center"><h1>MYCAM_MALANG</h1></div>
	<div class="container">
		<div class = "login">
			<?php
				if (isset($pesan)) {
					echo "<div class=\"pesan\">$pesan</div>";
				}
				if ($pesan_error !== "") {
					echo "<div class=\"error\">$pesan_error</div>";
				}
			?>
			<form action = "login.php" method = "post" class="form-horizontal" role="form">
				<fieldset>
					<legend><img src = "Gambar\login.png" alt = "photo" height="100" width="100"></legend><br>

					<div class="form-group">
						<div class="col-sm-11">
							<input type="text" name="username" id="username" class="form-control text-center" placeholder="Username" value="<?php echo $username; ?>">
						</div>
						<div class="col-sm-1">
							<span id="show-password" class="glyphicon glyphicon-phone"></span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-11">
							<input type="password" name="password" id="pass" class="myinput form-control text-center" placeholder="Password" value="<?php echo $password; ?>"/>
						</div>
						<div class="col-sm-1">
							<span id="show-password" onclick="change()" class="glyphicon glyphicon-eye-open"></span>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-8">
							<center><button type="submit" class="btn" name="submit"><span class="oi oi-account-login"></span> Log In </button></center>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>
<script>
	function change()
         {
            var x = document.getElementById('pass').type;

            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
            }
            else
            {
               document.getElementById('pass').type = 'password';
            }
         }
</script>