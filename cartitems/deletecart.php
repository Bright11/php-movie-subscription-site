<?php
//Deleting the cart
if (isset($_GET['remove'])) {
$product_id = $_GET['remove'];
include("db/db.php");
include("ip/user_ip.php");
$stmt= $conn->prepare("DELETE FROM cart WHERE user_ip=?");
$stmt->bind_param("s",$ip);
$stmt->execute();
$stmt= $conn->prepare("DELETE FROM orders WHERE user_ip=?");
$stmt->bind_param("s",$ip);
$stmt->execute();
header("Location:../cart.php");
}