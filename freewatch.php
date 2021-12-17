<?php
include("includes/head.php");
?>
<title>JAXINN FILMS PRODUCTION</title>
<meta name="author" content="JAXINN">
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>

<div class="container-fluid mt-3">
<?php include("includes/slide.php");?>
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
<div class="col-md-9 mt-3" id="maincontent">
<?php

include("db/db.php");
if (isset($_GET['freewatch'])) {
$id=htmlspecialchars (mysqli_real_escape_string($conn,$_GET['freewatch']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM free_videos WHERE id=$id");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($watch= $result->fetch_assoc()) {
?>
  <div class="video">

<?php echo $watch['videos'];?>
 
  </div>
  <style type="text/css">
  
  </style>
  <div class="name text-center">
  <h4><?php echo $watch['name'];?></h4>
</div>

   <?php
}
}


}


?>
</div>
</div>

<br>
<div class="container-fluid">
<?php include("layout/footer.php");?>
</div>