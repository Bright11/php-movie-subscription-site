<?php 
session_start();
include("db/db.php");
if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>

<?php include("includes/head.php");
include("includes/nav.php");?>
<div class="container">
<div class="row">
<?php include("layout/sidebar.php");?>
<!--sidebar-->

<?php include("layout/admin_maincontent.php");?>

</div>
</div>


<?php include("layout/footer.php");?>

