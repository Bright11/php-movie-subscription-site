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
if (isset($_GET['about'])) {
	$id= htmlspecialchars (mysqli_real_escape_string($conn,$_GET['about']), ENT_QUOTES, 'UTF-8');
	$stmt=$conn->prepare("SELECT * FROM aboutus WHERE id=$id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($about= $result->fetch_assoc()) {
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" class="form-control" name="id" value="<?php echo $about['id'];?>">
</div>
<div class="form-group">
<label>Header Infor</label>
<textarea class="form-control ckeditor" name="nname"><?php echo $about['name'];?></textarea>
</div>

<div class="form-group">
<label>Information</label>
<textarea class="form-control ckeditor" name="nmessage" ><?php echo $about['message'];?></textarea>
</div>
<div class="form-group">
<input type="submit" class="form-control text-uppercase" name="updatabout" style="background: green;color: white; font-size: 20px;" >
</div>
</form>
<?php
}
}



if (isset($_POST['updatabout'])) {
$id = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['id']), ENT_QUOTES, 'UTF-8');
$nname =$_POST['nname'];
$nmessage = $_POST['nmessage'];

$sql="UPDATE aboutus SET name ='$nname', message='$nmessage' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?view_about');
		exit(0);
}

}
}else{
	header("Location:index.php?view_about");
	exit();
}

?>