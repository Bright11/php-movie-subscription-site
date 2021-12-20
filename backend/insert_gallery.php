<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php
$message='';  $name='';
if (isset($_POST['submit'])) {
include("db/db.php");
$name = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['name']), ENT_QUOTES, 'UTF-8');
$image = $_FILES['image']['name'];
$image_tmp =$_FILES['image']['tmp_name'];
if (empty($name)) {
	echo $message='<div class="error text-center bg-danger">Name is empty!</div>';
}
elseif (empty($image)) {
		echo $message='<div class="error text-center bg-danger">Select image!</div>';
}
else{
	move_uploaded_file($image_tmp, "../gallery/$image");

$stmt = $conn->prepare("INSERT INTO gallery (name,image)VALUES(?,?) ");
$stmt->bind_param("ss", $name, $image);
$stmt->execute();
  $message='<div class="bg-success"style="color:white; font-size:20px;">Galler received successfully!</div>';
 $name='';
   $stmt->close();
    $conn->close();

}
}


?>
<div class="container">
<h2 class="text-center bg-success" style="color: white; font-size: 30px;">Insert gallery</h2>
<?php echo $message;?>
<form action="" method="post" enctype="multipart/form-data">
<label for="name">Name</label>
<div class="form-group">
<input type="text" class="form-control" name="name" value="<?php echo $name;?>">
</div>
<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" name="image">
</div>
<div class="form-group">
<input type="submit" class="form-control" name="submit" style="color: white;
font-size:20px; font-weight:bold; background: green;">
</div>
</form>


<h3 class="text-center mt-4" style="color: white; font-size: 20px; text-transform: uppercase; background: green;">Gallery images</h3>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Gallery Id</th>
        <th>Gallery Name</th>
        <th>Gallery Image</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM gallery";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($gallery=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $gallery['id'];?></td>
        <td><?php echo $gallery['name'];?></td>
        <td><img style="height: 24vh;" src="../gallery/<?php echo $gallery['image'];?>"></td>
         <td class="bg-success" align="center"><a href="updategallery.php?gallery=<?php echo $gallery['id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletegallery.php?gallery=<?php echo $gallery['id'];?>" style="text-decoration: none;color: white;">Delete</a></td>

      </tr>
     <?php
    }
   }else{
    ?>
    <h4>No movie yet</h4>
    <?php
   }
    ?>
      
      
    </tbody>
  </table>

</div>