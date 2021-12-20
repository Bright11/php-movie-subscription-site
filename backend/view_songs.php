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
<div class="container">
<h2 class="movie" align="center">Movies Table</h2>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Song Id</th>
        <th>Song Name</th>
        <th>Image</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM songs";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($movie=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $movie['id'];?></td>
        <td><?php echo $movie['song_name'];?></td>
        <td><img style="height: 24vh;" src="../songsimg/<?php echo $movie['image'];?>"></td>
         <td class="bg-danger" align="center"><a href="delete_song.php?delete_song=<?php echo $movie['id'];?>" style="text-decoration: none;color: white;">Delete</a></td>

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