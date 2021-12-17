<?php
include("includes/head.php");
?>
<meta name="description" content="Jaxinn films production is one of the best film maker in Ghana that focuse on files production with many actors and actresses from Ghana and Nigeria in just to metion few,news broadcast,event handler etc">
<meta name="keywords" content="Movies,Tvseries,action movies,free movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION CONTACT US</title>
</head>
<body>
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

if ($_SERVER["REQUEST_METHOD"]== "POST") {
$name = htmlspecialchars(stripslashes(trim($_POST['name'])));
$subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
$email = htmlspecialchars(stripslashes(trim($_POST['email'])));
$phone = htmlspecialchars(stripslashes(trim($_POST['phone'])));
$message = htmlspecialchars(stripslashes(trim($_POST['message'])));
if (empty($name)) {
	$msg = "Enter your name!..";
}elseif (!preg_match("/^[A-Za-z .'-]+$/", $name)) {
	$msg = "invalid Name!..";
}
elseif (empty($subject)) {
	$msg = "Subject is empty!..";
}elseif (!preg_match("/^[A-Za-z .'-]+$/", $subject)) {
	$msg = "Invalid Subject!..";
}
elseif (empty($email)) {
	$msg = "Your email please!..";
}elseif (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)) {
	$msg = "Invalid email please!..";
}
elseif (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
	$msg = "Enter a valid email!..";
}elseif (empty($phone)) {
	$msg = "Your phone number please!..";
}elseif (empty($message)) {
	$msg = "Your message please!..";
}else{

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
 $mail->Username = "jaxinn@jaxinnfilmsproduction.com";
//set gmail password
$mail->Password = "WonderfulJesus@great1111";
$mail->setFrom($email,$name);
$mail->addAddress('jaxinn@jaxinnfilmsproduction.com');
$mail->addReplyTo($email);
//$mail->isSMTP(true);
$mail->Subject = $subject;
$mail->Body = $name ."\r\n";
$mail->Body .= $email ."\r\n";
$mail->Body .= $phone ."\r\n";
$mail->Body .= $message;
if (!$mail->send()) {
	$msg = "Something went wrong! please try again later";
}else{
	$msg = "Sent successfully";
}
}
}
?>
<div class="container text-center">
<div class="row justify-content-center">
<div class="col-lg-5 bg-secondary rounded mt-4">
<h5 class="text-center text-light p-3">Send Us An Email</h5>
<div style="font-size:20px; color:white; "><?= $msg; ?></div>
<form action="" method="post" class="px pb-2">
<div class="form-group">
<label style="font-size: 20px;">Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter Name....." required>
</div>
<div class="form-group">
<label style="font-size: 20px;">Subject</label>
<input type="text" name="subject" class="form-control" placeholder="Enter Message title" required>
</div>
<div class="form-group">
<label style="font-size: 20px;">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter Email....." required>
</div>
<div class="form-group">
<label style="font-size: 20px;">Phone Number</label>
<input type="number" name="phone" class="form-control" placeholder="Enter Number..." required>
</div>
<div class="form-group">
<label style="font-size: 20px;">Message</label>
<textarea class="form-control" name="message" placeholder="Whrite Your Message....."></textarea>
</div>
<div class="form-group">
<input type="submit" name="submit" class="form-control" value="Submit" style="background: green;font-size: 20px;color: white;">
</div>
</form>
</div>
</div>
</div>


<div class="container-fluid mt-4">
<?php include("layout/footer.php");?>
</div>