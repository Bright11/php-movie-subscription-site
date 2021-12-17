<?php
include("includes/head.php");
?>
<meta name="description" content="Read latest news,breaking news,gossip,world news,politics,relationship,comedy,sports news,health,African news,celebraties,entertaiment and many more">
<meta name="keywords" content="Movies,Tvseries,action movies,free movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION NEWS CHANNEL</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>
<link rel="stylesheet" type="text/css" href="css/news.css">
<div class="container-fluid mt-4">
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
$stmt=$conn->prepare("SELECT * FROM news ORDER BY newsid DESC LIMIT 12");
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

<?php include("layout/footer.php");?>