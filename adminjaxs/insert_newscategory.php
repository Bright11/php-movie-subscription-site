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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert_news">
    Insert News Category
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="insert_news">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Insert Country</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
       <form id="news" action="functions/insert_newscat.php" method="post">
<div class="form-group">
<?php //echo $message6;?>
<label>News Category</label><br>
<input class="form-control" type="text" name="newscat_title">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit"  style="background: green; font-size: 20px; color: white; letter-spacing: 2px;">
</div>
</form>
<div id="result"></div>
<script type="text/javascript">
$("#submit").click(function(){
$.post( $("#news") .attr("action"), $("#news :input").serializeArray(), function(info){$("#result").html(info);});
});
$("#news").submit(function(){
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

<h2 align="center"> News Category table</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category Id</th>
        <th>Category Name</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php
$sql="SELECT * FROM news_categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($news=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $news['newscat_id'];?></td>
        <td><?php echo $news['newscat_title'];?></td>
         <td class="bg-success" align="center"><a href="updatenewsc.php?updatenewsc=<?php echo $news['newscat_id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletenewsc.php?news=<?php echo $news['newscat_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>
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

