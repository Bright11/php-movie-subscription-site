<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php
$headline=''; $news_details=''; $message='';
if (isset($_POST['submit'])) {
include("db/db.php");
$headline = $_POST['headline'];
$newscat = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['newscat']), ENT_QUOTES, 'UTF-8');
$news_details =$_POST['news_details'];
if ($newscat=='Select Category') {
  $message='<div class="bg-success"style="color:white; font-size:20px;">Select Category!</div>';
}
else{
$image = 0;

$stmt = $conn->prepare("INSERT INTO news (headline,newscat, news_details, image)VALUES(?,?,?,?) ");
$stmt->bind_param("ssss", $headline, $newscat, $news_details, $image);
$stmt->execute();
  $message='<div class="bg-success"style="color:white; font-size:20px;">News received successfully!</div>';
 $headline=''; $news_details='';
 
   $stmt->close();
    $conn->close();
   // header("Location:index.php?view_news");

}
}
?>
<div class="container">
<h2 class="text-center bg-success" style="color: white; font-size: 30px;">Insert News</h2>
<?php echo $message;?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="name">News Headline</label>
<textarea class="form-control ckeditor" name="headline" placeholder="Enter news headline" required></textarea>
</div>
<div class="form-group">
<label for="name">News Category</label>
<select class="form-control" name="newscat">
<option value="Select Category" style="color: black; font-size: 18px; letter-spacing: 2px; font-weight: 30px;">Select Category</option>
<?php
$sql="SELECT * FROM news_categories";
$run=mysqli_query($conn, $sql);
while ($newsc=mysqli_fetch_object($run)) {
?>
<option value="<?php echo $newsc->newscat_id;?>"><?php echo $newsc->newscat_title;?></option>
<?php
}
?>
</select>
</div>
<div class="form-group">
<label for="name">News Details</label>
<textarea class="form-control ckeditor" name="news_details"placeholder="Enter News Details" required></textarea>
</div>

<div class="form-group">
<input type="submit" class="form-control" name="submit" style="color: white;
font-size:20px; font-weight:bold; background: green;">
</div>
</form>

</div>
