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
if (isset($_GET['works'])) {
	$id= htmlspecialchars (mysqli_real_escape_string($conn,$_GET['works']), ENT_QUOTES, 'UTF-8');
	$stmt=$conn->prepare("SELECT * FROM howitworks WHERE id=$id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($works= $result->fetch_assoc()) {
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" class="form-control" name="id" value="<?php echo $works['id'];?>">
<p class="form-control"><?php echo $works['details'];?></p>
</div>
<div class="form-group">
<textarea class="form-control" name="newdetails" placeholder="Edit here, you can also copy it from above and past it here"></textarea>
</div>
<div class="form-group">
<label>Titles</label>
<input type="text" class="form-control" name="newtitle" value="<?php echo $works['title'];?>">
</div>
<div class="form-group">
<input type="submit" class="form-control text-uppercase" name="updateworks" style="background: green;color: white; font-size: 20px;" >
</div>
</form>
<?php
}
}



if (isset($_POST['updateworks'])) {
$id = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['id']), ENT_QUOTES, 'UTF-8');
$newdetails = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['newdetails']), ENT_QUOTES, 'UTF-8');
$newtitle = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['newtitle']), ENT_QUOTES, 'UTF-8');

$sql="UPDATE howitworks SET title ='$newtitle', details='$newdetails' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?howitworks');
		exit(0);
}

}
}else{
	header("Location:index.php?howitworks");
	exit();
}

?>