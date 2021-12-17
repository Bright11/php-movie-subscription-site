<?php
include("includes/head.php");
?>
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION</title>
</head>
<body>
<?php
include("layout/navbar.php");
?>
<div class="container-fluid mt-4">
<div class="row">

<?php 
    include("db/db.php");
   $sql="SELECT * FROM freeimage";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($gallery=$run->fetch_assoc()) {
      ?>
      <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
<div class="gallery">
<img src="freeimage/<?php echo $gallery['image'];?>"class="rounded mx-auto d-block img-thumbnail" alt="...">
<p class="galllery_name text-center text-uppercase" style="letter-spacing: 2px; font-size: 18px; font-weight: 25px;"><?php echo $gallery['name'];?></p>
</div>
</div>
<?php

}

}else{
?>
<h3 class="text-center">No Gallery yet!</h3>
<?php
}
?>
</div>
</div>
<style type="text/css">

</style>


<div class="container-fluid">
<?php include("layout/footer.php");?>