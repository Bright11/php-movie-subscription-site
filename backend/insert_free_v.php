<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php
include("db/db.php");
 $message='';
if (isset($_POST['freesubmit'])) {
$name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['name']), ENT_QUOTES, 'UTF-8');
$freecat =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['freecat']), ENT_QUOTES, 'UTF-8');
$image =$_FILES['image']['name'];
$image_tmp =$_FILES['image']['tmp_name'];
//$videos =$_FILES['videos']['name'];
//$videos_tmp =$_FILES['videos']['tmp_name'];
$videos =$_POST['videos'];

if (empty($name)) {
  echo $message='<div class="error btn btn-danger">Movie name is empty</div>';
  }elseif (empty($freecat)) {
   echo $message='<div class="error btn btn-danger">Movie Category is empty</div>';
  }
  else{

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
//move_uploaded_file($videos_tmp, "../freevideos/$videos");

$stmt = $conn->prepare("INSERT INTO free_videos (name, freecat, image,videos)VALUES(?,?,?,?) ");
$stmt->bind_param("ssss", $name,$freecat, $image, $videos);
$stmt->execute();
 echo $message='<div class="bg-success">Video received successfully!</div>';
   $stmt->close();
    $conn->close();

}
}
}
//}


?>
<div class="container">
   <h3>Inert Free Videos</h3>
    <form id="insertmovies" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Name</label><br>
<input class="form-control" type="text" name="name">
</div>
<div class="form-group">
<label>Name</label><br>
<select class="form-control" name="freecat">
<option >Select Category</option>
<?php
$sql="SELECT * FROM free_categories";
$run=mysqli_query($conn, $sql);
while ($freecat=mysqli_fetch_object($run)) {
?>
<option value="<?php echo $freecat->freecat_id;?>"><?php echo $freecat->freecat_title;?></option>
<?php
}
?>
</select>
</div>
<div class="form-group">
<label>image</label><br>
<?php // echo $message2;?>
<input class="form-control" type="file" name="image" >
</div>

<div class="form-group">
<label>Video</label><br>
<?php //$message3;?>
<input class="form-control" type="text" name="videos" >
</div>
<div class="form-group">
<input type="submit" name="freesubmit" id="freesubmit" align="center">
</div>
</form>
<div id="result"></div>


 <h2 class="movie" align="center">Movies Table</h2>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Movie Id</th>
        <th>Movie Name</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM free_videos";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($free=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $free['id'];?></td>
        <td><?php echo $free['name'];?></td>
        <td><img style="height: 24vh;" src="../freeimage/<?php echo $free['image'];?>"></td>
         <td class="bg-success" align="center"><a href="updatefreev.php?free=<?php echo $free['id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletefreev.php?free=<?php echo $free['id'];?>" style="text-decoration: none;color: white;">Delete</a></td>

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
