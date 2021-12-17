<?php session_start();?>
<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php include("includes/head.php");
include("includes/nav.php");?>
<?php 
$message="";
include("db/db.php");
if (isset($_POST['submit'])){
$cat_name = $_POST['cat_name'];

$result=$conn->query("SELECT * FROM song_cat WHERE cat_name='".$cat_name."'");
    $rows=$result->num_rows;
  if ($rows>0) {
  echo $message='<div class="error btn btn-danger">Song already exist.</div>';
  
  }
else{
	
	$stmt = $conn->prepare("INSERT INTO song_cat (cat_name)VALUES(?) ");
$stmt->bind_param("s", $cat_name);
$stmt->execute();
 echo $message='<div class="bg-success">Song cart successfully Uploaded!</div>';
   $stmt->close();
    $conn->close();
 }
}

?>
<?php echo $message;?>
<div class="container">
<div class="row">
<div class="container" id="form">
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
<label>Cart Name</label>
<input class="form-control" type="text" name="cat_name" placeholder="Song Name">
</div>

<input type="submit" name="submit" value="Submit">
</form>
     
  <div id="result"><?php $message;?></div>

  


<style type="text/css">
#insertmovies{
	background: pink;
	border: 1px solid black;
	font-size: 20px;
}
</style>



