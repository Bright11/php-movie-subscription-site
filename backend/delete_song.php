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
if (isset($_GET['delete_song'])) {
	$id = $_GET['delete_song'];
$sql="DELETE FROM songs  WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
		header('location:view_songs.php');
		exit(0);
}
	
}else{
header('location:view_songs.php');
		exit();
}

?>