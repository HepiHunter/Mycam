<?php
include "../koneksi.php";
$id_cam=$_GET['id_cam'];
$data = mysqli_query($conn, "SELECT * FROM kamera WHERE id_cam='$id_cam'");
while($datashow=mysqli_fetch_array($data))
{

?>
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-lock"></span> DETAIL KAMERA </h4>
    </div>
    <div class="modal-body">
      <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">     
        <div class="row">
          <div class="form-group row">
            <?php
              $data = mysqli_query($conn, "SELECT * FROM kamera WHERE id_cam='$_GET[id_cam]'");
              $datashow=mysqli_fetch_array($data);
              $harga=number_format($datashow['hrg_sewa'],0,",",".");
            ?>
            <div class="form-group row">
              <center><?php echo '<a href="../Gambar/'.$datashow['gambar'].'"><img alt="" src="../Gambar/'.$datashow['gambar'].'" width="300px" height="200px"></a>'; ?></center>                        
            </div>
            <div class="form-group row">
              <?php echo '<strong>ID Kamera : </strong> <span> '.$datashow['id_cam'].' </span><br>
                <strong>Nama Kamera : </strong> <span> '.$datashow['nama_cam'].' </span><br>
                <strong>Fitur : </strong> <span> '.$datashow['fitur'].' </span><br>
                <strong>Perlengkapan : </strong> <span> '.$datashow['perlengkapan'].' </span><br>'; ?>                 
              <?php echo '<strong>Harga Sewa per Hari : Rp '.$datashow['hrg_sewa'].'</strong>'; ?>
            </div>
            <div class="form-group row">
              <?php
                $status = $datashow['status'];

                if ($status == 'Ready') {
                  echo "<center><a class='btn' href='../Admin/Pesanan/index.php'> Pesan </a></center>";
                } elseif ($status == 'Booked') {
                  echo "<center><h3><strong>Booked</strong><h3><center>";
                }
              ?>
            </div>
          </div>
        </div>
      </form>
      <?php } ?>
    </div>
  </div>
</div>
</div>