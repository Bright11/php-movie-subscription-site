<?php
include("../db/db.php");
//if (isset($_POST['submit'])) {
	# code...
$country_name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['country_name']), ENT_QUOTES, 'UTF-8');
if (empty($country_name)) {
echo $message='<div class="error btn btn-danger">Country is empty</div>';
}else{
$result=$conn->query("SELECT * FROM countries WHERE country_name='".$country_name."'");
		$rows=$result->num_rows;
		if ($rows>0) {
			echo $message4='<div class="error btn-danger">Country name already exist.</div>';
		
}else{

$stmt = $conn->prepare("INSERT INTO countries (country_name)VALUES(?) ");
$stmt->bind_param("s", $country_name);
$stmt->execute();
 echo '<div id="result btn-danger">country inserted successfully!</div>';
	 $stmt->close();
    $conn->close();

}
}
?>