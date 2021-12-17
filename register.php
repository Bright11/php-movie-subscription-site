<?php
include("includes/head.php");
?>
<meta name="description" content="This is a movie website where you can watch any movie of your choice,we have paid and free movies, educative,glorious and much more">
<meta name="keywords" content="Movies,Tvseries,action movies,free movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION SIGINUP PAGE</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>
<?php
$error= '';
require_once("db/db.php");
if (isset($_POST['submit'])) {
	$first_name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['first_name']), ENT_QUOTES, 'UTF-8');
	$username = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['username']), ENT_QUOTES, 'UTF-8');
	$email = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['email']), ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['password']), ENT_QUOTES, 'UTF-8');
	$cpassword = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['cpassword']), ENT_QUOTES, 'UTF-8');
	$gender = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['gender']), ENT_QUOTES, 'UTF-8');
   if (empty($first_name)) {
   	$error='<div class="btn btn-danger">Please first name is empty!';
   }
  
	elseif (empty($username)) {
		$error='<div class="btn btn-danger">Please name is empty!';
	}
	elseif (empty($email)) {
		$error='<div class="btn btn-danger">Please Your email!';
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	$error='<div class="error">Please enter valid email.</div>';
	}
	elseif (empty($password)) {
		$error='<div class="btn btn-danger">Please Your password!';
	}
	elseif (strlen($password)<5) {
		$error='<div class="btn btn-danger">Password must contain at least 5 characters.!';
	}
	elseif (empty($cpassword)) {
		$error='<div class="btn btn-danger">Please Your Confirm your password!';
	}
	elseif ($gender=='Select Gender') {
		$error='<div class="btn Select Genderbtn-danger">Please Your Gender!';
	}
	elseif ($password != $cpassword) {
		$error='<div class="btn btn-danger">Your Passwords do not Match!';
	}
	else{
		$sql ="SELECT * FROM register WHERE email=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('s', $email);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
		$error='<div class="btn btn-danger">Email already exist!';
		}
		else{
		$sql ="SELECT * FROM register WHERE username=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('s', $username);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
		$error='<div class="btn btn-danger">User name already exist!';
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
			$date = false;
			$member = false;
			$verified = false;
			$token = false;
			 $str = "gftywbikamnvcsxzoplJGFcqsza";

			$str = str_shuffle($str);
			$str = substr($str, 10);

			$sql = "INSERT INTO register (first_name, username, email, password, gender,date, member, verified, token, invoice_id)VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt-> bind_param('sssssdddss', $first_name, $username, $email, $password, $gender, $date, $member, $verified, $token, $str);
			if ($stmt->execute()) {
              
			header('location:sigin');
			exit();
			
			}else{
				$error='<div class="btn btn-danger">An error occur during registering try again.';
			}
		}
	}
}

}

?>
<div class="container mt-3">

<h1 class="login text-center bg-secondary">Register</h1>
<div class="text-center"><?php echo $error;?></div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
  <h4><?php// echo $error;?></h4>
<form class="login-forms ml-5" action="" method="post">

<div class="form-group">
<label>Full Name</label>
<input class="form-control" type="text" name="first_name" placeholder="First Name" autocomplete="off">
</div>
<div class="form-group">
<label>User Name</label>
<input class="form-control" type="text" name="username" placeholder="Your user Name" autocomplete="off">
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control" type="email" name="email" placeholder="Your Email" autocomplete="off">
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" placeholder="Your password" autocomplete="off">
</div>

<div class="form-group">
<label>Confirm Password</label>
<input class="form-control" type="password" name="cpassword" placeholder="Confirm password" autocomplete="off">
</div>

<div class="form-group">
<div class="box">
<select class="form-control  mb-3 rounded-pill form-control-lg" name="gender">
<option  value="Select">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>
</div>
<div class="form-group">
<button type="submit" name="submit" class="btn mt-3 btn-cutom btn-primary text-uppercase btn-block rounded-pill btn-lg">Register</button>
</div>
<p class="" align="center">Already a member</p>
<div class="member" align="center"><a href="sigin.php" style="text-decoration: none; font-size: 20px;">Login</a></div>
</form>

</div>
</div>
</div>
<br>



<?php include("layout/footer.php");?>