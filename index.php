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

?>

<!DOCTYPE html>
<html lang="zxx">
	<head>
	  <?php include 'includes/header.php';?>  
	</head>
	
	<body class="blue-skin">
		<!-- Main wrapper Starts -->
		<div id="main-wrapper">
			<!-- Top header  -->
			<!-- Start Navigation -->
			<?php include 'includes/navigation.php'; ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- End of Top header  -->
			
			<!--  Hero Banner  Start -->
			<div class="image-cover hero-banner" style="background:url(assets/img/banner-main.jpg) no-repeat;" data-overlay="6">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
						
							<h1 class="big-header-capt capti">WANT TO BUY VEHICLES?<br> BID now and get the best price</h1>
							<div class="full-search-2 Reveal-search Reveal-search-radius box-style">
								<div class="Reveal-search-content">
									
									<div class="row">
									
										<div class="col-lg-10 col-md-10 col-sm-12 br-left-p">
											
											<form class="" action="search.php" method="GET">
										     <div class="form-group">
												<div class="input-with-icon">
													<input type="text" name="s" id="s" class="form-control" placeholder="Keywords...">
													<i class="theme-cl ti-search"></i>
													<input type="submit" class="btn btn-primary">
												</div>
											</div>
										    </form>											
										</div>					
										
										
										
									</div>
									
								</div>
								
							</div>
							
						
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!--  Categories Start -->
			<?php include('includes/categoryScroll.php'); ?>
			<!-- Categories End -->

			<!-- Featured Exhibitors -->
			<?php include('includes/featured-products.php'); ?>
			<!-- Exhyibitors -->


			<!-- <div class="container">
			<div data-countdown="2023/01/01"></div>
<div data-countdown="2022/10/01"></div>
<div data-countdown="2018/01/01"></div>
<div data-countdown="2019/01/01"></div>
			</div> -->


			<!-- Featured Exhibitors -->
			<?php include('includes/featured-exhibitors.php'); ?>
			<!-- Exhyibitors -->
			

			<!-- FeaturedCategories -->
			<?php include('includes/featuredCategoriesGrid.php'); ?>
			<!-- ./FeaturedCategopories -->
			
			
			
			
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
		<script src="assets/js/auction.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

		<script src="assets/js/jquery.countdown.min.js"></script>


		<!-- Single Instance -->
		<script>
			$('[data-countdown]').each(function() {
				var $this = $(this), finalDate = $(this).data('countdown');
				$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%D days %H:%M:%S'));
				});
			});
		</script>
		<!-- Single Instance -->



	</body>
</html>