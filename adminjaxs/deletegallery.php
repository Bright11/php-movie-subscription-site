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
if (isset($_GET['gallery'])) {
	$id = $_GET['gallery'];
  
  $sql="DELETE FROM gallery  WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?gallery');
		exit();


}else{
header('location:index.php?gallery');
		exit();
}
}
?>