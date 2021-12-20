<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<div class="container">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert_category">
    Insert Category
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="insert_category">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Insert Category</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
       <form id="categories" action="functions/insert_cat.php" method="post">
<div class="form-group">
<?php //echo $message6;?>
<label>Category name</label><br>
<input class="form-control" type="name" name="cat_title">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit"  style="background: green; font-size: 20px; color: white;">
</div>
</form>
<div id="result"></div>
<script type="text/javascript">
$("#submit").click(function(){
$.post( $("#categories") .attr("action"), $("#categories :input").serializeArray(), function(info){$("#result").html(info);});
});
$("#categories").submit(function(){
return false;
});
</script>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<h2 align="center">Category table</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category Id</th>
        <th>Category name</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php
include("db/db.php");
$sql="SELECT * FROM categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($category=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $category['cat_id'];?></td>
        <td><?php echo $category['cat_title'];?></td>
         <td class="bg-success" align="center"><a href="updatecat.php?updatec=<?php echo $category['cat_id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletecat.php?deletecat=<?php echo $category['cat_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>
      </tr>
<?php
  }
}else{
  ?>
  <h3>No category were found</h3>
<?php
}

?>
       
     
    </tbody>
  </table>

</div>