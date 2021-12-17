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
<style type="text/css">
	.pay{
		margin-left: 50%;
		margin-right: 50%;
	}

</style>
<?php
if (isset($_SESSION['username'])) {
$email = htmlspecialchars (mysqli_real_escape_string($conn,$_SESSION['username']), ENT_QUOTES, 'UTF-8');
$sql = "SELECT * FROM register WHERE username='$email'";
$run = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($run);

}else{
  header('Location:sigin');

}
?>

<div class="pay mt-4">
<div>
	<html class="fonts">
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
			<style type="text/css">.fonts{font-size: 12.5px;}.ipay-btn{background-color: #04448C;border-color: #04448C;border-radius: 17px !important;}.modal{width: 27% !important;}.modal-header{padding-left:48px !important;padding-right: 48px !important;border-bottom: none !important;text-align: center !important;}.modal-footer{height: 120px;padding-left:48px !important;padding-right: 48px !important;margin-bottom: -17px !important;border-top: none !important;}.modal-body{margin-bottom: -25px;padding-right: 48px !important;padding-left: 48px !important;border-bottom: none !important;margin-top: -27px;}#close:hover{text-decoration: none !important;}.logo{width: 65px;height: 65px;}</style>
		</head>
		<body>
			<div class="container">
				<div class="row">
						<!--div class="col-lg-3 col-md-3 col-xs-3 col-sm-5"-->
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<div class="input-group-prepend">
							<button type="button" class="btn btn-primary ipay-btn" data-toggle="modal" data-target="#ipayModal">Make Payment</button>
						</div>
					</div>
				</div>
				<div id="ipayModal" class="modal fade m-auto" role="dialog" data-keyboard="true" data-backdrop="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<img src="https://payments2.ipaygh.com/app/webroot/img/LOGO-MER04604.jpeg" class="mx-auto d-block logo">
							</div>
							<form action="https://manage.ipaygh.com/gateway/checkout" id="ipay_checkout" method="post" name="ipay_checkout" target="_blank">
								<div class="modal-body">
									<legend class="text-center mt-1 ">Make Payment</legend>
									<input name="merchant_key" type="hidden" value="you key.....">
									<input id="merchant_code" type="hidden" value="........">
									<input name="source" type="hidden" value="WIDGET">
									<input name="success_url" type="hidden" value="https://www.jaxinnfilmsproduction.com/jsuccessp?jxpaycomplete=<?php echo $result['invoice_id'];?>">
									<input name="cancelled_url" type="hidden" value="https://www.jaxinnfilmsproduction.com/payment_canceled?canceled=<?php echo $result['email'];?>">
									<input id="invoice_id" name="invoice_id" type="hidden" value="<?php echo $result['invoice_id'];?>">
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="text" title="Name" name="extra_name" id="name" class="form-control" placeholder="First & Last Name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="tel" title="Mobile Number" name="extra_mobile" id="number" class="form-control" maxlength="10" placeholder="Contact Number">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="email" name="email" id="extra_email" class="form-control" value="<?php echo $result['email'];?>" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input type="text" name="total" class="form-control" id="total" value="10" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<div class="form-group input-group">
												<input class="form-control" type="text" name="description" id="description" placeholder="Description of Payment">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg">
											<button type="submit" class="btn btn-primary ipay-btn btn-block" style="padding: 8px 11px;"><strong>Pay</strong></button>
										</div>
									</div>
									<div class="row">
										<div class="col-lg text-center mt-2">
											<a href="" data-dismiss="modal" id="close">Cancel</a>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-center ">
									<div class="row">
										<div class="col-lg">
											<img src="https://payments.ipaygh.com/app/webroot/img/iPay_payments.png" style="width: 100%;" class="img-fluid mr-auto" alt="Powered by iPay">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
			<script type="text/javascript">(function(){Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();})();</script>
		</body>
	</html>
</div>


</div>

<h4 class="text-center mt-2" style="font-size: 20px; text-transform: uppercase;">click On the above link to subscribe</h4>
<div class="container-fluid text-center mt-3">
<h4 class="payment text-center bg-secondary" style="font-size: 30px; color: white;">Welcome to Jaxinn payment subscription page</h4>

<h3 class="text-center"><u>Information on payment</u></h3>
<h6 style="font-size: 20px;">Dear valued costumer thank you for visiting our site. In jaxinn Films Production, your happiness and security is our concerned.</h6>
<h1 class="text-center">Payment options</h1>
<p style="font-size: 20px;">You can pay with any mobile money of your choice, when click on the above link in other to make a payment. After the completion of payment, the sum of ten Ghana Cedi (10 Ghana Cedi) will be deducted from your mobile money account, understand that Jaxinn Films Production doesn't hold any information concerning your mobile money account so feel free for you are secured and safe.</p>
<p style="font-size: 20px;">After making payment, you can watch any movie of your choice, also remember that your subscription will expire after 30 days which you can now renew.</p>
<h2 class="text-center">Thank you</h2>

</div>

<div class="container-fluid">
<?php include("layout/footer.php");?>

</div>