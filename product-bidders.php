<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$pid = (string)$_GET['pid'];

$productDetails = mysqli_query($mysqli,"SELECT *, DATE_FORMAT(auction_start, '%Y-%m-%dT%H:%i') AS startDate, DATE_FORMAT(auction_end, '%Y-%m-%dT%H:%i') AS endDate FROM products WHERE productid = '$pid'");

// $bidders = mysqli_query($mysqli,"SELECT * FROM bidders WHERE product_id = '$pid'");

$bidders = mysqli_query($mysqli,"SELECT
  products.name AS productName,
  products.slug,
  products.productid,
  products.base_price,
  user.name AS bidderName,
  user.user_photo AS bidderPhoto,
  bidders.bid_id As bid_id,
  bidders.amount AS biddingAmount,
  bidders.isWin As isWin,
  bidders.bid_time AS biddingTime
FROM products
JOIN bidders
  ON products.productid = bidders.product_id
JOIN user
  ON user.userid = bidders.user_id
WHERE product_id = '$pid'");



?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Manage Bidders - Auction Nepal</title>
		<!-- All Plugins Css -->
		<link rel="stylesheet" href="assets/css/plugins.css">
		<!-- Custom CSS -->
		<link href="assets/css/styles.css" rel="stylesheet">
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">
	</head>
	
	<body class="red-skin">
		<!-- Main wrapper -->
		<div id="main-wrapper">

			<!-- Start Navigation -->
			<?php include('includes/navigation.php') ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- Top header  -->
		
			
			<!-- Dashboard Start -->
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
								<h4><b>Bidding Start: </b> <?php echo date('D, jS F Y G:i A', strtotime($product['startDate'])); ?> </h4>
								<h4><b>Biding End: </b> <?php echo date('D, jS M Y G:i A', strtotime($product['endDate'])); ?> </h4>
								
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
													<th>Bidder Name</th>
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
												<td>
													<span class="img img responsive img-circle">
														<img src="<?php echo 'upload/profile/'.$listing['bidderPhoto']; ?>" height="30" title="<?php echo $listing['bidderName']; ?>" >
													</span>  <?php echo $listing['bidderName']; ?></td>
												<td><?php echo date('D, jS F Y G:i A', strtotime($listing['biddingTime'])); ?></td>
												<td><?php if($listing['isWin']){
													echo "<span class='badge badge-primary'>Winner</span>";
												}
												else{
													echo "<span class='badge badge-danger'>-</span>";
												}  ?>
												</td>												
												<td>NPR. <?php echo $listing['biddingAmount']; ?></td>
												<td>
													<a href="confirm-biding-request.php?bid=<?php echo $listing['bid_id']; ?>&pid=<?php echo $listing['productid']; ?>" class="btn btn-primary btn-sm"><i class="ti-pencil"></i> Sell Now</a>
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