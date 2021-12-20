<?php
if (isset($_SESSION['adminusername'])) {
 

include("../db/db.php");
if (isset($_POST['submit'])) {
  # code...
$title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['title']), ENT_QUOTES, 'UTF-8');
$details =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['details']), ENT_QUOTES, 'UTF-8');
if (empty($title)) {
echo $message='<div class="error btn btn-danger">Title is empty</div>';
}
elseif (empty($details)) {
  echo $message='<div class="error btn btn-danger">Details is empty</div>';
}
else{
$result=$conn->query("SELECT * FROM howitworks WHERE title='".$title."'");
    $rows=$result->num_rows;
    if ($rows>0) {
      echo $message4='<div class="error btn-danger">Title name already exist.</div>';
    
}else{

$stmt = $conn->prepare("INSERT INTO howitworks (title,details)VALUES(?,?) ");
$stmt->bind_param("ss", $title,$details);
$stmt->execute();
 echo '<div id="result btn-danger">Message inserted successfully!</div>';
   $stmt->close();
    $conn->close();

}
}

}
?>

<div class="container">
   <h3>Inert details of how you site works</h3>
    <form id="itwork" action="" method="post">
<div class="form-group">
<label>Title</label>
<input class="form-control" type="text" name="title">
</div>
<div class="form-group">
<label>Message</label><br>
<textarea class="form-control" name="details"></textarea>
<!--input type="text" name="details"-->
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" style="background: green; font-size: 20px; color: white;">
</div>
</div>
</form>
<div id="result"></div>


   <h2 align="center">How it works table</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Details</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php
include("db/db.php");
$sql="SELECT * FROM howitworks";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($itworks=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $itworks['id'];?></td>
       <td><?php echo $itworks['title'];?></td>
        <td><?php echo $itworks['details'];?></td>
         <td class="bg-success" align="center"><a href="updateitworks.php?works=<?php echo $itworks['id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deleteitworks.php?works=<?php echo $itworks['id'];?>" style="text-decoration: none;color: white;">Delete</a></td>
      </tr>
<?php
  }
}else{
  ?>
  <h3>No details found</h3>
<?php
}

?>
       
     
    </tbody>
  </table>

</div>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>