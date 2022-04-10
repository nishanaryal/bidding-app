<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// $username = $_SESSION["email"];


// $username = $_SESSION["email"];
// global $mysqli;

// $queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");

$categoryID = intval($_GET['id']);

$categoryData = mysqli_query($mysqli,"SELECT * FROM categories WHERE categoryid = $categoryID");


$featuredExhibitors = mysqli_query($mysqli,"SELECT * FROM products WHERE categoryid = $categoryID");

// $row = mysqli_fetch_array($featuredExhibitors);

// $total = $row[0];


?>

<!DOCTYPE html>
<html lang="zxx">
	<head>
	  <?php include 'includes/header.php';?>  
	</head>
	
	<body class="blue-skin">
		<!-- Main wrapper -->
		<div id="main-wrapper">
		
			<!-- Top header  -->
		
			<!-- Start Navigation -->
			<?php include 'includes/navigation.php'; ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- Top header  -->
			
			<?php while($catData = mysqli_fetch_array($categoryData))
			{ ?>	
			<!--  Page Title Start -->
			<div class="image-cover page-title" style="background:url(upload/category/<?php echo $catData['featuredImage']; ?>) no-repeat;" data-overlay="6">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<h2 class="ipt-title"><?php echo $catData['displayTitle']; ?></h2>
							<span class="ipn-subtitle text-light"><?php echo $catData['shortDescription']; ?></span>
						</div>
					</div>
				</div>
			</div>
			<?php
			} ?>
			<!-- ============================ Page Title End ================================== -->

			<!-- =================== Sidebar Search ==================== -->
			<section class="gray">
				<div class="row">
					<div class="container">

						<div class="content-area">
							<div class="">
							
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="shorting-wrap">
										<h5 class="shorting-title">Showing all Records</h5>
										<div class="shorting-right">
											<label>Short By:</label>
											<div class="dropdown show">
												<a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="selection">Most Rated</span>
												</a>
												<div class="drp-select dropdown-menu">
													<a class="dropdown-item" href="JavaScript:Void(0);">Most Rated</a>
													<a class="dropdown-item" href="JavaScript:Void(0);">Most Viewd</a>
													<a class="dropdown-item" href="JavaScript:Void(0);">News Listings</a>
													<a class="dropdown-item" href="JavaScript:Void(0);">High Rated</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<!-- Single List Start -->
								<div class="row">
									<!--  Single Listing -->
									<?php while($featuredExhibitor = mysqli_fetch_array($featuredExhibitors))
									{ ?>
										<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="Reveal-verticle-list listing-shot">
										<?php if($featuredExhibitor['allowBidding'] == 'yes') { ?>
											<div class="listing-badge now-open">Verified</div>
										<?php } ?>
										
										
										<div class="Reveal-signle-item">
											<a class="listing-item" href="products.php?name=<?php echo $featuredExhibitor['slug']; ?>&bid=<?php echo $featuredExhibitor['productid']; ?>">
												<div class="listing-items">
													<div class="listing-shot-img">
														<img src="upload/products/<?php echo $featuredExhibitor['photo']; ?>" class="img-responsive" alt="" />
													</div>
												</div>
											</a>
											<div class="Reveal-verticle-listing-caption">
												<a href="products.php?name=<?php echo $featuredExhibitor['slug']; ?>&bid=<?php echo $featuredExhibitor['productid']; ?>" class="like-listing"><i class="ti-heart"></i></a>
												<div class="Reveal-listing-shot-caption">
													<h4><a href="products.php?name=<?php echo $featuredExhibitor['slug']; ?>&bid=<?php echo $featuredExhibitor['productid']; ?>"><?php echo $featuredExhibitor['name']; ?></a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>
													<span><i class="ti-location-pin text-success"></i><?php echo $featuredExhibitor['base_price']; ?></span>
													<p class="Reveal-short-descr"><?php echo $featuredExhibitor['shortdescription']; ?></p>
													
												</div>
											</div>
										</div>
									</div>
									</div>	
									<?php
									} ?>
									
								
								<!-- <div class="col-md-12 col-sm-12 mt-3">
									<div class="text-center">
										
										<div class="spinner-grow text-danger" role="status">
										  <span class="sr-only">Loading...</span>
										</div>
										<div class="spinner-grow text-warning" role="status">
										  <span class="sr-only">Loading...</span>
										</div>
										<div class="spinner-grow text-success" role="status">
										  <span class="sr-only">Loading...</span>
										</div>
										
									</div>
								</div> -->
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- =================== Sidebar Search ==================== -->

			
			<!--  Categories Start -->
			<?php include('includes/categoryScroll.php'); ?>
			<!-- Categories End -->

			

			<!-- FeaturedCategories -->
			<?php include('includes/featuredCategoriesGrid.php'); ?>
			<!-- ./FeaturedCategopories -->
			
			
			<!-- Call To Action Start -->
			<?php include('includes/call-to-action.php'); ?>
			<!-- Call To Action End -->
			
			<!-- ============================ Footer Start ==== -->
			<?php include('includes/footer.php'); ?>
			<!-- ============================ Footer End === -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Log <span class="theme-cl">In</span></h4>
							<div class="login-form">
								<form>
								
									<div class="form-group">
										<label>User Name</label>
										<div class="input-with-icon gray">
											<input type="text" class="form-control" placeholder="Username">
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-with-icon gray">
											<input type="password" class="form-control" placeholder="*******">
											<i class="ti-unlock"></i>
										</div>
									</div>
									
									<div class="form-group">
										<button type="submit" class="btn btn-md full-width pop-login">Login</button>
									</div>
								
								</form>
							</div>
							<div class="modal-divider"><span>Or login via</span></div>
							<div class="social-login mb-3">
								<ul>
									<li><a href="#" class="btn fb"><i class="ti-facebook"></i></a></li>
									<li><a href="#" class="btn google"><i class="ti-google"></i></a></li>
									<li><a href="#" class="btn twitter"><i class="ti-twitter"></i></a></li>
								</ul>
							</div>
							<div class="modat-foot">
								<div class="md-left">Have't Account? <a href="register.html" class="theme-cl">Sign Up</a></div>
								<div class="md-right"><a href="#" class="theme-cl">Forget Password?</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/rangeslider.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/slider-bg.js"></script>
		<script src="assets/js/lightbox.js"></script> 
		<script src="assets/js/imagesloaded.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/counterup.min.js"></script>
		 
		<script src="assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>

<!-- Mirrored from codeminifier.com/reveal-live/reveal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Jul 2021 10:35:29 GMT -->
</html>