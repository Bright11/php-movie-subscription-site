<?php	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

$con = new mysqli($servername, $username, $password,$dbname)
if($con->connect_error)
	die("Connection Failed." .$conn->connect_error);

}
?>