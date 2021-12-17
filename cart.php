<?php
include("includes/head.php");
include("layout/navbar.php");
?>
<div class="container-fluid mt-3">
<?php include("includes/slide.php");
include("ip/user_ip.php");
include("cartitems/deletecart.php");
?>
</div>
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
<div class="container" style="margin-top: 80px;">
 <?php
include("db/db.php");
 $stmt = $conn->prepare("SELECT * FROM cart WHERE user_ip=?");
  $stmt->bind_param("s",$ip);
  $stmt->execute();
  $stmt->store_result();
 $count = $stmt->num_rows;
  //echo $count;
  if ($count>0) {
 ?>
<html class="fonts">
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <style type="text/css">.fonts{font-size: 12.5px;}.ipay-btn{background-color: #04448C;border-color: #04448C;border-radius: 17px !important;}.modal{width: 27% !important;}.modal-header{padding-left:48px !important;padding-right: 48px !important;border-bottom: none !important;text-align: center !important;}.modal-footer{height: 120px;padding-left:48px !important;padding-right: 48px !important;margin-bottom: -17px !important;border-top: none !important;}.modal-body{margin-bottom: -25px;padding-right: 48px !important;padding-left: 48px !important;border-bottom: none !important;margin-top: -27px;}#close:hover{text-decoration: none !important;}.logo{width: 65px;height: 65px;}</style>
    </head>
    <body>
      <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-5">
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
                  <input name="merchant_key" type="hidden" value="7def4eba-aa25-11ea-8b07-f23c9170642f">
                  <input id="merchant_code" type="hidden" value="TST000000004005">
                  <input name="source" type="hidden" value="WIDGET">
                  <input name="success_url" type="hidden" value="https://www.jaxinnfilmsproduction.com/download?jxpaycomplete=<?php echo $result['invoice_id'];?>">
                  <input name="cancelled_url" type="hidden" value="https://www.jaxinnfilmsproduction.com/verify_email?canceled">
                  <input id="invoice_id" name="invoice_id" type="hidden" value="">
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
                      
                       <input type="text" name="total" class="form-control" id="total" value="2" readonly>
                       
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
 <?php
    }else{
      ?>
  
  <?php
    }
  ?>
<div class="table-responsive mt-2">
<table class="table table-bordered table-striped text-center">
<thead>
    <tr>
<td colspan="7">
<?php
include("db/db.php");
 $stmt = $conn->prepare("SELECT * FROM cart WHERE user_ip=?");
  $stmt->bind_param("s",$ip);
  $stmt->execute();
  $stmt->store_result();
 $count = $stmt->num_rows;
  //echo $count;
  if ($count>0) {
 ?>
<h3 class="text-center text-info m-0">Your Cart Items</h3>
 <?php
    }else{
        ?>
  <h3 class="text-center text-info m-0">No items in your cart</h3>
  <?php
    }
  ?>

</td>
</tr>
<tr>
<th>ID</th>
<th>Name</th>
<th>Audio</th>
<th>Price</th>
<th>Total Price</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include("db/db.php");

$stmt = $conn->prepare("SELECT * FROM cart WHERE user_ip='$ip'");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows>0) {
while ($row = $result->fetch_assoc()) {
    ?>
<tr>
<td><?= $row['id'];?></td>
<td><?= $row['song_name'];?></td>
<td><audio controls controlsList="nodownload" >
  <!--source src="horse.ogg" type="audio/ogg"-->
  <source src="songs/<?= $row['audio'];?>" type="audio/wav">
  <source src="songs/<?= $row['audio'];?>" type="audio/ogg">
  <source src="songs/<?= $row['audio'];?>" type="audio/mpeg">
 Your browser dose not support this kind of files,update your browser...

</audio></td>
<td>Price &nbsp;GH₵ &nbsp;<?= $row['price'];?></td>
<td>Price &nbsp;GH₵ &nbsp;<?= $row['price'];?></td>

<td>
<a href="cartitems/deletecart.php?remove=<?= $row['id']?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this item?');" ><i class="fas fa-trash-alt"></i>Remove</a>
</td>
</form>
</tr>

<?php
}

}else{
  ?>
<tr>
  <td colspan="6">
<a href="newsongs" class="btn btn-info ">In order to download the song click to buy</a>
</td>
</tr>
<?php
}
?>

</tbody>
</table>
