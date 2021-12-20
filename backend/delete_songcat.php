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
if (isset($_GET['delete_songcat'])) {
	$cat_id = $_GET['delete_songcat'];
	$sql="DELETE FROM song_cat  WHERE cat_id='$cat_id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:view_songcat.php');
		exit();
}
}else{
	header('location:view_songcat.php');
		exit();
}

?>