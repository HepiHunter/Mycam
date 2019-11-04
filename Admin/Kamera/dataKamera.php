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
  <title>Data Kamera</title>
<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".nav" data-offset="50">
<!-- untuk mengatur isi dari navbar -->
<div class="nav">
    <ul class="nav navbar-nav navbar-right">
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
</div>
<div class="text-center" align="center">
    <br><br><h3>DAFTAR KAMERA</h3>
    <div class="table-responsive">
    <table id="kamera" class="table1">
      <thead>
        <tr class="success" align="center">
          <td width="100">Gambar</td>
          <td width="50">ID</td>
          <td width="100">Kamera</td>
          <td width="200">Fitur</td>
          <td width="200">Perlengkapan</td>
          <td width="100">Harga (24 Jam)</td>
          <td width="90">Status</td>
          <td width="100" colspan="2">Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $kamera = mysqli_query($conn, "SELECT * FROM kamera");
          while ($show = mysqli_fetch_array($kamera)) {
        ?>
        <tr>
          <td><img src="<?php echo "../../Gambar/".$show['gambar'];?>" width="80px" height="70px"></td>
          <td><?php echo $show['id_cam'];?></td>
          <td><?php echo $show['nama_cam'];?></td>
          <td><?php echo $show['fitur'];?></td>
          <td><?php echo $show['perlengkapan'];?></td>
          <td><?php echo $show['hrg_sewa'];?></td>
          <td><?php echo $show['status'];?></td>

          <td>  <a href="editKamera.php?id_cam=<?php echo $show['id_cam'];?>">Edit</a>
         <a href="hapusKamera.php?id_cam=<?php echo $show['id_cam'];?>">Delete</a>
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