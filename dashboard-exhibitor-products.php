<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$orgSlug = (string)$_GET['name'];
$exhibitorID = (string)$_GET['exhibitorID'];

$exhibitorData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE slug = '$orgSlug'");

$exhibitorProducts = mysqli_query($mysqli, "SELECT * FROM products WHERE exhibitorid = '$exhibitorID'")

?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Exhibitor Products <?php echo $exhibitorID; ?> - Auction Nepal</title>
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
		<!-- Main wrapper -->
		<div id="main-wrapper">

			<!-- Start Navigation -->
			<?php include('includes/navigation.php') ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- Top header  -->
		
			
			<!--  Dashboard Start -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<?php include('includes/dashboard-UserProfileMenu.php');	?>
						</div>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
							<div class="Reveal-gravity-list mt-0">
									<h3>Products for Auction</h3>
									<a href="product-add.php?eid=<?php echo $exhibitorID;?>" class="btn btn-primary">
										<i class="fa fa-plus"></i> Add New Products
									</a>
									<ul>
										<?php while($listing = mysqli_fetch_array($exhibitorProducts))
										{ ?>	
										<li>
											<div class="Reveal-list-box-listing">
												<div class="Reveal-Reveal-list-box-listing-img"><a href="#"><img src="upload/products/<?php echo $listing['photo']; ?>" alt="<?php echo $listing['name']; ?>" title="<?php echo $listing['name']; ?>"></a></div>
												<div class="Reveal-Reveal-box-listing-content">
													<div class="inner">
														<h2><a href="dashboard-photo.php?name=<?php echo $listing['slug']; ?>"><b><?php echo $listing['name']; ?></b></a></h2>
														<p>
															<span><strong>Auction Base Price: </strong>NPR. <?php echo $listing['base_price']; ?></span>
															<br>
															<span><b>Auction Start Date: </b><?php echo $listing['auction_start']; ?></span>
															<br>
															<span><b>Auction End Date: </b><?php echo $listing['auction_end']; ?></span>
														</p>
													</div>
												</div>
											</div>
											<div class="buttons-to-right">
												<a href="product-bidders.php?pid=<?php echo $listing['productid']; ?>" class="button gray"><i class="ti-pencil"></i> View Bidders</a>

												<a href="product-edit.php?pid=<?php echo $listing['productid']; ?>" class="button gray"><i class="ti-pencil"></i> Edit</a>
												
												<a href="products.php?name=<?php echo $listing['slug']; ?>&&bid=<?php echo $listing['productid']; ?>" target="_blank" class="button gray"><i class="ti-book"></i> View</a>
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
			
			<!-- Footer Start -->
			<?php include('includes/footer.php'); ?>
			<!-- Footer End -->
		
		</div>
		<!-- End Wrapper -->



		<!-- All Jquery -->
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
		
		<!-- This page plugins -->
		<script src="assets/js/jquery.countdown.min.js"></script>



	</body>
</html>