<?php
	$conn = new mysqli('localhost', 'root', '', 'tubes');
 
	if(ISSET($_POST['save'])){
		if(!empty($_POST['nama_cam']) && !empty($_POST['hrg_sewa'])){
			$nama_cam = addslashes($_POST['nama_cam']);
			$hrg_sewa = $_POST['hrg_sewa'];
 
			$file = explode(".", $_FILES['gambar']['name']);
			$ext = array("png", "gif", "jpg", "jpeg");
 
			if(in_array($file[1], $ext)){
				$file_name = $file[0].'.'.$file[1];
				$tmp_file = $_FILES['gambar']['tmp_name'];
				$location = $file_name;
				$new_location = addslashes($location);
 
				if(move_uploaded_file($tmp_file, $location)){
					$conn->query("INSERT INTO `kamera` VALUES('', '$nama_cam', '$hrg_sewa', '$new_location')");
					echo "<script>alert('Data Insert')</script>";
					echo "<script>window.location = 'homeCust.php'</script>";
				}
 
			}else{
				echo "<script>alert('File not available')</script>";
				echo "<script>window.location = 'homeCust.php'</script>";
			}
 
		}else{
			echo "<script>alert('Please complete the required field!')</script>";
		}
 
 
	}
?>