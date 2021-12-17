<?php

include("includes/head.php");
include("layout/navbar.php");
?>


<div class="container-fluid mt-3">
<?php
include("cartitems/cart_infor.php");
 include("includes/slide.php");
?>
</div>
<div class="text-center" style="font-size: 20px;">
<?php if (isset($_SESSION['username'])) {
  echo "Welcome&nbsp;&nbsp;".$_SESSION['username'];
}else{
  ?>
<h3 class="text-center mt-3">Welcome to Jaxinn Films Production</h3>
<?php
}
?>
</h3>
</div>
<div class="container mt-3">
<div class="row">
<div class="col-md-4">
<img class="img-fluid img-thumbnail" src="sponsorimg/Jaxinn.jpg">
</div>
<div class="col-md-8">
<?php include("howit_work.php");?>
</div>
</div>
<div class="row mt-5">
<div class="col-md-3" id="sidebar">
<h4>Categories</h4>
<?php songcategory();?>
</div>
<div class="col-md-9" id="maincontent">

<?php

include("db/db.php");
if (isset($_GET['video'])) {
$id=htmlspecialchars (mysqli_real_escape_string($conn,$_GET['video']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM songs WHERE id=$id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($watch= $result->fetch_assoc()) {
?>
  <div class="video">
  <?php echo $watch['video'];?>
  </div>
  <!--target="_blank"-->
  <div class="name text-center">
 
	 <h4><input type="" name="" autofocus readonly value="<?php echo $watch['song_name'];?>" style="border: 0px solid; outline: none;" ></h4>
  <!--h5><a href="">&nbsp;&nbsp;<i class="fas fa-download"></i></a></h5-->
</div><br>
<div class="name text-center">
 
  <h4><?php echo $watch['producer'];?></h4>
  <!--h5><a href="">&nbsp;&nbsp;<i class="fas fa-download"></i></a></h5-->
</div>

   <?php
}
}else{
  ?>
<h4 style="text-align: center;">No video for this</h4>
  <?php
}


}


?>

</div>
</div>
</div>


<br>
<div class="container-fluid">
<?php include("layout/footer.php");?>

</div>

