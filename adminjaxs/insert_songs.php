<?php session_start();?>
<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php include("includes/head.php");
include("includes/nav.php");?>
<?php
$message='';
include("db/db.php");
if (isset($_POST['submit'])) {
$song_name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['song_name']), ENT_QUOTES, 'UTF-8');
$song_cat =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['song_cat']), ENT_QUOTES, 'UTF-8');
$price =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['price']), ENT_QUOTES, 'UTF-8');
$image =$_FILES['image']['name'];
$image_tmp =$_FILES['image']['tmp_name'];
$video=$_POST['video'];
$audio=$_POST['audio'];
$producer = $_POST['producer'];
//$video =$_FILES['video']['name'];
//$video_tmp =$_FILES['video']['tmp_name'];
//$audio =$_FILES['audio']['name'];
//$audio_tmp =$_FILES['audio']['tmp_name'];

$result=$conn->query("SELECT * FROM songs WHERE song_name='".$song_name."'");
$rows=$result->num_rows;
if($rows>0){
  $message='<div class="error btn btn-danger">Song already exist.</div>';
}else{
  move_uploaded_file($image_tmp, "../songsimg/$image");
  //move_uploaded_file($video_tmp, "../songs/$video");
  //move_uploaded_file($audio_tmp, "../songs/$audio");
  $stmt=$conn->prepare("INSERT INTO songs (song_name,song_cat,price,image,video,audio,producer)VALUES(?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssss",$song_name,$song_cat,$price,$image,$video,$audio,$producer);
  $stmt->execute();
  $message='<div class="bg-success">Song successfully Uploaded!</div>';
   $stmt->close();
    $conn->close();
}

}

?>
<div class="container">
<div id="result"><?php echo $message;?></div>
<form id="insertmovies" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
<label>Song Name</label>
<input class="form-control" type="text" name="song_name" placeholder="Song Name">
</div>
<div class="form-group">
<label for="country">Category</label>
<select class="form-control"  name="song_cat" required>
<option >Select Category</option>
<?php
$sql="SELECT * FROM song_cat";
$run=mysqli_query($conn, $sql);
while ($cat=mysqli_fetch_object($run)) {
?>
<option value="<?php echo $cat->cat_id;?>"><?php echo $cat->cat_name;?></option>
<?php
}
?>
</select>
</div>

<input class="form-control" type="hidden" name="price" value="2" readonly>

<div class="form-group">
<label>Image</label>
<input class="form-control" type="file" name="image">
</div>
<div class="form-group">
<label>Video</label>
<input class="form-control" type="text" name="video">
</div>
<div class="form-group">
<label>Audio</label>
<input class="form-control" type="text" name="audio">
</div>
<div class="form-group">
<label>Producer</label>
<input class="form-control" type="text" name="producer">
</div>

<div class="form-group text-center">
<input type="submit" name="submit" value="Submit" style="text-align: center;background: green;font-size: 20px;letter-spacing: 2px;width: 100%; color: white;">
</div>
</form>
</div>