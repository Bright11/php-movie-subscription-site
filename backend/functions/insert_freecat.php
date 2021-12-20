<?php
include("../db/db.php");
//if (isset($_POST['submit'])) {
	# code...
$freecat_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['freecat_title']), ENT_QUOTES, 'UTF-8');
if (empty($freecat_title)) {
echo $message='<div class="error btn btn-danger">Category is empty</div>';
}else{
$result=$conn->query("SELECT * FROM free_categories WHERE freecat_title='".$freecat_title."'");
		$rows=$result->num_rows;
		if ($rows>0) {
			echo $message4='<div class="error btn-danger">Category name already exist.</div>';
		
}else{

$stmt = $conn->prepare("INSERT INTO free_categories (freecat_title)VALUES(?) ");
$stmt->bind_param("s", $freecat_title);
$stmt->execute();
 echo '<div id="result btn-danger">category inserted successfully!</div>';
	 $stmt->close();
    $conn->close();

}
}
?>