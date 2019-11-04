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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".nav" data-offset="50">
<div class="nav">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../homeAdmin.php"> HOME </a></li>
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
<div class="text-center" align="center">
  <br><br><h3>DAFTAR USER</h3>
  <div class="table-responsive">
    <table id="user" class="table1">
		<thead>
			<tr class="success" align="center">
        		<td width="100">Foto</td>
				<td width="50px"><b> ID </td>
				<td width="50px"><b> Username </td>
				<td width="350px"><b> Nama </td>
				<td width="90px"><b> Jenis Kelamin </td>
				<td width="250px"><b> Alamat </td>
				<td width="50px"><b> Level </td>
				<td width="10%" colspan="2"><b> Action </td>
			</tr>
		</thead>
		<tbody>
			<?php
			$user = mysqli_query($conn, "SELECT * FROM users"); // memberikan perintah query sql untuk menampilakn semua user

			//perintah untuk menampilakn semua user yang ada ditabel user menggunakan perulangan
			while ($show = mysqli_fetch_array($user)) {
			?>

			<tr>
        		<td><img src="<?php echo "../../Gambar/".$show['foto'];?>" width="80px" height="70px"></td>
				<td><?php echo $show['id'];?></td>
				<td><?php echo $show['username'];?></td>
				<td><?php echo $show['nama'];?></td>
				<td><?php echo $show['jk'];?></td>
				<td><?php echo $show['alamat'];?></td>
				<td><?php echo $show['level'];?></td>
				<td><a href="editUser.php?id=<?php echo $show['id'];?>">Edit</a>
        			<a href="hapusUser.php?id=<?php echo $show['id'];?>">Delete</a>
        		</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
	</div>
</div>
</div>
</body>
</html>