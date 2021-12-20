<div class="col-md-3" id="sidebar">
<ul class="navbar-nav">
	
  <li class="nav-item">
      <a class="nav-link form-control" href="index.php">Home</a>
    </li>
     <li class="nav-item">
      <a class="nav-link form-control" href="index.php?read">Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?category">Category</a>
    </li>
 
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?product">Insert movies</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?country">Country</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?howitworks">How the site works</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?view_movies">View Movies</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?gallery">Insert Gallery</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link  form-control" href="index.php?partner">Insert Partners</a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?free">Free Videos
    </a></li>
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?subscribers">Subscribers
    </a></li>
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?freecat">Free Category
    </a></li>
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?about">Insert AboutUs
    </a></li>
    <li class="nav-item">
      <a class="nav-link form-control" href="index.php?freeimage">Insert Free Images
    </a></li>
	 <li class="nav-item">
      <a class="nav-link form-control" href="insert_songcat.php">Insert Song cart
    </a></li>
	<li class="nav-item">
      <a class="nav-link form-control" href="view_songcat.php">View Song Cart
    </a></li>
    <li class="nav-item">
      <a class="nav-link form-control" href="insert_songs.php">Insert Song
    </a></li>
    <li class="nav-item">
      <a class="nav-link form-control" href="view_songs.php">View Song
    </a></li>
    <?php
    if (isset($_SESSION['adminusername'])) {
  ?>
  <li class="nav-item">
      <a class="nav-link form-control" href="logout.php">Logout
    </a></li>
  <?php
}else{
  ?>
   <li class="nav-item">
      <a class="nav-link form-control" href="login.php">Login
    </a></li>
<?php
}
?>

  </ul>
</div>


