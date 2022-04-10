<?php

include_once("db-config.php");
include_once("functions.php");
include_once("func.php");


// $queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$email'");

global $mysqli;

$errorMessage = '';

// If form submitted, collect email and password from form
if (isset($_POST['member_login_submit'])) {
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($mysqli,$email);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($mysqli,$password);
	// echo $password;
   
	  // $email    = $_POST['email'];
	  // $password = $_POST['password'];
  
	  // Check if a user exists with given username & password
	  $result = mysqli_query($mysqli, "SELECT * FROM user
		  where email='$email' and password='$password'");
  
	  while($data = mysqli_fetch_array($result))
	  {
		  $userName = $data["username"];
		  $userID = $data["userid"];
		  $image = $data["image"];
		  $user_type = $data["user_type"];
  
  
	  // Count the number of user/rows returned by query 
	  $user_matched = mysqli_num_rows($result);
  
	  // var_dump($user_matched);
  
	  // Check If user matched/exist, store user email in session and redirect to sample page-1
	  if ($user_matched > 0) {
		  session_start();
		  $_SESSION["email"] = $email;
		  $_SESSION["userid"] = $userID;
		  $_SESSION["username"] = $userName;
		  $_SESSION["user_image"] = $image;
		  $_SESSION["user_type"] = $user_type;
		  $_SESSION['logged_in'] = true;
		  header("location: index.php");
	  } else {
		//   echo "User email or password is not matched <br/><br/>";
		  $errorMessage = "<div class='alert alert-danger'>Invalid Username or Password. Please try again</div>";
		  header("location: login.php");
	  }
  
		  }
  }


?>

<!DOCTYPE html>
<html lang="en">
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
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Login Start================================== -->
			<section class="gray">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-10">
							<div class="loving-modern-login">
                        
                               <div class="text-center mb-4"><img src="assets/img/logo.png" class="img-fluid" alt="" /></div>
								<div class="row main_login_form">
									<div class="login_form_dm">
										<?php echo $errorMessage; ?>
										<form action="" id="member_login" method="POST" class="edd_form">
											<fieldset>
												<p class="edd-login-username">
													<label>Email</label>
													<input class="form-control" type="email" id="email" name="email" placeholder="Your Username or Email" value="silverlun.03@gmail.com" />
												</p>
												<p class="edd-login-password">
													<label>Password</label>
													<input class="form-control" type="password" id="password" name="password" placeholder="*******" value="Nepal@123" />
												</p>
												<!-- <p class="edd-login-remember">
													<input id="remember" class="checkbox-custom" name="remember" type="checkbox">
													<label for="remember" class="checkbox-custom-label">Remember Me</label>
												</p> -->
												<p class="edd-lost-password">
													<a href="#">Lost Password?</a>
												</p>
												<p class="edd-login-submit">
													<input type="submit" class="btn btn-md btn-theme full-width" value="Login" id="member_login_submit" name="member_login_submit">
												</p>
												
											</fieldset>
										</form>
									</div>
								</div>
                                        
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Login End ================================== -->
			
			<!-- Call To Action Start -->
			<?php include('includes/call-to-action.php'); ?>
			<!-- Call To Action End -->
			
			<!-- ============================ Footer Start ================================== -->
			<?php include('includes/footer.php'); ?>
			<!-- ============================ Footer End ================================== -->
			
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
											<input type="text" class="form-control" placeholder="Username" value="silverlun.03@gmail.com" />
											<i class="ti-user"></i>
										</div>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-with-icon gray">
											<input type="password" class="form-control" placeholder="*******" value="Nepal@123" />
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

<!-- Mirrored from codeminifier.com/reveal-live/reveal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Jul 2021 10:36:05 GMT -->
</html>