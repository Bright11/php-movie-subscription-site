<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="description" content="This is a movie website where you can watch any movie of your choice ">
<meta name="keywords" content="Movies,Tvseries,action movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="Bright C Web developer">
<title>JAXINN FILMS PRODUCTION</title>
<link rel="stylesheet" type="text/css" href="css/new.css">
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="icon" type="image/gif" sizes="16x16" href="sponsorimg/Jaxinn.jpg">
<link rel="stylesheet" type="text/css" href="css/slid.css">
<link rel="stylesheet" type="text/css" href="css/watch.css">
<link rel="stylesheet" type="text/css" href="css/image.css">
<script src="https://kit.fontawesome.com/0560d0caf7.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script
>
<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="css/owlcarousel/jquery.min.js"></script>
<script src="css/owlcarousel/owl.carousel.js"></script>
<script src="css/owlcarousel/owl.carousel.min.js"></script>

</head>
<body >
<?php
$error='';
//oncontextmenu="return false"
//session_start();
//include("includes/head.php");
include("layout/navbar.php");
?>

<?php
include("db/db.php");
if (isset($_GET['jxpaycomplete'])) {
$invoice_id=htmlspecialchars (mysqli_real_escape_string($conn,$_GET['jxpaycomplete']), ENT_QUOTES, 'UTF-8');
$stmt=$conn->prepare("SELECT * FROM register WHERE invoice_id=?");
$stmt->bind_param("s", $invoice_id);
$stmt->execute();
$result= $stmt->get_result();
if ($result->num_rows>0) {
    
  while ($check= $result->fetch_assoc()) {
?>

<div class="container">
<form method="post">
<input type="hidden" name="username" value="<?php echo $check['username'];?>"><br>
<input type="hidden" name="email" value="<?php echo $check['email'];?>">
<br>
<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" ><br>
<div class="form-group">
<input class="form-control bg-success" type="submit" name="payment_s" value="Click here to Complete your membership sebscription" style="color: white; font-size: 20px;">
</div>
</form>
<div class="col-md-4 text-center">
<div class="text-center"><?php echo $error;?></div> <br>
<p style="font-size: 20px;">
Thanks for subscribing on our website, please click on the link above to complete your payment subscription
</p>
</div>
</div>

<?php
}
}else{
	echo "noo";

}

}
?>

<?php

if (isset($_POST['payment_s'])) {
$username=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['username']), ENT_QUOTES, 'UTF-8');
$email=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['email']), ENT_QUOTES, 'UTF-8');
$date=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['date']), ENT_QUOTES, 'UTF-8');

if (empty($username)) {
	echo "Error";
}
elseif (empty($email)) {
	echo "Error";
}else{
//	$sql ="SELECT * FROM register WHERE email='$email' ";
	$sql ="SELECT * FROM register WHERE email=? AND invoice_id=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('ss', $email, $invoice_id);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();
  
		if($count>0){

$sql="UPDATE register SET date='$date',  member=1 WHERE email='$email'";


		if ($conn->query($sql)>0) {
			$str = "gftywbikamnvcsxzoplJGFcqsza";

			$str = str_shuffle($str);
			$str = substr($str, 10);
$sql="UPDATE register SET invoice_id='$str' WHERE email='$email'";
		
		if ($conn->query($sql)>0) {
			header("Location:sigin?Success");
		$error='<div class="btn btn-success">You have successfully subscribe.';
		}else{
			echo "There wes an error";
		}
	}else{
		header("Location:index?stopit");
	}
}


}
	}
?>