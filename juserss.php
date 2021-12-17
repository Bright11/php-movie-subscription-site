<?php
//session_start();
if (isset($_SESSION['username'])) {

//echo "Welcome".$_SESSION['username'];
@session_start();
require ("db/db.php");
$email = htmlspecialchars(mysqli_real_escape_string($conn,$_SESSION['username']), ENT_QUOTES, 'UTF-8');
$sql = "SELECT * FROM register WHERE username='$email'";
$run = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($run);

$usersUpgradeDate = $result['date'];
$MembershipEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($usersUpgradeDate)). "+ 30 day"));
}
?>

<?php

?>