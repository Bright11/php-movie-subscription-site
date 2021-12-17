<h2 align="center">Registered table</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>User Id</th>
        <th>User name</th>
        <th>User email</th>
        <th>Membership</th>
        <th>Date</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php
$sql="SELECT * FROM register";
$run=$conn->query($sql);
if ($run->num_rows>0) {
  while ($member=$run->fetch_assoc()) {
?>
<tr>
       <td><?php echo $member['id'];?></td>
        <td><?php echo $member['username'];?></td>
        <td><?php echo $member['email'];?></td>
        <td><?php echo $member['member'];?></td>
        <td><?php echo $member['date'];?></td>
         <td class="bg-danger" align="center"><a href="" style="text-decoration: none;color: white;">Delete</a></td>
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

