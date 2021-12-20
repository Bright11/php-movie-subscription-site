<div class="col-md-9" id="maincontent">
<div class="admin">
<?php
if (isset($_SESSION['adminusername'])) {
	?>
	<h3><?php echo "Welcome to administrators power house &nbsp;&nbsp;".$_SESSION['adminusername'];?></h3>
		<?php
	
	}
?>

</div>


<?php
if (isset($_GET['read'])) {
	include("instruction.php");
}
 if (isset($_GET['category'])) {
	include("insert_category.php");
}
if (isset($_GET['product'])) {
	include("insert_jmovies.php");
}
if (isset($_GET['country'])) {
	include("insert_country.php");
}
if (isset($_GET['howitworks'])) {
	include('how_it_works.php');
}
if (isset($_GET['view_movies'])) {
	include('view_movies.php');
}
if (isset($_GET['gallery'])) {
	include('insert_gallery.php');
}
if (isset($_GET['partner'])) {
	include('partners.php');
}
if (isset($_GET['free'])) {
	include('insert_free_v.php');
}
if (isset($_GET['about'])) {
	include('insert_about.php');
}
if (isset($_GET['subscribers'])) {
	include('subscribers.php');
}
if (isset($_GET['freecat'])) {
	include('insert_freecategory.php');
}
if (isset($_GET['news'])) {
	include('insert_news.php');
}
if (isset($_GET['view_news'])) {
	include('view_news.php');
}
if (isset($_GET['newscat'])) {
	include('insert_newscategory.php');
}
if (isset($_GET['view_about'])) {
	include('view_aboutus.php');
}
if (isset($_GET['freeimage'])) {
	include('insert_freeimages.php');
}
?>
</div>



