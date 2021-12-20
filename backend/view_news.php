<h3 class="text-center mt-4" style="color: white; font-size: 18px; text-transform: uppercase; background: green; letter-spacing: 1px;">News</h3>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>News Id</th>
        <th>Headline</th>
        <th>News Details</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include("db/db.php");
   $sql="SELECT * FROM news ORDER BY newsid DESC";
   $run=$conn->query($sql);
   if ($run->num_rows>0) {
    while ($newsread=$run->fetch_assoc()) {
      ?>
    <tr>
        <td><?php echo $newsread['newsid'];?></td>
        <td><?php echo $newsread['headline'];?></td>
        <td><?php echo $newsread['news_details'];?></td>
        
         <td class="bg-success" align="center"><a href="updatenews.php?news=<?php echo $newsread['newsid'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletenews.php?news=<?php echo $newsread['newsid'];?>" style="text-decoration: none;color: white;">Delete</a></td>

      </tr>
     <?php
    }
   }else{
    ?>
    <h4>No News yet</h4>
    <?php
   }
    ?>
      
      
    </tbody>
  </table>
