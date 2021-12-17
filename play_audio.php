<?php
include("includes/head.php");
include("layout/navbar.php");
?>
<div class="container-fluid mt-3">
<?php include("includes/slide.php");
include("ip/user_ip.php");
include("cartitems/cart_infor.php");
?>
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
<div class="row ml-3">
<?php
include("./db/db.php");
if (isset($_GET['audio'])) {
  $id = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['audio']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM songs WHERE id=$id");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
while ($row=$result->fetch_assoc()) {
?>
<div class="col-9" id="maincontent">

<div class="video">
  <?php echo $row['audio'];?>
  </div>
  <div class="name text-center">
 <h4><input type="" name="" autofocus readonly value="<?php echo $row['song_name'];?>" style="border: 0px solid; outline: none;" ></h4>
 
  <!--h5><a href="">&nbsp;&nbsp;<i class="fas fa-download"></i></a></h5-->
</div>
<br>
<div class="name text-center">
 
  <h4><?php echo $row['producer'];?></h4>
  <!--h5><a href="">&nbsp;&nbsp;<i class="fas fa-download"></i></a></h5-->
</div>
<div class="buy-now">
<!--form action="" method="post">
<input type="hidden" name="song_name" value="">

<input type="hidden" name="price" value="">

<input type="hidden" name="audio" value="">
<input class="songsubmit" type="submit" name="submit" value="Buy Now"style="background: #3cbc8d;letter-spacing: 2px;color:white;font-size: 20px; ">
</form-->

</div>
</div>
<?php
}
}else{
	?>
<h4 style="text-align: center;">No video for this</h4>
<?php
}
}
//}
?>
</div>
</div>
</div>
</div>
<br>
<div class="container-fluid">
<?php include("layout/footer.php");?>
</div>