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
$name = $_POST['name'];
$message =$_POST['message'];

  $stmt=$conn->prepare("INSERT INTO aboutus(name,message)VALUES(?,?)");
    $stmt->bind_param("ss", $name, $message);
    $stmt->execute();
    $message='<div class="bg-success"style="color:white; font-size:20px;">information has been sent!</div>';
    $stmt->close();
    $conn->close();
   // header("Location:index.php?view_news");

}
?>
<div class="container">
<h2 class="text-center bg-success" style="color: white; font-size: 30px;">Insert about us here</h2>
<?php echo $message;?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Infor Header</label>
<textarea class="form-control ckeditor" name="name" placeholder="Enter Information Header" required></textarea>
</div>

<div class="form-group">
<label for="name">Information</label>
<textarea class="form-control ckeditor" name="message"placeholder="Enter Information" required></textarea>
</div>
<div class="form-group">
<input type="submit" class="form-control" name="submit" style="color: white;
font-size:20px; font-weight:bold; background: green;">
</div>
</form>

</div>