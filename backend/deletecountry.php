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
if (isset($_GET['country'])) {
	$country_id = $_GET['country'];
	$sql="DELETE FROM countries  WHERE country_id='$country_id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?country');
		exit();
}
}else{
	header('location:index.php?country');
		exit();
}

?>