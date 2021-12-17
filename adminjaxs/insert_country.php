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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert_country">
    Insert Country
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="insert_country">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Insert Country</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
       <form id="country" action="functions/insert_country.php" method="post">
<div class="form-group">
<?php //echo $message6;?>
<label>Country name</label><br>
<input class="form-control" type="name" name="country_name">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="submit" id="submit"  style="background: green; font-size: 20px; color: white;">
</div>
</form>
<div id="result"></div>
<script type="text/javascript">
$("#submit").click(function(){
$.post( $("#country") .attr("action"), $("#country :input").serializeArray(), function(info){$("#result").html(info);});
});
$("#country").submit(function(){
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

<h2 align="center">Country table</h2>
              
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
$sql="SELECT * FROM countries";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($country=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $country['country_id'];?></td>
        <td><?php echo $country['country_name'];?></td>
         <td class="bg-success" align="center"><a href="updatecountry.php?country=<?php echo $country['country_id'];?>" style="text-decoration: none;color: white;">Update</a></td>
         <td class="bg-danger" align="center"><a href="deletecountry.php?country=<?php echo $country['country_id'];?>" style="text-decoration: none;color: white;">Delete</a></td>
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

