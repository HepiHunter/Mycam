<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="../css/cart.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php 
// Start the session
session_start();
require '../koneksi.php';
require 'item.php';

if(isset($_GET['id_cam']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM kamera WHERE id_cam=".$_GET['id_cam'];
	$result = mysqli_query($conn, $sql);
	$kamera = mysqli_fetch_object($result); 
	$item = new Item();
	$item->id_cam = $kamera->id_cam;
	$item->nama_cam = $kamera->nama_cam;
	$item->hrg_sewa = $kamera->hrg_sewa;
    $item->status = $kamera->status;

	// Check kamera is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id_cam == $_GET['id_cam']){
			$index = $i;
			break;
		}
		// if($index == -1) 
		// 	$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		// else {
			
		// 	if (($cart[$index]->quantity) < $iteminstock)
		// 		 $cart[$index]->quantity ++;
		// 	     $_SESSION['cart'] = $cart;
		// }
}
// Delete kamera in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
// if(isset($_POST['update'])) {
//   $arrQuantity = $_POST['quantity'];
//   $cart = unserialize(serialize($_SESSION['cart']));
//   // for($i=0; $i<count($cart);$i++) {
//   //    $cart[$i]->quantity = $arrQuantity[$i];
//   // }
//   $_SESSION['cart'] = $cart;
// }
?>
<h2> Items in your cart: </h2> 
<form method="POST">
<table id="table1">
<tr>
	<th>Option</th>
	<th>Id</th>
	<th>Nama</th>
	<th>Harga</th>
	<th>Hari</th>
	 
	<th>Total</th>
</tr>
<?php 
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->price * $cart[$i]->hari;
 ?>	
   <tr>
    	<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
   		<td> <?php echo $cart[$i]->id_cam; ?> </td>
   		<td> <?php echo $cart[$i]->nama_cam; ?> </td>
   		<td>Rp. <?php echo $cart[$i]->hrg_sewa; ?> </td>
        <td> <input type="number" min="1" value="<?php echo $cart[$i]->hari; ?>" name="hari[]"> </td>  
        <td> Rp.<?php echo $cart[$i]->price * $cart[$i]->hari; ?> </td> 
   </tr>
 	<?php 
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="5" style="text-align:right; font-weight:bold">Sum 
         <input id="saveimg" type="image" src="images/save.png" name="update" alt="Save Button">
         <input type="hidden" name="update">
 		</td>
 		<td> Rp.<?php echo $s; ?> </td>
 	</tr>
</table>
</form>
<br>
<a href="homeCust.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a>
<?php 
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: cart.php');
} 
?>
</body>
 </html>
