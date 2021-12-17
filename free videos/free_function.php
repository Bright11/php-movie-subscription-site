<?php
function freeindex_movie(){
 include("db/db.php");
 if (!isset($_GET['freecat'])) {
 $stmt=$conn->prepare("SELECT * FROM free_videos");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($free=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="freewatch?freewatch=<?php echo $free['id'];?>">
<img class="img-fluid img-thumbnail" src="freeimage/<?php echo $free['image'];?>">
<div id="new">New</div>
<div class="view"><button><i class='far fa-play-circle'></i><!--plat--></button></div>
<div class="v_name"><?php echo $free['name'];?></div>
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
 <h4 class="text-center" align="center">No free movie available</h4>
 <?php
 }
}

}
?>


<?php
//free categories
function freecategory(){
include("db/db.php");
$sql="SELECT * FROM free_categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
while ($freecats=$run->fetch_assoc()) {
	?>
<hr>
  <div class="cat">
  <a href="free_videos?freecat=<?php echo $freecats['freecat_id'];?>"><?php echo $freecats['freecat_title'];?></a>
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
//getting free categories
 function getfreecat(){
 if (isset($_GET['freecat'])) {
 	$freecat_id=$_GET['freecat'];
	include("db/db.php");
	$stmt=$conn->prepare("SELECT * FROM free_videos WHERE id='$freecat_id'");
 $stmt->execute();
 $result=$stmt->get_result();
 if ($result->num_rows>0) {
 	while ($free=$result->fetch_assoc()) {
 	?>
 	<div class="col-lg-3 col-md-4 col-xs-12 col-sm-6">
<div class="image">
<a href="freewatch?freewatch=<?php echo $free['id'];?>">
<img class="img-fluid img-thumbnail" src="freeimage/<?php echo $free['image'];?>">
<div id="new">New</div>
<div class="view"><button><i class='far fa-play-circle'></i><!--plat--></button></div>
<div class="v_name"><?php echo $free['name'];?></div>
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