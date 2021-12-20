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
<?php include("includes/head.php");?>
<div class="container mt-4">
<?php
include("db/db.php");
if (isset($_GET['updatec'])) {
	$cat_id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['updatec']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM categories WHERE cat_id=$cat_id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($cat= $result->fetch_assoc()) {
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" class="form-control" name="cat_id" value="<?php echo $cat['cat_id'];?>">
<input type="text" class="form-control" name="cat_name" value="<?php echo $cat['cat_title'];?>">
</div>
<div class="form-group">
<input type="submit" class="form-control text-uppercase" name="updatec" style="background: green;color: white; font-size: 20px;" >
</div>
</form>
<?php
}
}



if (isset($_POST['updatec'])) {
$cat_id = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['cat_id']), ENT_QUOTES, 'UTF-8');
$cat_name = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['cat_name']), ENT_QUOTES, 'UTF-8');

$sql="UPDATE categories SET cat_title ='$cat_name' WHERE cat_id='$cat_id'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?category');
		exit(0);
}

}
}
?>
</div>