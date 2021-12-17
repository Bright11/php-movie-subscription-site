<?php
//category
function songcategory(){
include("./db/db.php");
$sql="SELECT * FROM song_cat";
$run=$conn->query($sql);
if ($run->num_rows>0) {
while ($category=$run->fetch_assoc()) {
	?>
<hr>
  <div class="cat">
  <a href="newsongs?songcats=<?php echo $category['cat_id'];?>"><?php echo $category['cat_name'];?></a>
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


//function song(){


function songimg(){
  include ("./db/db.php");
  if (!isset($_GET['songcats'])) {
  $stmt= $conn->prepare("SELECT * FROM songs");
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
      ?>
<div class="col-lg-4 col-md-34 col-xs-12 col-sm-6">
<div class="image">
<a href="#view<?php echo $row['id'];?>" data-toggle="modal" >
<img class="img-fluid img-thumbnail" src="songsimg/<?php echo $row['image'];?>">
<div id="new">New</div>
<div class="view"><button><i class='far fa-play-circle'></i><!--plat--></button></div>
<div class="v_name" style="text-align: center;"><?php echo $row['song_name'];?></div>
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

<!------>

<div class="modal fade" id="view<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-3  text-center">
        <!--h1 class="login text-center bg-secondary">Product Details</h1-->
       <?php
       
          $view=mysqli_query($conn,"SELECT * FROM songs WHERE id='".$row['id']."'");
          $erow=mysqli_fetch_array($view);
        ?>
        <div class="container">
         <h5><a style="text-decoration: none; color: black;" href="play_audio?audio=<?php echo $erow['id']; ?>"><button style="background: #3cbc8d; letter-spacing: 2px; color: white; border: 2px solid #3cbc8d; font-size: 20px;">Play Audio</button></a></h5>
         <br>
          <h5><a style="text-decoration: none; color: black;" href="play_video?video=<?php echo $erow['id']; ?>"><button style="background: #3cbc8d; letter-spacing: 2px; color: white; border: 2px solid #3cbc8d; font-size: 20px;">Play Video</button></a></h5>
        </div>
        
      
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!------->
    <?php
    }
    //include"song_details.php";
  }
}
}


function getsongcat(){
include("./db/db.php");
 if (isset($_GET['songcats'])) {
 	$cat_id=$_GET['songcats'];

//$stmt=$conn->prepare("SELECT * FROM songs WHERE song_cat='$cat_id'");
$stmt = $conn->prepare("SELECT * FROM songs WHERE song_cat='$cat_id'");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
while ($row=$result->fetch_assoc()) {
?>
<div class="col-lg-4 col-md-34 col-xs-12 col-sm-6">
<div class="image">
<a href="#view<?php echo $row['id'];?>" data-toggle="modal" >
<img class="img-fluid img-thumbnail" src="songsimg/<?php echo $row['image'];?>">
<div id="new">New</div>
<div class="view"><button><i class='far fa-play-circle'></i><!--plat--></button></div>
<div class="v_name" style="text-align: center;"><?php echo $row['song_name'];?></div>
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

<!------>

<div class="modal fade" id="view<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-3  text-center">
        <!--h1 class="login text-center bg-secondary">Product Details</h1-->
       <?php
       
          $view=mysqli_query($conn,"SELECT * FROM songs WHERE id='".$row['id']."'");
          $erow=mysqli_fetch_array($view);
        ?>
        <div class="container">
         <h5><a style="text-decoration: none; color: black;" href="play_audio?audio=<?php echo $erow['id']; ?>"><button style="background: #3cbc8d; letter-spacing: 2px; color: white; border: 2px solid #3cbc8d; font-size: 20px;">Play Audio</button></a></h5>
         <br>
          <h5><a style="text-decoration: none; color: black;" href="play_video?video=<?php echo $erow['id']; ?>"><button style="background: #3cbc8d; letter-spacing: 2px; color: white; border: 2px solid #3cbc8d; font-size: 20px;">Play Video</button></a></h5>
        </div>
        
      
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php
}
}else{
?>
<h2>No song</h2>
<?php
}
}
}
?>

<?php
include("db/db.php");
if (isset($_POST['submit'])){
$song_name =$_POST['song_name'];
$audio =$_POST['audio'];
$video =$_POST['video'];
$price =$_POST['price'];
$user_ip = $ip;

$stmt= $conn->prepare("SELECT * FROM cart WHERE user_ip=?");
$stmt->bind_param("s",$ip);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
 
 $stmt= $conn->prepare("DELETE FROM cart WHERE user_ip=?");
$stmt->bind_param("s",$ip);
$stmt->execute();
$stmt= $conn->prepare("DELETE FROM orders WHERE user_ip=?");
$stmt->bind_param("s",$ip);
$stmt->execute();
//header("Location:cart");
$stmt = $conn->prepare("INSERT INTO cart(song_name,audio,price,video,user_ip)VALUES(?,?,?,?,?) ");
$stmt->bind_param("sssss",$song_name,$audio,$price,$video,$user_ip);
$stmt->execute();
$stmt = $conn->prepare("INSERT INTO orders(song_name,audio,price,user_ip,video)VALUES(?,?,?,?,?) ");
$stmt->bind_param("sssss",$song_name,$audio,$price,$user_ip,$video);

$stmt->execute();
header("Location:cart");
}else{
 $stmt = $conn->prepare("INSERT INTO cart(song_name,audio,price,video,user_ip)VALUES(?,?,?,?,?) ");
$stmt->bind_param("sssss",$song_name,$audio,$price,$video,$user_ip);
$stmt->execute();
$stmt = $conn->prepare("INSERT INTO orders(song_name,audio,price,user_ip,video)VALUES(?,?,?,?,?) ");
$stmt->bind_param("sssss",$song_name,$audio,$price,$user_ip,$video);

$stmt->execute();
header("Location:cart");
}

}
//}
?>
<style type="">
.songsubmit{
font-size: 20px;
font-weight: 25px;
letter-spacing: 2px;
min-width: 100%;
}
</style>