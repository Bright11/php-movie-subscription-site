<?php include("head.php");
//session_start();
?>
<nav class="navbar mynave navbar-expand-lg navbar-light bg-light mb-3" style="background:  #3cbc8d !important;">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarnews" aria-controls="avbarnews" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarnews">
    <ul class="navbar-nav ">
<li class="nav-item">
 <a class="nav-link form-control" href="index.php?news">Insert News
    </a>
</li>
<li class="nav-item">
<a class="nav-link form-control" href="index.php?view_news">View News
    </a>
</li>
<li class="nav-item">
<a class="nav-link form-control" href="index.php?view_about">View About Us
    </a>
</li>
<li class="nav-item">
<a class="nav-link form-control" href="index.php?newscat">News Category
    </a>
</li>
		<li class="nav-item">
<a class="nav-link form-control" href="index.php">Home
    </a>
</li>
<?php
if (isset($_SESSION['adminusername'])) {
  ?>
  <li class="nav-item">
<a class="nav-link form-control" href="logout.php">Logout
    </a>
</li>
  <?php
}else{
  ?>
  <li class="nav-item">
<a class="nav-link form-control" href="login.php">Login
    </a>
</li>
<?php
}
?>
  </ul>
  </div>

</nav>



<?php include("functions/function.php");?>