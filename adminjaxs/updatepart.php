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
<?php
include("db/db.php");
if (isset($_GET['partners'])) {
	$partners_id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['partners']), ENT_QUOTES, 'UTF-8');

if (isset($_POST['submit'])) {
include("db/db.php");
$npartners_name = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['npartners_name']), ENT_QUOTES, 'UTF-8');
$npartners_logo = $_FILES['npartners_logo']['name'];
$npartners_logo_tmp =$_FILES['npartners_logo']['tmp_name'];

move_uploaded_file($npartners_logo_tmp, "../sponsorimg/$npartners_logo");

$sql="UPDATE partners SET partners_name='$npartners_name', partners_logo ='$npartners_logo' WHERE partners_id='$partners_id'";
if (mysqli_query($conn, $sql)) {
	
header('location:index.php?partner');
		exit();
}

}

$sql="SELECT * FROM partners WHERE partners_id='$partners_id'";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($partners=$run->fetch_assoc()) {
?>

<div class="container">
<h2 class="text-center bg-success" style="color: white; font-size: 30px;">Update Partners</h2>
<form action="" method="post" enctype="multipart/form-data">
<label for="name">Company Name</label>
<div class="form-group">
<input type="text" class="form-control" name="npartners_name" value="<?php echo $partners['partners_name'];?>">
</div>
<div class="form-group">
<label for="image">Partners Logo</label>
<input type="file" class="form-control" name="npartners_logo"><img src="../sponsorimg/<?php echo $partners['partners_logo'];?>"width="150px" height="100px" >
</div>
<div class="form-group">
<input type="submit" class="form-control" name="submit" style="color: white;
font-size:20px; font-weight:bold; background: green;">
</div>
</form>
<?php
}
}
}else{
header("Location:index.php?partner");
exit();
}

?>