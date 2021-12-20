<?php
include("../db/db.php");
//if (isset($_POST['submit'])) {
	# code...
$cat_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['cat_title']), ENT_QUOTES, 'UTF-8');
if (empty($cat_title)) {
echo $message='<div class="error btn btn-danger">Category is empty</div>';
}else{
$result=$conn->query("SELECT * FROM categories WHERE cat_title='".$cat_title."'");
		$rows=$result->num_rows;
		if ($rows>0) {
			echo $message4='<div class="error btn-danger">Category name already exist.</div>';
		
}else{

$stmt = $conn->prepare("INSERT INTO categories (cat_title)VALUES(?) ");
$stmt->bind_param("s", $cat_title);
$stmt->execute();
 echo '<div id="result btn-danger">category inserted successfully!</div>';
	 $stmt->close();
    $conn->close();

}
}
?>