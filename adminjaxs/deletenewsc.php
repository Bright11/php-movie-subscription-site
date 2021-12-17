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
if (isset($_GET['news'])) {
	$newscat_id = $_GET['news'];
  
  $sql="DELETE FROM news_categories  WHERE newscat_id='$newscat_id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?newscat');
		exit();


}else{
header('location:index.php?newscat');
		exit();
}
}
?>