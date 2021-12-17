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
<div class="row mt-5">
<div class="col-md-3" id="sidebar">
<h4>Categories</h4>
<?php category();?>
<hr>
<h4>Countries</h4>
<?php country();?>
</div>
<div class="col-md-9" id="maincontent">
<div class="row">
<?php allproduct();
getcountry();
getcat();?>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<?php include("layout/footer.php");?>
</div>