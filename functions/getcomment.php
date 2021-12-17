<?php
include("../db/db.php");
$stmt=$conn->prepare("SELECT * FROM comment ORDER BY comment_id DESC LIMIT 1");
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
  while ($watch= $result->fetch_assoc()) {
    ?>
  <div id="comment">
  <p><?php echo $watch['comment_name'];?></p>
  <p class="form-control"><?php echo $watch['comment_message'];?></p>
    
  </div>
<?php

}
}
?>