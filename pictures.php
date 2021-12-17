<?php
include("includes/head.php");
?>
<meta name="description" content="Jaxinn Films Production Gallery,Catch up your favourite actors and actresses with their swag know them by name and understand what they do.">
<meta name="keywords" content="Movies,Tvseries,action movies,free movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION GALLERY</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>
<div class="container-fluid mt-4">
<div class="row">

<?php 
    include("db/db.php");
   $sql="SELECT * FROM gallery";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($gallery=$run->fetch_assoc()) {
      ?>
      <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
<div class="gallery">
<img src="gallery/<?php echo $gallery['image'];?>"class="rounded mx-auto d-block img-thumbnail" alt="<?php echo $gallery['name'];?>">
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