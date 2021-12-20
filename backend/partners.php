<?php
if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<?php
$message='';  $partners_name='';
if (isset($_POST['submit'])) {
include("db/db.php");
$partners_name = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['partners_name']), ENT_QUOTES, 'UTF-8');
$partners_logo = $_FILES['partners_logo']['name'];
$partners_logo_tmp =$_FILES['partners_logo']['tmp_name'];
if (empty($partners_name)) {
	$message='<div class="error text-center bg-danger">Name is empty!</div>';
}
elseif (empty($partners_logo)) {
		$message='<div class="error text-center bg-danger">Select logo!</div>';
}
else{
  $result=$conn->query("SELECT * FROM partners WHERE partners_name='".$partners_name."'");
    $rows=$result->num_rows;
  if ($rows>0) {
     $message='<div class="error text-center bg-danger">Partner already exit!</div>';
    }

else{
	move_uploaded_file($partners_logo_tmp, "../sponsorimg/$partners_logo");

$stmt = $conn->prepare("INSERT INTO partners (partners_name,partners_logo)VALUES(?,?) ");
$stmt->bind_param("ss", $partners_name, $partners_logo);
$stmt->execute();
  $message='<div class="bg-success"style="color:white; font-size:20px;">Partner received successfully!</div>';
 $partners_name='';
   $stmt->close();
    $conn->close();

}
}
}

?>
<div class="container">
<h2 class="text-center bg-success" style="color: white; font-size: 30px;">Insert Partners</h2>
<?php echo $message;?>
<form action="" method="post" enctype="multipart/form-data">
<label for="name">Company Name</label>
<div class="form-group">
<input type="text" class="form-control" name="partners_name" value="<?php echo $partners_name;?>">
</div>
<div class="form-group">
<label for="image">Partners Logo</label>
<input type="file" class="form-control" name="partners_logo">
</div>
<div class="form-group">
<input type="submit" class="form-control" name="submit" style="color: white;
font-size:20px; font-weight:bold; background: green;">
</div>
</form>


<h3 class="text-center mt-4" style="color: white; font-size: 20px; text-transform: uppercase; background: green;">Partners</h3>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Partners Id</th>
        <th>Partners Company</th>
        <th>Partners Logo</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM partners";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($partner=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $partner['partners_id'];?></td>
        <td><?php echo $partner['partners_name'];?></td>
        <td><img style="height: 24vh;" src="../sponsorimg/<?php echo $partner['partners_logo'];?>"></td>
         <td class="bg-success" align="center"><a href="updatepart.php?partners=<?php echo $partner['partners_id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletepartner.php?partner=<?php echo $partner['partners_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>

      </tr>
     <?php
    }
   }else{
    ?>
    <h4>No Partners yet</h4>
    <?php
   }
    ?>
      
      
    </tbody>
  </table>

</div>