<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$userID = $_SESSION["userid"];
$user = $_SESSION["username"];
$user_image = $_SESSION["user_image"];
$user_type = $_SESSION["user_type"];


$pid = (string)$_GET['pid'];
// $exhibitorID = (string)$_GET['exhibitorID'];

// $userData = mysqli_query($mysqli,"SELECT * FROM user WHERE email = '$username'");

$productDetails = mysqli_query($mysqli,"SELECT *, DATE_FORMAT(auction_start, '%Y-%m-%dT%H:%i') AS startDate, DATE_FORMAT(auction_end, '%Y-%m-%dT%H:%i') AS endDate FROM products WHERE productid = '$pid'");

// $exhibitorData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE slug = '$orgSlug'");

// $exhibitorProducts = mysqli_query($mysqli, "SELECT * FROM products WHERE exhibitorid = '$exhibitorID'");

$bidders = mysqli_query($mysqli,"SELECT * FROM bidders WHERE product_id = '$pid'");





?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Exhibitor Products - Auction Nepal</title>
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
							<?php include('includes/dashboard-UserProfileMenu.php');	?>
						</div>
						
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">

							
						<?php while($product = mysqli_fetch_array($productDetails))
                    	{ ?>
							<div class="jumbotron">
								<h4><b>Product Name: </b> <?php echo $product['name']; ?> </h4>
								<h4><b>Bidding Start: </b> <?php echo $product['startDate']; ?> </h4>
								<h4><b>Biding End: </b> <?php echo $product['endDate']; ?> </h4>
								
								<h4><b>Allow Bidding </b>
									<?php if($product['allowBidding'] == "yes"){
										echo "<span class='badge badge-primary'>Yes</span>";
									}
									else{
										echo "<span class='badge badge-danger'>No</span>";
									}  ?>
								</h4>


							</div>
							<?php  } ?>


							<div class="mt-0">
									<h3>Bidders List</h3>
									
									<button style="margin-bottom: 30px;" class="btn btn-primary" onclick="history.back()">Go Back</button>


										<!-- Other Bidders in this product -->
										<table class="table table-bordered table-responsive" id="DataTable" >
											<thead>
												<tr>
												<th>BID Time</th>
												<th>isWin</th>
												<th>Amount</th>
												<th></th>
											</tr>
											</thead>
											<tbody>
										
											<?php while($listing = mysqli_fetch_array($bidders))
											{ ?>
											<tr>
												<td><?php echo $listing['bid_time']; ?></td>
												<td><?php if($listing['isWin']){
													echo "<span class='badge badge-primary'>Winner</span>";
												}
												else{
													echo "<span class='badge badge-default'>-</span>";
												}  ?>
												</td>												
												
												<td>
													<a href="confirm-biding-request.php?bid=<?php echo $listing['bid_id']; ?>&pid=<?php echo $listing['product_id']; ?>" class="btn btn-primary btn-sm"><i class="ti-pencil"></i> Sell Now</a>
												</td>
											</tr>

											<?php
											} ?>
											
											</tbody>
										</table>
										<!-- Other Bidders in this product -->
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


		<script>
			// AJAX
			function closeBID () {
				$.ajax({
					url:"functions.php?action=BidClose_AnnounceWinner",    //the page containing php script
					type: "POST",    //request type,
					dataType: 'json',
					data: {propertyID: <?php echo $featuredExhibitor['id']; ?>},
					success:function(result){
						console.log(result);
					}
				});
   			 }
			// AJAX
		</script>



	</body>
</html>