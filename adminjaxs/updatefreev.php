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
if (isset($_GET['free'])) {
	$id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['free']), ENT_QUOTES, 'UTF-8');

	if (isset($_POST['freesubmit'])) {
$nname =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['nname']), ENT_QUOTES, 'UTF-8');
$nimage =$_FILES['nimage']['name'];
$nimage_tmp =$_FILES['nimage']['tmp_name'];

move_uploaded_file($nimage_tmp, "../freeimage/$nimage");

$sql="UPDATE free_videos SET name='$nname', image ='$nimage' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
header('location:index.php?free');
		exit();
}

}

$sql="SELECT * FROM free_videos WHERE id='$id'";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($free=$run->fetch_assoc()) {
?>
<div class="container">
   <h3>Update Free Videos</h3>
    <form id="insertmovies" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Name</label><br>
<input class="form-control" type="text" name="nname" value="<?php echo $free['name'];?>">
</div>
<div class="form-group">
<label>image</label><br>
<?php // echo $message2;?>
<input class="form-control" type="file" name="nimage" >
<img src="../freeimage/<?php echo $free['image'];?>"width="150px" height="100px" >
</div>


<div class="form-group">
<input type="submit" name="freesubmit" id="freesubmit" align="center">
</div>
</form>

<?php
}
}
}else{
	header("Location:index.php?free");
	exit();
}

?>