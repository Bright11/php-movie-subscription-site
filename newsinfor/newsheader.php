<nav class="navbar mynavenews navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarnews" aria-controls="avbarnews" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarnews">
    <ul class="navbar-nav ">
	<li class="nav-item">
<a class="nav-link" href="latestnews">News</a>
</li>
<?php
include("db/db.php");
$sql="SELECT * FROM news_categories";
$run=$conn->query($sql);
if ($run->num_rows>0) {
while ($category=$run->fetch_assoc()) {
  ?>
<li class="nav-item">
<a class="nav-link" href="newscategory?news=<?php echo $category['newscat_id'];?>"><?php echo $category['newscat_title'];?></a>
</li>
<?php
}
}else{
  ?>
<!--h4>Coming soon</h4-->
<?php
}
?>
  </ul>
  </div>
</nav>
<style type="text/css">
  .mynavenews ul li a{
letter-spacing: 1px;
  color: black !important;
  font-size: 20px;
font-weight: 30px;
}
</style>