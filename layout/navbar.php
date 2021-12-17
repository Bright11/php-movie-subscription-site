<?php 
require_once("juserss.php");
//ob_flush();?>
<nav class="navbar mynave navbar-expand-lg navbar-light bg-light" style="background:  #3cbc8d !important;">
  <a class="navbar-brand" href="index" style="color: white;">Jaxinn Films Production</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto" style="color: white !important;">
      <li class="nav-item">
<a class="nav-link active" href="index">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="category">Categories</a>
</li>
<li class="nav-item">
<a class="nav-link" href="pictures">Our gallery</a>
</li>
<li class="nav-item">
<a class="nav-link" href="free_videos"><i class="fas fa-video"></i>&nbsp;Free Movies</a>
</li>
		<li class="nav-item">
<a class="nav-link" href="newsongs"><i class="fas fa-music"></i>&nbsp;songs</a>
</li>
<li class="nav-item">
<a class="nav-link" href="about">About Us</a>
</li>
<?php
if (isset($_SESSION['username'])) {
	?>
<li class="nav-item">
<a class="nav-link" href="logout"><i class="fas fa-unlock-alt"></i>&nbsp;Logout</a>
</li>
<?php
} 
else{
	?>
	<li class="nav-item">
<a class="nav-link" href="register"><i class="fas fa-lock"></i>&nbsp;Register</a>
</li>
<li class="nav-item">
<a class="nav-link" href="sigin"><i class="fas fa-unlock-alt"></i>&nbsp;Login</a>
</li>
<?php
}
?>
  </ul>
  </div>
</nav>
<?php include("searchresult.php");?>

<?php include("functions/function.php");?>
<?php include("free videos/free_function.php");?>
