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
<div class="container-fluid mt-3">
<?php include("includes/slide.php");?>

<div class="row mt-3">
<div class="col-md-4">
<img class="img-fluid img-thumbnail" src="sponsorimg/Jaxinn.jpg">
</div>
<div class="col-md-8">
<?php include("howit_work.php");?>
</div>
</div>

<?php
include("db/db.php");
if (isset($_GET['search'])) {
	$search_query =htmlspecialchars (mysqli_real_escape_string($conn,$_GET['user_query']), ENT_QUOTES, 'UTF-8');
	$stmt=$conn->prepare("SELECT * FROM j_movies WHERE movies_name LIKE CONCAT('%',?,'%') OR movies_keywords LIKE CONCAT('%',?,'%')");
	$stmt->bind_param("ss", $search_query,$search_query);
	$stmt->execute();
	$result=$stmt->get_result();
	if ($result->num_rows>0) {
		while ($movie=$result->fetch_assoc()) {
			?>
<div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="watch.php?watch=<?php echo $movie['moviesID'];?>">
<img class="img-fluid img-thumbnail" src="image/<?php echo $movie['movies_image'];?>">
<div id="new">New</div>
<div class="view"><button><i class='far fa-play-circle'></i><!--plat--></button></div>
<div class="v_name"><?php echo $movie['movies_name'];?></div>
<div class="ret_stars text-center">
<i class='fa fa-star'></i>
<i class='fa fa-star'></i>
<i class='fa fa-star'></i>
<i class='fa fa-star'></i>
<i class='fa fa-star-half-o'></i>
</div>
</a>
</div>
</div>

		<?php
		}
	}else{
		?>
		<h3 class="no_movies text-center" style="font-size: 20px;">NO Movie Were Found!</h3>
	<?php
	}
}

		
?>



<?php include("layout/footer.php");?>
</div>