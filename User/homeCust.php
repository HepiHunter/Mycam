<?php
  session_start();
  if (!isset($_SESSION["username"])) {
    header("Location: ../login.php"); 
  }
  if ($_SESSION["level"] !== "CS") {
    header("Location: ../login.php");
  }
    //initialize cart if not set or is unset
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}

  //unset qunatity
unset($_SESSION['qty_array']);
  include("../koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>MYCAM_MALANG</title>
	  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/slide.css">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".nav" data-offset="50">
<!-- untuk mengatur isi dari navbar -->
<div class="nav">
    <ul>
        <li><a href="homeCust.php"> HOME </a></li>
        <li><a href="#contact"> CONTACT </a></li>
        <li><a href="viewCart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Hai <?php echo $_SESSION['username']; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">      
            <li><a href="../logout.php"> LOGOUT </a></li>
          </ul>
        </li>
    </ul>
</div><br>
<div class="text-center">
 <!-- <div class=malasngoding-slider>
    <div class=isi-slider>
      <img src="../gambar/d3100.jpg" alt="Gambar 1">
      <img src="../gambar/d3400.jpg" alt="Gambar 2">
      <img src="../gambar/logo.jpg" alt="Gambar 3">
    </div>
  </div> -->
<div class="text-center" align="center">

    <div class="container-fluid">
      <div class="jumbotron text-center">
        <div class="row">
          <div class="col-sm-3">
            <img src="../Gambar/logo.jpg" style="height:200px" />
          </div>
          <div class="col-sm-9">
            <h1>Hello, MyCamers!</h1>
            <p>Selamat Datang di HomeSite MyCam_Malang :)</p>
          </div>
      </div>
    </div>

  <div class="container">
    <h1>Data Kamera</h1>
    <div class="thumbnail">
      <div class="row">
        <?php
          $query = mysqli_query($conn,"SELECT * FROM kamera ORDER BY id_cam");
          while ($row = mysqli_fetch_assoc($query)) {
          $hrg_sewa=number_format($row['hrg_sewa'],0,",",".");
        ?>
        <div class="col-md-3 col-md-3">
          <div class="thumbnail">
            <div class="product-box">
              <?php echo '<p><a href="detailCam.php?id_cam='.$row['id_cam'].'"><img src="../Gambar/'.$row['gambar'].'" style=height:200px;/></a></p>'; ?>
              <p><?php echo $row['nama_cam'];?></p>
              <button class='btn open_modal' id='<?php echo $row['id_cam']; ?>'> Detail </button>
            </div>
            <div class="row product_footer">              
              <span class="pull-right"><a href="addCart.php?id_cam=<?php echo $row['id_cam']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
            </div>
          </div>
        </div>
        <?php 
        }
        ?>
      </div>              
    </div>
  </div><br>

	<footer class="text-center">
	  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
	    <span class="glyphicon glyphicon-chevron-up"></span>
	  </a><br>
	  <div id="contact">
	  <h2 class="text-center">Contact</h3><br>
	    <p>Bingung ? Hubungi kami aja</p>
	    <p><span class="glyphicon glyphicon-map-marker"></span> Tlogomas, Malang, Jawa Timur</p>
	    <p><span class="glyphicon glyphicon-phone"></span> Phone : 081232275604</p>
	    <p><span class="glyphicon glyphicon-envelope"></span> Email : mycam_malang@gmail.com</p>
	  </div>
	</footer>
</div>

<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
       $.ajax({
             url: "detailCam.php",
             type: "GET",
             data : {id_cam: m,},
             success: function (ajaxData){
               $("#ModalDetail").html(ajaxData);
               $("#ModalDetail").modal('show',{backdrop: 'true'});
             }
           });
        });
      });
</script>
</body>
</html>