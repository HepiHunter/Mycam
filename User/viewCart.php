<?php
	  session_start();
  if (!isset($_SESSION["level"])) 
  {
    header("Location: ../homeCust.php");
  }
  include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title>MYCAM_MALANG</title>
	  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
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
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<form method="POST" action="saveCart.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th></th>
					<th>Name</th>
					<th>Harga</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'tubes');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM kamera WHERE id_cam IN (".implode(',',$_SESSION['cart']).")";
						$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query)){
								?>
								<tr>
									<td>
										<a href="deleteItem.php?id=<?php echo $row['id_cam']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									<td><?php echo $row['nama_cam']; ?></td>
									<td><?php echo number_format($row['hrg_sewa'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['hrg_sewa'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['hrg_sewa']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
					</tr>
				</tbody>
			</table>
			<a href="homeCust.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<button type="submit" class="btn btn-success" name="save">Save Changes</button>
			<a href="clearCart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			<a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>