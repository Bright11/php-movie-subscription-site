<?php
include("includes/head.php");
?>
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>
<?php

 if (isset($_SESSION['username'])) {
if (date("Y-m-d")> $MembershipEnds) {
  ?>

<?php
}else{
  
header("Location:verify_email?watchpaid");
}
}else{
  header("Location:sigin");
}

?>

<div class="container-fluid mt-3">
<?php include("includes/slide.php");?>
</div>
<div class="text-center" style="font-size: 20px;letter-spacing: 2px;">
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
<div class="topmov mt-3">
<h4>Top Movies</h4>
</div>
<div class="owl-carousel top_movie owl-theme">
<?php topmovies();?>
</div>
<div class="row mt-5">
<div class="col-md-3" id="sidebar">
<h4>Categories</h4>
<?php category();?>
<hr>
<h4>Countries</h4>
<?php country();?>
</div>
<div class="col-md-9" id="maincontent">


<?php

include("db/db.php");
if (isset($_GET['watch'])) {
$moviesID=htmlspecialchars (mysqli_real_escape_string($conn,$_GET['watch']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM j_movies WHERE moviesID=$moviesID");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($watch= $result->fetch_assoc()) {
?>
  <div class="video">
  <?php echo $watch['movies_video'];?>
  </div>

  <!--target="_blank"-->
  <div class="name text-center mt-3">
 <h4><input type="" name="" autofocus readonly value="<?php echo $watch['movies_name'];?>" style="border: 0px solid; outline: none;" ></h4>
  <hr>
  <p><?php echo $watch['movies_des'];?></p>
  <hr>
  <!--h5><a href="">&nbsp;&nbsp;<i class="fas fa-download"></i></a></h5-->
</div>

   <?php
}
}


}


?>

<div class="comment">
<h4>Leave your comment on your favourable movie below</h4>


<h5 align="center">Comments</h5>
<div id="message"></div>
<!--action="functions/comment.php" method="post"-->
<form id="myform">
<?php

if (isset($_GET['watch'])) {
$moviesID=$_GET['watch'];
$stmt=$conn->prepare("SELECT * FROM j_movies WHERE moviesID=$moviesID");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($watch= $result->fetch_assoc()) {
    ?>
<input type="hidden" class="form-control" readonly name="comment_replyid"  value="<?php echo $watch['moviesID'];?>">
<input type="text" class="form-control" readonly name="" value="Movie Name  <?php echo $watch['movies_name'];?>">
<?php

}
}

}
?>
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" name="comment_name"  placeholder="your Name....">

</div>
<div class="form-group">

<label>Email</label>
<input type="email" class="form-control" name="email" placeholder="your Email......">

</div>
<br>
<div class="form-group">

<label>Message</label><br>
<textarea class="form-control" name="comment_message"  placeholder="type your comment here"></textarea>
 
</div>
<br>
<div class="form-group">
<button class="btn-success"  style="font-size: 20px; font-weight: bold; width: 100%; color: white; background: green; text-transform: uppercase;" >Submit</button> 
</div>
</form>
<span id="result" style="color: black; font-size: 25px;"></span>

</div>
</div>
</div>
</div>

<div class="container" >
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-9">
  <div id="getdata"></div>
  <?php
  
if (isset($_GET['watch'])) {
$moviesID=$_GET['watch'];
$stmt=$conn->prepare("SELECT * FROM comment WHERE comment_replyid=$moviesID ORDER BY comment_id DESC");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($watch= $result->fetch_assoc()) {
    ?>
  <div id="comment">
  <p><?php echo $watch['comment_name'];?></p>
  <p class="form-control"><?php echo $watch['comment_message'];?></p>
    
  </div>
<?php

}
}

}

?>
<!--/div-->

<!--/div-->

</div>
</div>
</div>
<script type="text/javascript">

</script>

<br>
<div class="container-fluid">
<?php include("layout/footer.php");?>

</div>

