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
if (isset($_GET['works'])) {
	$id= $_GET['works'];
  
  $sql="DELETE FROM howitworks  WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?howitworks');
		exit();


}else{
header('location:index.php?howitworks');
		exit();
}
}
?>