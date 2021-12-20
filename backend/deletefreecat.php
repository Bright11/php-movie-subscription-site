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
if (isset($_GET['deletefreecat'])) {
	$freecat_id = $_GET['deletefreecat'];
	$sql="DELETE FROM free_categories  WHERE freecat_id='$freecat_id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?freecat');
		exit();
}
}else{
	header('location:index.php?freecat');
		exit();
}

?>