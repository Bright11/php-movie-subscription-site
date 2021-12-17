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
if (isset($_GET['gallery'])) {
	$id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['gallery']), ENT_QUOTES, 'UTF-8');
    if (isset($_POST['submit'])) {
include("db/db.php");
$nname = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['nname']), ENT_QUOTES, 'UTF-8');
$nimage = $_FILES['nimage']['name'];
$nimage_tmp =$_FILES['nimage']['tmp_name'];

move_uploaded_file($nimage_tmp, "../gallery/$nimage");

$sql="UPDATE gallery SET name='$nname', image ='$nimage' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
header('location:index.php?gallery');
		exit();
}

}

	$sql="SELECT * FROM gallery WHERE id='$id'";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($gallery=$run->fetch_assoc()) {
	?>
<div class="container">
<h2 class="text-center bg-success" style="color: white; font-size: 30px;">Update Gallery</h2>
<form action="" method="post" enctype="multipart/form-data">
<label for="name">Name</label>
<div class="form-group">
<input type="text" class="form-control" name="nname" value="<?php echo $gallery['name'];?>">
</div>
<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" name="nimage">
<img src="../gallery/<?php echo $gallery['image'];?>"width="150px" height="100px" >
</div>
<div class="form-group">
<input type="submit" class="form-control" name="submit" style="color: white;
font-size:20px; font-weight:bold; background: green;">
</div>
</form>

</div>

<?php

}
}
}else{
	header('Location:index.php?gallery');
	exit();
}

?>