<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php include 'includes/header.php';?>  
</head>

<body class="blue-skin">
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div id="preloader"><div class="preloader"><span></span><span></span></div></div>

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
		
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->
		<!-- Start Navigation -->
		<?php include 'includes/navigation.php'; ?>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- Top header  -->


		<!-- ============================ Page Title Start================================== -->
		<div class="image-cover page-title" style="background:url(assets/img/banner-3.jpg) no-repeat;" data-overlay="6">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">

						<h2 class="ipt-title">Buying and selling made easy</h2>
						<span class="ipn-subtitle text-light">Kathmandu Automobiles Center is one of the go to places to buy or sell your car. Established over 12 years ago, Kathmandu Automobiles is led by Mr. Shailendra Shrestha, a veteran of 25 years of the automotive industry. A car (or automobile) is a wheeled motor vehicle used for transportation. Most definitions of cars say that they run primarily on roads, seat one to eight people, have four wheels, and mainly transport people rather than goods.</span>

					</div>
				</div>
			</div>
		</div>
		<!-- ============================ Page Title End ================================== -->

	




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
</html>