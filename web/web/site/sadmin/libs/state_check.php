<? session_start();
if(@$_SESSION['LOG_STATE'] != TRUE && !isset($_GET['saveProductBasket']) && !isset($_GET['saveProductWishlist']) && !isset($_GET['saveProductComparelist']) && !isset($_GET['setStars']) && !isset($_GET['sortSet']) && !isset($_GET['changeBasketCount'])) {
	header("Refresh:1;URL=index.php");
	exit();
}
?>