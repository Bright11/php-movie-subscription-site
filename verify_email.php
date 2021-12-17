<?php
include("includes/head.php");
?>
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");

?>
<?php
if (isset($_SESSION['username'])) {
$email = htmlspecialchars (mysqli_real_escape_string($conn,$_SESSION['username']), ENT_QUOTES, 'UTF-8');
$sql = "SELECT * FROM register WHERE username='$email'";
$run = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($run);

}else{
  header('Location:sigin');
  exit();
}
?>
<?php
if (isset($_GET['canceled']) ) {
	 $canceled=htmlspecialchars (mysqli_real_escape_string($conn,$_GET['canceled']), ENT_QUOTES, 'UTF-8');
						 ?>
 <div class ="alert alert-warning">
	You have canceled your subscription .
	Kindly Subscribe and enjoy our best movies and many more click on the link blow to subscribe
<strong><a href="jpayment">Subscribe Now</a></strong>
						</div>
						<?php
					}elseif (isset($_GET['watchpaid'])) {
						$watchpaid = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['watchpaid']), ENT_QUOTES, 'UTF-8');
						?>
                 <div class ="alert alert-warning mt-3">
							Thank you for visiting our paid movies with 10 Ghana cedis you can enjoy any movie of your choice for one month,please in other to watch subscribe by clicking on the subscription link blow <strong><a href="jpayment" style="text-decoration: none; font-size: 25px;">Subscribe</a></strong><br>
							In other to watch our free movies click the link blow
							<strong><a href="free_videos">Free movies</a></strong>
						</div>

					<?php	
					}else{
                        header("Location:index.php");
					}
					
					
                ?>