<?php
include("includes/head.php");

include("layout/navbar.php");
?>
<?php
if (isset($_SESSION['username'])) {
$email = htmlspecialchars (mysqli_real_escape_string($conn,$_SESSION['username']), ENT_QUOTES, 'UTF-8');
$sql = "SELECT * FROM register WHERE username='$email'";
$run = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($run);

}else{
  header('Location:sigin');

}
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
songimg();
 getsongcat();
?>
</div>
</div>
</div>
</div>
<br>
<div class="container-fluid">

<?php include("layout/footer.php");?>
</div>