<?php
include("includes/head.php");
?>
<title>JAXINN FILMS PRODUCTION</title>
<meta name="author" content="JAXINN">
</head>
<body>
<?php
include("layout/navbar.php");
?>
<link rel="stylesheet" type="text/css" href="css/news.css">
<div class="container mt-4">
<?php
include("newsinfor/newsheader.php");
?>
</div>
<div class="container text-center mt-4">
<div class="row">
<div class="col-md-9">
<div class="row">
<?php
include("db/db.php");
if (isset($_GET['news'])) {
$newscat_id = $_GET['news'];

$stmt=$conn->prepare("SELECT * FROM news WHERE newscat='$newscat_id'");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($news= $result->fetch_assoc()) {
    ?>
  <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
<div class="headline text-center">
<a href="readnews?read=<?php echo $news['newsid'];?>">
<!--img src="newsimages/<?php// echo $news['image'];?>"class="rounded mx-auto d-block img-thumbnail" alt="..."-->
<p><?php echo $news['headline'];?></p>
</a>
</div>
</div>
<?php
}
}else{
?>
<p class="newss text-center" style="letter-spacing: 2px;">Coming Soon</p>
<?php
}
}else{
	header("Location:news.php");
}
?>

</div>

</div>
<div class="col-md-3">
<div class="headline text-center">
<a href="">
<!--p>Google add</p-->
</a>
</div>

</div>

</div>
</div>
</div>



<?php include("layout/footer.php");?>