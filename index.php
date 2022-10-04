<?php
session_start();
include_once('database/connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<style>
	.xoa_item_giohang:hover{
		cursor: pointer;
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
	
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header">
		<!--header-->
		<?php
		include_once('include/header.php');
		?>
		<!--/header-middle-->

		<?php
		if (isset($_GET['quanly'])) {
			$tam = $_GET['quanly'];
			if ($tam == 'product') {
				include_once('include/slider-product.php');
			} elseif ($tam == 'home') {
				include_once('include/slider-home.php');
			}
		} else
			include_once('include/slider-home.php');
		?>
	</header>
	<!--/header-->



	<section>
		<div class="container">
			<div class="row">
				<?php
				if (isset($_GET['quanly'])) {
					if (isset($_GET['id'])) {
						include_once("include/category-sidebar.php");
						include_once("include/product-details.php");
					} else {
						$tam = $_GET['quanly'];
						if ($tam == 'product') {
							include_once("include/category-sidebar.php");
							include_once("include/product.php");
						} elseif ($tam == 'home') {
							include_once("include/category-sidebar.php");
							include_once("include/home.php");
						} elseif ($tam == 'checkout') {

							include_once("include/checkout.php");
						} elseif ($tam == 'orders') {

							include_once("include/orders.php");
						} elseif ($tam == 'cart') {

							include_once("include/cart.php");
						} elseif ($tam == 'login') {

							include_once("include/login.php");
						} elseif ($tam == 'contact') {
							include_once("include/contact-us.php");
						} elseif ($tam == 'blog') {
							include_once("include/category-sidebar.php");
							include("include/blog.php");
						} elseif ($tam == 'blogsingle') {
							include_once("include/category-sidebar.php");
							include_once("include/blog-single.php");
						}
					}
				} else {
					require_once("include/category-sidebar.php");
					require_once("include/home.php");
				}
				?>



			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p> -->
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									
								</a>
								<!-- <p>Circle of Hands</p>
								<h2>24 DEC 2014</h2> -->
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									
								</a>
								<!-- <p>Circle of Hands</p>
								<h2>24 DEC 2014</h2> -->
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									
								</a>
								<!-- <p>Circle of Hands</p>
								<h2>24 DEC 2014</h2> -->
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									
								</a>
								<!-- <p>Circle of Hands</p>
								<h2>24 DEC 2014</h2> -->
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<!-- <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">© 2022 E-SHOPPER Inc. All rights reserved.</p>
					
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->


	<script src="js/jquery.js"></script>

	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
	<script src="js/script.js"></script>
	<script src="js/check-login.js"></script>
	<script src="js/search.js"></script>
	<script src="js/check-signup.js"></script>

</body>

</html>