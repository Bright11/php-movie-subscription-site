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
if (isset($_GET['delete_product'])) {
	$moviesID = $_GET['delete_product'];
$sql="DELETE FROM j_movies  WHERE moviesID='$moviesID'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?view_movies');
		exit(0);
}
	
}else{
header('location:index.php?view_movies');
		exit();
}

?>