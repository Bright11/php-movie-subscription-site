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
if (isset($_GET['partner'])) {
	$partners_id = $_GET['partner'];
 $sql="DELETE FROM partners  WHERE partners_id='$partners_id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?partner');
		exit();


}else{
header('location:index.php?partner');
		exit();
}

}

?>