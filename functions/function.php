<?php
function index_movie(){
 include("db/db.php");
 $stmt=$conn->prepare("SELECT * FROM j_movies LIMIT 8");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($movie=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="watch?watch=<?php echo $movie['moviesID'];?>">
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
<style type="text/css">
.image a{
	text-decoration: none;
	color: black;
}
.v_name{
	font-size: 20px;
	color: black;
}
</style>
 	<?php
 	}
 }else{
 ?>
 <h4>No movie available</h4>
 <?php
 }
}
?>

<?php
function topmovies(){
  include("db/db.php");
 $stmt=$conn->prepare("SELECT * FROM j_movies LIMIT 8");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($movie=$result->fetch_assoc()) {
 ?>
 	
<div class="imageslid">
<a href="watch?watch=<?php echo $movie["moviesID"];?>">
<img class="img-fluid img-thumbnail" src="image/<?php echo $movie["movies_image"];?>">
<div id="new">New</div>
<div class="view"><button><i class="far fa-play-circle"></i><!--plat--></button></div>
<div class="v_name" style="text-align: center;"><?php echo $movie["movies_name"];?></div>
<div class="ret_stars text-center">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half-o"></i>
</div>
</a>
</div>
<?php
 }
 	}
  }


?>


<?php
function howitworks(){
 include("db/db.php");
 $stmt=$conn->prepare("SELECT * FROM j_movies LIMIT 3");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($movie=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-4 col-md-34 col-xs-12 col-sm-6">
<div class="image">
<a href="watch?watch=<?php echo $movie['moviesID'];?>">
<img class="img-fluid img-thumbnail" src="image/<?php echo $movie['movies_image'];?>">
<div id="new">New</div>
<div class="view"><button><i class='far fa-play-circle'></i><!--plat--></button></div>
<div class="v_name" style="text-align: center;"><?php echo $movie['movies_name'];?></div>
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
 <h4>No movie available</h4>
 <?php
 }
}
?>


<?php
function parners(){
 include("db/db.php");
 $stmt=$conn->prepare("SELECT * FROM partners");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($partner=$result->fetch_assoc()) {
 	?>
<div class="image">
<img class="img-fluid img-thumbnail" src="sponsorimg/<?php echo $partner['partners_logo'];?>">
<div class="v_name text-uppercase text-center"><?php echo $partner['partners_name'];?></div>

</div>
<style type="text/css">
.pslide{
  object-fit: cover;
  object-position: center center;
}
</style>
 	<?php
 	}
 }else{
 ?>
 <h4></h4>
 <?php
 }
}
?>

<?php
//category
function category(){
include("db/db.php");
$sql="SELECT * FROM categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
while ($category=$run->fetch_assoc()) {
	?>
<hr>
  <div class="cat">
  <a href="category?cat=<?php echo $category['cat_id'];?>"><?php echo $category['cat_title'];?></a>
</div>
<style type="text/css">
  .cat a{
text-decoration:none;
  color: black;
  font-size: 20px;
}
</style>
<?php
}
}else{
	?>
<h4>Coming soon</h4>
<?php
}
}
?>


<?php
//category
function country(){
include("db/db.php");
$sql="SELECT * FROM countries";
$run=$conn->query($sql);
if ($run->num_rows>0) {
while ($country=$run->fetch_assoc()) {
	?>
<hr>
  <div class="cat">
  <a href="category?country=<?php echo $country['country_id'];?>"><?php echo $country['country_name'];?></a>
</div>

<?php
}
}else{
	?>
<h4>Coming soon</h4>
<?php
}
}
?>



<?php 
function allproduct(){
if (!isset($_GET['cat'])) {
	if (!isset($_GET['country'])) {
	include("db/db.php");
	$stmt=$conn->prepare("SELECT * FROM j_movies");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($movie=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="watch?watch=<?php echo $movie['moviesID'];?>">
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
 }
 }
}
 }
 ?>

 <?php
 //getting country
 function getcountry(){
 if (isset($_GET['country'])) {
 	$country_id=$_GET['country'];
	include("db/db.php");
	$stmt=$conn->prepare("SELECT * FROM j_movies WHERE country='$country_id'");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($movie=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="watch?watch=<?php echo $movie['moviesID'];?>">
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
 <h4>Coming soon</h4>
 <?php
 }
 }
}
?>

<?php
 //getting categories
 function getcat(){
 if (isset($_GET['cat'])) {
 	$cat_id=$_GET['cat'];
	include("db/db.php");
	$stmt=$conn->prepare("SELECT * FROM j_movies WHERE movies_cat='$cat_id'");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($movie=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="watch?watch=<?php echo $movie['moviesID'];?>">
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
 <h4>Coming soon</h4>
 <?php
 }
 }
}
?>

<?php
//How it works
function itworks(){
include("db/db.php");
$sql="SELECT * FROM howitworks";
$run=$conn->query($sql);
if ($run->num_rows>0) {
while ($itworks=$run->fetch_assoc()) {
  ?>
<hr>
<h4><?php echo $itworks['title'];?></h4>
<p><?php echo $itworks['details'];?></p>
<?php
}
}else{
  ?>
<h4>Coming soon</h4>
<?php
}
}
?>