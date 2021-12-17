<?php
include("includes/head.php");
?>
<title>JAXINN FILMS PRODUCTION</title>
<meta name="author" content="JAXINN">
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>


<?php
$msg='';
include("db/db.php");
if (isset($_GET['email']) && isset($_GET['token'])) {
$email = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['email']), ENT_QUOTES, 'UTF-8');
$token = htmlspecialchars (mysqli_real_escape_string($conn,$_GET['token']), ENT_QUOTES, 'UTF-8');

$sql ="SELECT id FROM register WHERE email=? AND token=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('ss', $email, $token);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
			?>
	

<?php
         include("db/db.php");
          if (isset($_POST['submit'])) {
          	
          	$token = $_GET['token'];
          	$email = $_GET['email'];
          	$newpassword = $_POST['newpassword'];
          	$cpassword = $_POST['cpassword'];
          	if (empty($newpassword)) {
          		echo "password is empty!";
          	}
          	elseif (empty($cpassword)) {
          		echo "Confirm password is empty!";
          	}
          	elseif ($newpassword != $cpassword) {
          		echo "Password does not match!";
          
          	}
          	else{

        $sql ="SELECT * FROM register WHERE email=? AND token=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('ss', $email, $token);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
		$newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
		$sql ="UPDATE register SET password = '$newpassword', token=''  WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
		//header("location:sigin.php");
		$msg = "Password changed successfully, you can login.";
		}else{
			$msg = "There was an error!..";
		}

		}

		}
             
          	//}

          }
       
         ?>
         <div class="container">
         <div class="text-center" style="letter-spacing: 2px;background: green; color: white; font-size: 20px;"><?php echo $msg;?></div>
         <form action="" method="post">
         <div class="form-group">
         <label></label>
         <input class="form-control" type="hidden" name="email" value="<?php echo $email;?>">
         <div class="form-group">
         <label>Enter a new password</label>
         <input class="form-control" type="password" name="newpassword" placeholder="Enter your new password....">
     </div>
     <div class="form-group">
         <label>Confirm password</label>
         <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password....">
     </div>
     <div class="form-group">
     <input class="form-control" type="submit" name="submit" value="Submit" style="background: green;font-size: 20px;letter-spacing: 2px;color: white;">
 </div>
         </form>


<?php
	}else{
		echo "Please check your link!";
	}
}else{
	header("Location:sigin");
}

?>


<div class="container-fluid">
<?php include("layout/footer.php");?>

</div>