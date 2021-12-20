<?php if (isset($_SESSION['adminusername'])) {
?>
<?php
}else{
  header('Location:login.php');
  exit();
}
?>
<div class="container" id="form">

      <?php insert_movie();?>
     
  <div id="result"><?php $message;?></div>

  


<style type="text/css">
#insertmovies{
	background: pink;
	border: 1px solid black;
	font-size: 20px;
}
</style>



