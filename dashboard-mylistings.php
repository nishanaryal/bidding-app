<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
// $orgSlug = (string)$_GET['name'];
$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE email = '$username'");

$queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE userid = '$UserID'");
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>My Listings - Auction Nepal</title>
		<!-- All Plugins Css -->
		<link rel="stylesheet" href="assets/css/plugins.css">
		<!-- Custom CSS -->
		<link href="assets/css/styles.css" rel="stylesheet">
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">




		<!-- JS Cropper  -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->        
	<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
	<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
	<script src="https://unpkg.com/dropzone"></script>
	<script src="https://unpkg.com/cropperjs"></script>
	<!-- ./JS Cropper -->


	<!-- JS Cropper CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/js-cropper.css">
	<!-- ./JS Cropper CSS -->


		
	</head>
	
	<body class="red-skin">
		<!-- Preloader - style you can find in spinners.css -->
		<!-- <div id="preloader"><div class="preloader"><span></span><span></span></div></div> -->
		

		<!-- Main wrapper - style you can find in pages.scss -->
		<div id="main-wrapper">

			<!-- Start Navigation -->
			<?php include('includes/navigation.php') ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
		
			
			<!-- ============================ Dashboard Start ================================== -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						
						
						<div class="col-lg-3 col-md-4 col-sm-12">
							<?php while($user = mysqli_fetch_array($userData))
							{ 
								include('includes/dashboard-UserProfileMenu.php');
							} 
							?>
						</div>
						
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
							<div class="Reveal-gravity-list mt-0">
									<h4>Business Listing</h4>
									<ul>

										<?php while($listing = mysqli_fetch_array($queryData))
										{ ?>	
										<li>
											<div class="Reveal-list-box-listing">
												<div class="Reveal-Reveal-list-box-listing-img"><a href="#"><img src="upload/cover/<?php echo $listing['profile_coverImg']; ?>" alt="<?php echo $listing['orgname']; ?>" title="<?php echo $listing['orgname']; ?>"></a></div>
												<div class="Reveal-Reveal-box-listing-content">
													<div class="inner">
														<h2><a href="dashboard-photo.php?name=<?php echo $listing['slug']; ?>"><b><?php echo $listing['orgname']; ?></b></a></h2>
														<span><?php echo $listing['fulladdress']; ?></span>
														<p><?php echo $listing['shortdescription']; ?></p>
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												
												<a href="businesscontact.php?name=<?php echo $listing['slug']; ?>" class="button gray"><i class="ti-pencil"></i> Modify Details</a>
												<a href="dashboard-exhibitor-products.php?name=<?php echo $listing['slug']; ?>&exhibitorID=<?php echo $listing['exhibitorid']; ?>" class="button gray"><i class="ti-check"></i> Manage Products</a>
												<a href="listing.php?name=<?php echo $listing['slug']; ?>" class="button gray"><i class="ti-book"></i> View</a>
											</div>
										</li>
										<?php
										} ?>
										
									</ul>
								</div>
								
							</div>
						</div>
						
					</div>
					

				</div>
			</section>
			<!-- Dashboard End -->
			
			<!-- Call To Action Start -->
			<?php include('includes/call-to-action.php'); ?>
			<!-- Call To Action End -->
			
			<!-- ============================ Footer Start ================================== -->
			<?php include('includes/footer.php'); ?>
			<!-- ============================ Footer End ================================== -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<?php include('includes/dashboard-footerJS.php'); ?>



	</body>
</html>