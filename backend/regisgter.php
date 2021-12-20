<?php include("includes/head.php");
include("includes/nav.php");?>
<?php
if (isset($_POST['submit'])) {
	$first_name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['first_name']), ENT_QUOTES, 'UTF-8');
	$last_name =htmlspecialchars (mysqli_real_escape_string($conn,$_POST['last_name']), ENT_QUOTES, 'UTF-8');
	$adminusername = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['adminusername']), ENT_QUOTES, 'UTF-8');
	$adminemail = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['adminemail']), ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['password']), ENT_QUOTES, 'UTF-8');
	$cpassword = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['cpassword']), ENT_QUOTES, 'UTF-8');
   if (empty($first_name)) {
   	$error='<div class="btn btn-danger">Please first name is empty!';
   }
   elseif (empty($last_name)) {
   $error='<div class="btn btn-danger">Please last name is empty!';
   }
	elseif (empty($adminusername)) {
		$error='<div class="btn btn-danger">Please name is empty!';
	}
	elseif (empty($adminemail)) {
		$error='<div class="btn btn-danger">Please Your email!';
	}
	elseif (empty($password)) {
		$error='<div class="btn btn-danger">Please Your password!';
	}
	elseif (empty($cpassword)) {
		$error='<div class="btn btn-danger">Please Your Confirm your password!';
	}
	
	elseif ($password != $cpassword) {
		$error='<div class="btn btn-danger">Your Passwords do not Match!';
	}
	else{
		$sql ="SELECT * FROM adminsregister WHERE adminemail=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('s', $adminemail);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
		$error='<div class="btn btn-danger">Email already exist!';
		}
		else{
		$sql ="SELECT * FROM adminsregister WHERE adminusername=?";
		$stmt =$conn->prepare($sql);
		$stmt-> bind_param('s', $adminusername);
		$stmt-> execute();
		$result = $stmt-> get_result();
		$count = $result->num_rows;
		$stmt->close();

		if($count>0){
		$error='<div class="btn btn-danger">User name already exist!';
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO adminsregister (first_name, last_name, adminusername, adminemail, password)VALUES (?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt-> bind_param('sssss', $first_name, $last_name, $adminusername, $adminemail, $password);
			if ($stmt->execute()) {
			
			header('location:login.php');
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
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
  <h4><?php// echo $error;?></h4>
<form class="login-form ml-5" action="" method="post">

<div class="form-group">
<label>First Name</label>
<input class="form-control" type="text" name="first_name" placeholder="First Name" autocomplete="off">
</div>
<div class="form-group">
<label>Last Name</label>
<input class="form-control" type="text" name="last_name" placeholder="Last Name" autocomplete="off">
</div>

<div class="form-group">
<label>User Name</label>
<input class="form-control" type="text" name="adminusername" placeholder="Your user Name" autocomplete="off">
</div>

<div class="form-group">
<label>Email</label>
<input class="form-control" type="email" name="adminemail" placeholder="Your Email" autocomplete="off">
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" placeholder="Your user Name" autocomplete="off">
</div>

<div class="form-group">
<label>Confirm Password</label>
<input class="form-control" type="password" name="cpassword" placeholder="Confirm password" autocomplete="off">
</div>

<div class="form-group">
<button type="submit" name="submit" class="btn mt-3 btn-cutom btn-primary text-uppercase btn-block rounded-pill btn-lg">Register</button>
</div>

</form>

</div>
</div>
</div>
<style type="text/css">
	.form-control{
	font-style: 20px;
	min-height: 50px;
}
.form-control:focus{
border-color: #723dbe;
box-shadow: 0 0 0 0.2rem rgba(114,61,190,.25);
}
.form-group label{
	font-size: 20px;
}
.login{
	color: white;
	text-transform: uppercase;
}
</style>
