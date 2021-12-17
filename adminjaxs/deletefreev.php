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
if (isset($_GET['free'])) {
	$id = $_GET['free'];
	
	$sql="DELETE FROM free_videos  WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?free');
		exit();


}

}else{
	header("Location:index.php?free");
	exit();
}

?>