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
if (isset($_GET['country'])) {
	$country_id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['country']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM countries WHERE country_id=$country_id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($country= $result->fetch_assoc()) {
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" class="form-control" name="country_id" value="<?php echo $country['country_id'];?>">
<input type="text" class="form-control" name="country_nname" value="<?php echo $country['country_name'];?>">
</div>
<div class="form-group">
<input type="submit" class="form-control text-uppercase" name="updatec" style="background: green;color: white; font-size: 20px;" >
</div>
</form>
<?php
}
}



if (isset($_POST['updatec'])) {
$country_id = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['country_id']), ENT_QUOTES, 'UTF-8');
$country_nname = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['country_nname']), ENT_QUOTES, 'UTF-8');

$sql="UPDATE countries SET country_name ='$country_nname' WHERE country_id='$country_id'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?country');
		exit(0);
}

}
}
?>
</div>