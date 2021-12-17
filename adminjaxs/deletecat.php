<?php
session_start();
if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php
include("db/db.php");
if (isset($_GET['deletecat'])) {
	$cat_id = $_GET['deletecat'];
	$sql="DELETE FROM categories  WHERE cat_id='$cat_id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?category');
		exit();
}
}else{
	header('location:index.php?category');
		exit();
}

?>