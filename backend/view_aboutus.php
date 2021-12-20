<h3 class="text-center mt-4" style="color: white; font-size: 18px; text-transform: uppercase; background: green; letter-spacing: 1px;">About Us</h3>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Header Infor</th>
        <th>Information</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM aboutus";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($about=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $about['id'];?></td>
        <td><?php echo $about['name'];?></td>
        <td><?php echo $about['message'];?></td>
        
         <td class="bg-success" align="center"><a href="updateabout.php?about=<?php echo $about['id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deleteabout.php?about=<?php echo $about['id'];?>" style="text-decoration: none;color: white;">Delete</a></td>

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
