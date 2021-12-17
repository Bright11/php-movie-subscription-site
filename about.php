<?php
include("includes/head.php");
?>
<meta name="description" content="JAXINN films production is a film and television production, established in 2013 by a young ambitious entrepreneur, by name Nathaniel Nsiah Israel. Whose vision started in 2007 as an actor, moving from one production house to the other but later learn to do something on his own after meeting a lady called Suzzy Nyamekye in 2010. with one accord...">
<meta name="keywords" content="Movies,Tvseries,action movies,free movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION ABOUT US</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>
<div class="container-fluid mt-4" style="text-align: center;">
<div class="map">

</div>
</div>

<div class="container-fluid mt-4" style="text-align: center;">
<div class="about">
	<?php
	include("db/db.php");
$stmt=$conn->prepare("SELECT * FROM aboutus ");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($about= $result->fetch_assoc()) {
?>
<h3 class="topic"><?php echo $about['name'];?></h3>
<p class="text" style="font-size: 20px;"><?php echo $about['message'];?></p>
<?php
}
}
?>
</div>
</div>

<?php include("layout/footer.php");?>