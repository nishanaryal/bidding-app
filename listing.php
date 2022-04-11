<?php

session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$orgSlug = (string)$_GET['name'];
$exhibitorID;
//$queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");
$featuredExhibitors = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE slug = '$orgSlug'");

$featuredProducts = mysqli_query($mysqli,"SELECT * FROM products WHERE exhibitorid = 1");
?>


<!DOCTYPE html>
<html lang="en-GB">
<head>
	<?php include 'includes/header.php';?>  

	<link rel="stylesheet" type="text/css" href="assets/css/custom-style.css">
	
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

		<?php while($featuredExhibitor = mysqli_fetch_array($featuredExhibitors))
		{ ?>	
			<!-- Start Banner  -->
			<section class="page-title-banner" id="exhibitorBanner" style="/*background-image:url(assets/img/banner-3.jpg)*/;padding:10px;background:radial-gradient(circle at center, #273240 , #fafafa)">
				<div class="container">
					<div class="row m-0 align-items-end detail-swap">
						<div class="tr-list-wrap">
							<!-- Begin  Content -->
							<div class="layered-image">
								<img class="image-exhibitor" src="upload/logo/<?php echo $featuredExhibitor['profile_logo']; ?>" alt="<?php echo $featuredExhibitor['orgname']; ?>" title="<?php echo $featuredExhibitor['orgname']; ?>" />
								<img class="image-base" src="upload/cover/<?php echo $featuredExhibitor['profile_coverImg']; ?>" alt="<?php echo $featuredExhibitor['orgname']; ?>" title="<?php echo $featuredExhibitor['orgname']; ?>"/>
								<img class="image-overlay" src="assets/img/booth.png" alt="<?php echo $featuredExhibitor['orgname']; ?>" />
							</div>


						</div>
					</div>
				</div>
			</section>
			<!--  End Banner -->
			
			<!-- Property Detail Start  -->
			<section class="gray">
				<div class="container">
					<div class="row">
						
						<!-- property main detail -->
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<!-- Single Block Wrap -->
							<div class="Reveal-block-wrap">
								<div class="Reveal-block-header">
									<h1 class="text-center"><?php echo $featuredExhibitor['orgname']; ?></h1>
									<h4 class="text-center"><?php echo $featuredExhibitor['quote']; ?></h4>
								</div>
								
								<div class="Reveal-block-body">
									<?php echo $featuredExhibitor['description']; ?>
								</div>
							</div>
							
							<hr>

							<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="sec-heading center">
											<h3><?php echo $featuredExhibitor['orgname']; ?> <span class="theme-cl"> PRODUCTS </span></h3>
										</div>
									</div>
								</div>


							<!-- FeaturedProducts -->
							<div class="row">
								<!--  Single Listing -->
								<?php while($featuredProduct = mysqli_fetch_array($featuredProducts))
								{ ?>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="Reveal-verticle-list listing-shot">
											<?php if($featuredProduct['isFeatured'] == 1) { ?>
												<div class="listing-badge now-open">Featured</div>
											<?php } ?>


											<div class="Reveal-signle-item">
												<a class="listing-item" href="products.php?name=<?php echo $featuredProduct['slug']; ?>&bid=<?php echo $featuredProduct['productid']; ?>">
													<div class="listing-items">
														<div class="listing-shot-img">
															<img src="upload/products/<?php echo $featuredProduct['photo']; ?>" class="img-responsive" alt="" />
														</div>
													</div>
												</a>
												<div class="Reveal-verticle-listing-caption">
													<a href="products.php?name=<?php echo $featuredProduct['slug']; ?>&bid=<?php echo $featuredProduct['productid']; ?>" class="like-listing"></a>
													<div class="Reveal-listing-shot-caption">
														<h4><a href="products.php?name=<?php echo $featuredProduct['slug']; ?>&bid=<?php echo $featuredProduct['productid']; ?>"><?php echo $featuredProduct['name']; ?></a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>
														
														<p class="Reveal-short-descr"><?php echo substr($featuredExhibitor['shortdescription'], 0, 160); ?></p>
														
													</div>
												</div>
											</div>
										</div>
									</div>	
									<?php
								} ?>		
							</div>
							<!-- FeaturedProducts -->

							<!-- FeaturedCategories -->
							<?php include('includes/featuredCategoriesGrid.php'); ?>
							<!-- ./FeaturedCategopories -->

							
							
						</div>

						
					</div>
				</div>
			</section>
			<!-- Property Detail End -->
			<?php
		} ?>


		


		<!--  Footer Start ==== -->
		<?php include('includes/footer.php'); ?>
		<!-- == Footer End === -->

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