<?php

include("includes/head.php");
include("layout/navbar.php");
?>
<?php 
require ("db/db.php");

if (isset($_GET['canceled'])) {
	$email=htmlspecialchars (mysqli_real_escape_string($conn,$_GET['canceled']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM register WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
	?>
<div class ="alert alert-warning">
	You have canceled your subscription .
	Kindly Subscribe and enjoy our best movies and many more.
<strong><a href="index">Home</a></strong>
						</div>

<?php	
}else{
header("Location:index?stopit");
}
	}
?>

