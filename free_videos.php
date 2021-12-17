<?php
include("includes/head.php");
?>
<meta name="description" content="This is our free videos page watch bihind the scene,comedy,cartoon,drama and much more">
<meta name="keywords" content="Movies,Tvseries,action movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION FREE VIDEOS</title>
</head>
<body oncontextmenu="return false">
<?php

 if (isset($_SESSION['username'])) {
  ?>

<?php
}
else{
  header("Location:sigin");
}

?>
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
<div class="row mt-5">
<div class="col-md-3" id="sidebar">
<h4>Categories</h4>
<?php freecategory();?>
<hr>

</div>
<div class="col-md-9" id="maincontent">
<div class="row">
<?php freeindex_movie();
getfreecat();
//getcat();?>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<?php include("layout/footer.php");?>
</div>