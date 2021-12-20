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
if (isset($_GET['news'])) {
	$newsid= $_GET['news'];
	$stmt=$conn->prepare("SELECT * FROM news WHERE newsid=$newsid");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($news= $result->fetch_assoc()) {
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" class="form-control" name="newsid" value="<?php echo $news['newsid'];?>">
</div>
<div class="form-group">
<label>Headline</label>
<textarea class="form-control ckeditor" name="nheadline"><?php echo $news['headline'];?></textarea>
</div>

<div class="form-group">
<label>News Details</label>
<textarea class="form-control ckeditor" name="nnews_details" ><?php echo $news['news_details'];?></textarea>
</div>
<div class="form-group">
<input type="submit" class="form-control text-uppercase" name="updatnews" style="background: green;color: white; font-size: 20px;" >
</div>
</form>
<?php
}
}



if (isset($_POST['updatnews'])) {
$newsid = $_POST['newsid'];
$nheadline =$_POST['nheadline'];
$nnews_details = $_POST['nnews_details'];

$sql="UPDATE news SET headline ='$nheadline', news_details='$nnews_details' WHERE newsid='$newsid'";
if (mysqli_query($conn, $sql)) {
	
		header('location:index.php?view_news');
		exit(0);
}

}
}else{
	header("Location:index.php?view_news");
	exit();
}

?>