<?php include("includes/head.php");
include("includes/nav.php");?>

?>
<div class="container">
<h2 class="movie" align="center">Movies Table</h2>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Song Id</th>
        <th>Song Name</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM song_cat";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($movie=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $movie['cat_id'];?></td>
        <td><?php echo $movie['cat_name'];?></td>
         <td class="bg-danger" align="center"><a href="delete_songcat.php?delete_songcat=<?php echo $movie['cat_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>

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