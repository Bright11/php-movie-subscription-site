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
if (isset($_GET['updatefreec'])) {
	$freecat_id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['updatefreec']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM free_categories WHERE freecat_id=$freecat_id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($freecat= $result->fetch_assoc()) {
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" class="form-control" name="freecat_id" value="<?php echo $freecat['freecat_id'];?>">
<input type="text" class="form-control" name="freecat_title" value="<?php echo $freecat['freecat_title'];?>">
</div>
<div class="form-group">
<input type="submit" class="form-control text-uppercase" name="updatefreec" style="background: green;color: white; font-size: 20px;" >
</div>
</form>
<?php
}
}



if (isset($_POST['updatefreec'])) {
$freecat_id = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['freecat_id']), ENT_QUOTES, 'UTF-8');
$freecat_title = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['freecat_title']), ENT_QUOTES, 'UTF-8');

$sql="UPDATE free_categories SET freecat_title ='$freecat_title' WHERE freecat_id='$freecat_id'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?freecat');
		exit(0);
}

}
}
?>
</div>