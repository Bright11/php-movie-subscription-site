<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<div class="container">
<h2 class="movie" align="center">Movies Table</h2>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Movie Id</th>
        <th>Movie Name</th>
        <th>Director</th>
        <th>Year</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM j_movies";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($movie=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $movie['moviesID'];?></td>
        <td><?php echo $movie['movies_name'];?></td>
        <td><?php echo $movie['movies_director'];?></td>
        <td><?php echo $movie['movies_year'];?></td>
        <td><img style="height: 24vh;" src="../image/<?php echo $movie['movies_image'];?>"></td>
         <td class="bg-success" align="center"><a href="update_product.php?uproduct=<?php echo $movie['moviesID'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="delete_product.php?delete_product=<?php echo $movie['moviesID'];?>" style="text-decoration: none;color: white;">Delete</a></td>

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