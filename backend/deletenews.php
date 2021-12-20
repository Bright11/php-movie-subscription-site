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
	$newsid = $_GET['news'];
 $sql="DELETE FROM news  WHERE newsid='$newsid'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?view_news');
		exit();


}else{
header('location:index.php?view_news');
		exit();
}

}

?>