<?php
include("../db/db.php");
//if (isset($_POST['submit'])) {
	# code...
$newscat_title =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['newscat_title']), ENT_QUOTES, 'UTF-8');
if (empty($newscat_title)) {
echo $message='<div class="error btn btn-danger"> empty Filed</div>';
}else{
$result=$conn->query("SELECT * FROM news_categories WHERE newscat_title='".$newscat_title."'");
		$rows=$result->num_rows;
		if ($rows>0) {
			echo $message4='<div class="error btn-danger">Category name already exist.</div>';
		
}else{

$stmt = $conn->prepare("INSERT INTO news_categories (newscat_title)VALUES(?) ");
$stmt->bind_param("s", $newscat_title);
$stmt->execute();
 echo '<div id="result btn-danger">Category inserted successfully!</div>';
	 $stmt->close();
    $conn->close();

}
}
?>