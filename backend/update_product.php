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

<div class="container">
<?php
include("db/db.php");
if (isset($_GET['uproduct'])) {
$moviesID = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['uproduct']), ENT_QUOTES, 'UTF-8');

if (isset($_POST['submit'])) {
$moviesID = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['moviesID']), ENT_QUOTES, 'UTF-8');
$vname =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['vname']), ENT_QUOTES, 'UTF-8');
$vdirector =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['vdirector']), ENT_QUOTES, 'UTF-8');
$vyear =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['vyear']), ENT_QUOTES, 'UTF-8');
$vdes =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['vdes']), ENT_QUOTES, 'UTF-8');
$vkeywords =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['vkeywords']), ENT_QUOTES, 'UTF-8');
$vimage =$_FILES['vimage']['name'];
$vimage_tmp =$_FILES['vimage']['tmp_name'];
$vvideo =$_POST['vvideo'];
//$vvideo =$_FILES['vvideo']['name'];
//$vvideo_tmp =$_FILES['vvideo']['tmp_name'];

move_uploaded_file($vimage_tmp, "../image/$vimage");
//move_uploaded_file($vvideo_tmp, "../movies_video/$vvideo");


$sql="UPDATE j_movies SET movies_name='$vname', movies_director ='$vdirector', movies_year='$vyear', movies_des= '$vdes',movies_keywords='$vkeywords', movies_image='$vimage',movies_video='$vvideo' WHERE moviesID='$moviesID'";
if (mysqli_query($conn, $sql)) {
	
header('location:index.php?view_movies');
		exit(0);
}

}


$stmt=$conn->prepare("SELECT * FROM j_movies WHERE moviesID=$moviesID");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($prodcut= $result->fetch_assoc()) {

?>
<form id="insertmovies" action="" method="post" enctype="multipart/form-data">
<input class="form-control" type="text" name="moviesID" value="<?php echo $prodcut['moviesID'];?>">
<div class="form-group">
<label>Name</label><br>
<input class="form-control" type="text" name="vname" value="<?php echo $prodcut['movies_name'];?>">
</div>
<div class="form-group">
<label for="country">Director</label>
<input type="text" class="form-control" name="vdirector" value="<?php echo $prodcut['movies_director'];?>">
</div>

<div class="form-group">
<label for="country">Year Directed</label>
<input type="text" class="form-control" name="vyear" value="<?php echo $prodcut['movies_year'];?>">
</div>


<div class="form-group">
<label>Movies Description</label><br>
<input class="form-control" type="text" name="vdes" value="<?php echo $prodcut['movies_des'];?>" >
</div>
<div class="form-group">
<label>KeyWords</label><br>
<input class="form-control" type="text" name="vkeywords" value="<?php echo $prodcut['movies_keywords'];?>">
</div>

<div class="form-group">
<label>image</label><br>
<?php // echo $message2;?>
<input class="form-control" type="file" name="vimage"><img src="../image/<?php echo $prodcut['movies_image'];?>"width="150px" height="100px" >
</div>

<div class="form-group">
<label>Video</label><br>
<?php //$message3;?>
<input class="form-control" type="text" name="vvideo">
<!--input class="form-control" type="file" name="vvideo"-->
<div class="video" >
  <?php echo $prodcut['movies_video'];?>
  </div>
</div>

<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit" align="center" style="background: green; color: white; font-size: 20px;">
</div>
</form>
<style type="text/css">
.video iframe{
   
   	height: 100px;
   	width: 150px;
   }
</style>
<?php
}

}

}else{
header('location:index.php?view_movies');
		exit();
}
?>
</div>