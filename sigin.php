<?php
include("includes/head.php");
?>
<meta name="description" content="This is a movie website where you can watch any movie of your choice ">
<meta name="keywords" content="Movies,Tvseries,action movies,trailer,cartoon,telenovela,drama,hollywood,ghallywood,nollywood,bollywood">
<meta name="author" content="JAXINN">
<title>JAXINN FILMS PRODUCTION LOGIN PAGE</title>
</head>
<body oncontextmenu="return false">
<?php
include("layout/navbar.php");
?>
<?php
$error='';
if (isset($_POST['login'])) {
	include("db/db.php");
	$email = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['email']), ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars (mysqli_real_escape_string($conn,$_POST['password']), ENT_QUOTES, 'UTF-8');
	if (empty($email)) {
	$error='<div class="btn btn-danger">Email is empty!';
	}
	//elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	//$error='<div class="error">Please enter valid email.</div>';
	//}
	elseif (empty($password)) {
		$error='<div class="btn btn-danger">Password is empty!';
		
	}
	else{
    $sql = "SELECT * FROM register WHERE email=? OR username=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    	header("location:sigin");
    	$error='<div class="btn btn-danger">An error occurred! try again';

    	
    }
    else{
    	mysqli_stmt_bind_param($stmt, "ss", $email, $email);
    	mysqli_stmt_execute($stmt);
    	$result = mysqli_stmt_get_result($stmt);
    	if ($row = mysqli_fetch_assoc($result)) {
    		$pwdcheck = password_verify($password, $row['password']);
    		if ($pwdcheck == false) {
    			
    			 $error='<div class="btn btn-danger">Wrong password!';
    	
    		}
    		elseif ($pwdcheck == true) {
    			session_start();
    			$_SESSION['id'] = $row['id'];
    			$_SESSION['username'] = $row['username'];
    			$_SESSION['first_name'] = $row['first_name'];
				 $_SESSION['email'] = $row['email'];
    			$error='<div class="btn btn-danger">Login successfully!';
    			header('location:index');
    
    		}
    		else{
    		
    			$error='<div class="btn btn-danger">Wrong password!';
    	
    		}
    	}
    	else{
    		header("location:sigin");
    		$error='<div class="btn btn-danger">No user!';
    	
    	}
    }
	}

}

?>
<div class="container mt-3  text-center">
<h1 class="login text-center bg-secondary">Login</h1>
<h4><?php echo $error;?></h4>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 mr-4">
<form class="form text-center" action="" method="post">
<div class="form-group">
<label for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="Email" placeholder="Email......">
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" placeholder="Password.....">
</div>
<div class="form-group text-center">
<label for="checkbox">Remember me</label><br>
<input type="checkbox" name="">
</div>
<div class="form-group">
<input type="submit" class="form-control bg-success" name="login" style="color: white; font-size: 20px;">
</div>
<div class="form-group text-center">

<a href="reset_password?resetemail" style="text-decoration: none;color: black;font-size: 20px;">Forgot Password</a>
</div>
</div>
</div>
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

<div class="container-fluid">
<?php include("layout/footer.php");?>

</div>