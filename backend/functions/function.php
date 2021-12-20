<?php
function insert_movie(){
include("db/db.php");
if (isset($_POST['submit'])) {
$movies_name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['movies_name']), ENT_QUOTES, 'UTF-8');
$movies_cat =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['movies_cat']), ENT_QUOTES, 'UTF-8');
$country =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['country']), ENT_QUOTES, 'UTF-8');
$movies_director =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['movies_director']), ENT_QUOTES, 'UTF-8');
$movies_year =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['movies_year']), ENT_QUOTES, 'UTF-8');
$movies_des =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['movies_des']), ENT_QUOTES, 'UTF-8');
$movies_keywords =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['movies_keywords']), ENT_QUOTES, 'UTF-8');
$download =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['download']), ENT_QUOTES, 'UTF-8');
$movies_image =$_FILES['movies_image']['name'];
$movies_image_tmp =$_FILES['movies_image']['tmp_name'];
$movies_video =$_POST['movies_video'];
//$movies_video =$_FILES['movies_video']['name'];
//$movies_video_tmp =$_FILES['movies_video']['tmp_name'];

if (empty($movies_name)) {
  echo $message='<div class="error btn btn-danger">Movie name is empty</div>';
  }else{

$result=$conn->query("SELECT * FROM j_movies WHERE movies_name='".$movies_name."'");
    $rows=$result->num_rows;
  if ($rows>0) {
  echo $message='<div class="error btn btn-danger">Movie name already exist.</div>';
    
}
elseif ($movies_cat=='Select Category') {
  echo $message='<div class="error btn btn-danger">Select category please</div>';
}elseif ($country=='Select Country') {
  echo $message='<div class="error btn btn-danger">Select country please</div>';
}
elseif (empty($movies_image)) {
  echo $message='<div class="error btn btn-danger">Chose an image</div>';
}elseif (empty($movies_video)) {
  echo $message='<div class="error btn btn-danger">Chose a video</div>';
}
elseif (empty($movies_director)) {
  echo $message='<div class="error btn btn-danger">Who directed the movie</div>';
}elseif (empty($movies_year)) {
  echo $message='<div class="error btn btn-danger">Which year was the movie produced</div>';
}elseif (empty($movies_des)) {
  echo $message='<div class="error btn btn-danger">Movie description is empty</div>';
}elseif (empty($movies_keywords)) {
  echo $message='<div class="error btn btn-danger">Keywords is empty</div>';
}elseif (empty($download)) {
  echo $message='<div class="error btn btn-danger">Download link is empty</div>';
}
else{

move_uploaded_file($movies_image_tmp, "../image/$movies_image");
//move_uploaded_file($movies_video_tmp, "../movies_video/$movies_video");

$stmt = $conn->prepare("INSERT INTO j_movies (movies_name,movies_cat,country,movies_director, movies_year, movies_des, movies_keywords, download, movies_image, movies_video)VALUES(?,?,?,?,?,?,?,?,?,?) ");
$stmt->bind_param("ssssssssss", $movies_name, $movies_cat, $country, $movies_director, $movies_year, $movies_des, $movies_keywords,$download, $movies_image, $movies_video);
$stmt->execute();
 echo $message='<div class="bg-success">Video received successfully!</div>';
   $stmt->close();
    $conn->close();
    header("Location:index.php?view_movies");

}
}
}
//}

?>
<div id="result"><?php $message;?></div>
<form id="insertmovies" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Name</label><br>
<input class="form-control" type="text" name="movies_name" placeholder="Movie Name">
</div>
<div class="form-group">
<label for="country">Country</label>
<select class="form-control"  name="country" >
<option >Select County</option>
<?php
$sql="SELECT * FROM countries";
$run=mysqli_query($conn, $sql);
while ($country=mysqli_fetch_object($run)) {
?>
<option value="<?php echo $country->country_id;?>"><?php echo $country->country_name;?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label for="video_cat">Categories</label>
<select class="form-control"  name="movies_cat" >
<option >Select Category</option>
<?php
$sql="SELECT * FROM categories";
$run=mysqli_query($conn, $sql);
while ($categories=mysqli_fetch_object($run)) {
?>
<option value="<?php echo $categories->cat_id;?>"><?php echo $categories->cat_title;?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label>image</label><br>
<?php // echo $message2;?>
<input class="form-control" type="file" name="movies_image">
</div>

<div class="form-group">
<label>Video</label><br>
<?php //$message3;?>
<input class="form-control" type="text" name="movies_video" >
</div>
<div class="form-group">
<label>Directed by</label><br>
<input class="form-control" type="text" name="movies_director" placeholder="Who directed the movie--Enter it here">
</div>
<div class="form-group">
<label>Year</label><br>
<input class="form-control" type="text" name="movies_year" placeholder="Year">
</div>
<div class="form-group">
<label>Movie description</label><br>
<textarea class="form-control" name="movies_des" placeholder="Enter movie description..."></textarea>
</div>
<div class="form-group">
<label>keywords</label><br>
<textarea class="form-control" name="movies_keywords" placeholder="Like name,action,nice etc"></textarea>
</div>
<div class="form-group">
<label>Download Link</label><br>
<textarea class="form-control" name="download" placeholder="Download link"></textarea>
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit" align="center" style="background: green; color: white; font-size: 20px;">
</div>
</form>
<?php
}
?>


<?php
function free_movie(){
include("db/db.php");
if (isset($_POST['freesubmit'])) {
$name =$_POST['name'];
$image =$_FILES['image']['name'];
$image_tmp =$_FILES['image']['tmp_name'];
$videos =$_FILES['videos']['name'];
$videos_tmp =$_FILES['videos']['tmp_name'];

if (empty($name)) {
  echo $message='<div class="error btn btn-danger">Movie name is empty</div>';
  }else{

$result=$conn->query("SELECT * FROM free_videos WHERE name='".$name."'");
    $rows=$result->num_rows;
  if ($rows>0) {
  echo $message='<div class="error btn btn-danger">Movie name already exist.</div>';
    
}
elseif (empty($image)) {
  echo $message='<div class="error btn btn-danger">Chose an image</div>';

}elseif (empty($videos)) {
  echo $message='<div class="error btn btn-danger">Chose a video</div>';
}else{

move_uploaded_file($image_tmp, "../freeimage/$image");
move_uploaded_file($videos_tmp, "../freevideos/$videos");

$stmt = $conn->prepare("INSERT INTO j_movies (name,image,videos)VALUES(?,?,?) ");
$stmt->bind_param("sss", $name, $image, $videos);
$stmt->execute();
 echo $message='<div class="bg-success">Video received successfully!</div>';
   $stmt->close();
    $conn->close();

}
}
}
//}

?>
<div id="result"><?php $message;?></div>
<form id="insertmovies" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Name</label><br>
<input class="form-control" type="text" name="name">
</div>
<div class="form-group">
<label>image</label><br>
<?php // echo $message2;?>
<input class="form-control" type="file" name="image" >
</div>

<div class="form-group">
<label>Video</label><br>
<?php //$message3;?>
<input class="form-control" type="file" name="videos" >
</div>
<div class="form-group">
<input type="submit" name="submit" id="submit" align="center">
</div>
</form>
<?php
}
?>
