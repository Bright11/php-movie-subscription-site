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
if (isset($_GET['about'])) {
	$id = $_GET['about'];
 $sql="DELETE FROM aboutus  WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
	header('location:index.php?view_about');
		exit();


}else{
header('location:index.php?view_about');
		exit();
}

}

?>