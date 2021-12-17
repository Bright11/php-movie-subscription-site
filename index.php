<?php
include("includes/head.php");
?>
<meta name="description" content="This is a movie website where you can watch any movie of your choice,we have paid and free movies, educative,glorious and much more">
<meta name="keywords" content="Movies,Tvseries,action movies,free movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>

<div class="container-fluid mt-3">
<h3 style="letter-spacing: 2px; font-size: 18px;">Good News</h3><marquee style="letter-spacing: 2px; font-size: 18px;text-transform:uppercase;">Thanks to our visitors, our membership subscription has been activated please subscribe with your MTN, VODAFON OR AIRTEL TIGO MOBILE MONEY and enjoy the best movies.Stay safe. We love you</marquee>
	
<?php include("includes/slide.php");?>

<div class="row mt-3">
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
<!-- class="owl-carousel top_movie owl-theme"-->
<div class="owl-carousel top_movie owl-theme">
<?php  topmovies();?>

</div>

<style type="text/css">
.image img{
height: 30vh;
}
</style>
<div class="top mt-5"></div>
<div class="row text-center" id="index_movie">
<?php index_movie();?>
</div>
<?php
$message='';
include("db/db.php");
$stmt=$conn->prepare("SELECT * FROM partners");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
	?>
	<h5 class="text-center">Our partners</h5>
<?php
}
 	?>
 	
 	<?php echo $message;?>
<div class="owl-carousel sponsor owl-theme">
<?php parners();?>
</div>
</div>

<?php include("layout/footer.php");?>

