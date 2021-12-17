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
$msg='';
//include require phpmailer files
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include("db/db.php");
if (isset($_POST['forgorpass'])) {
	$email = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['email']), ENT_QUOTES, 'UTF-8');
	//$uusername = $_POST['uusername'];
	if (empty($email)) {
		$msg='<div class="error bg-danger text-center>Email is empty!</div>';
	}elseif (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
	$msg='<div class="error bg-danger text-center>Email is not valid!</div>';
	}else{
		$sql ="SELECT id FROM register WHERE email=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('s', $email);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
		
     $str = "012345678919gwertzuiopklgfjhaxzbrm";

		$str = str_shuffle($str);
		$str = substr($str, 0, 10);
        //$url = "https://www.jaxinnfilmsproduction.com/input_resetp?token=$str&email=$email";
        $url = "";

//create instances of phpmailer
$mail = new PHPMailer();
//set mailer to use smtp
 $mail->isSMTP();
//define smtp host
$mail->Host  = "jaxinnfilmsproduction.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
//set type of encryption (ssl/tls)
$mail->SMTPSecure = "ssl";
//set port to connect smtp 587
$mail->Port = '465';
//set gmail username
 $mail->Username = "your email";
//set gmail password
$mail->Password = "password";
$mail->setFrom("email", "Jaxinn Films Production");

 
  $mail->addAddress ($email);

  $mail->isHTML(true);

$mail->Subject = "Reset Password";
$mail->Body = 'Reset your Password, To reset your password, please click on this link below or copy and past it on your browser.'."\r\n";
$mail->Body .= $url;
//$mail->Body .= $url;
if (!$mail->send()) {
	$msg = "Something went wrong! please try again later";

}else{
	$msg = "An email has being sent to you, follow the instruction and reset your password!.";
	//echo $url;

       $sql ="UPDATE register SET token='$str' WHERE email='$email'";
       $result = mysqli_query($conn, $sql);
      
	}
	
	}else{
	$msg = "User email not found";
	}
}

}
?>
<h2 class="text-center" style="letter-spacing: 2px;">Reset your password</h2>
<div class="text-center" style="letter-spacing: 2px;background: green; color: white; font-size: 20px;"><?php echo $msg;?></div>
<div class="container">
<form action="" method="post">
<div class="form-group">
<label>Enter your email</label>
<input class="form-control" type="email" name="email">
</div>
<div class="form-group">
<button class="form-control" type="submit" name="forgorpass" style="background: #3cbc8d; color: white;font-size: 20px;">Submit</button>
</div>
</form>
</div>
<div class="container-fluid">
<?php include("layout/footer.php");?>

</div>