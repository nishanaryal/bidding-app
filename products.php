<?php

session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$Slug = (string)$_GET['name'];
$bid = (string)$_GET['bid'];


$maxBidAmt = 0;
$exhibitorID;
//$queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");
$featuredExhibitors = mysqli_query($mysqli,"SELECT * FROM products WHERE slug = '$Slug'");


// $basePrice =  featuredExhibitor['base_price'];
$bidders = mysqli_query($mysqli,"SELECT * FROM bidders WHERE product_id = '$bid'");


// Get Highest Bidding Amount
// $maxBidAmt = mysql_query($mysqli,"SELECT MAX(amount) FROM bidders");

$maxBiddingAmt = mysqli_query($mysqli, "SELECT amount FROM bidders WHERE product_id = '$bid' ORDER BY bid_id DESC LIMIT 1");
while ($maxAmt = $maxBiddingAmt->fetch_assoc()) {
    $maxBidAmt = $maxAmt['amount'];
}




// $result = mysql_query("SELECT MAX(amount) FROM bidders");
//     $row = mysql_fetch_row($result);
//     $maxBidAmt = $row[0];



// get Highest Bidding Amount

// while($exhibitor = mysqli_fetch_array($featuredExhibitors))
// {
// 	$exhibitorID = intval($exhibitor['exhibitorid']);
// }

// $featuredProducts = mysqli_query($mysqli,"SELECT * FROM products WHERE exhibitorid = 1");

// Save Business Contact Info
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$propertyID = $bid;
$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
$bidAmount = $_POST['bid_amount'];




// $insertData= mysqli_query($mysqli,"INSERT INTO `bidders`('product_id','user_id', 'amount', 'isWin') VALUES ('$propertyID', '$UserID', '$bidAmount', '0')");

try{
$insertData= mysqli_query($mysqli,"INSERT INTO `bidders` (`bid_id`, `product_id`, `user_id`, `amount`, `bid_time`, `isWin`) VALUES (NULL, '$propertyID', '$UserID', '$bidAmount', CURRENT_TIMESTAMP, '0')");
}
catch (Exception $e)
{
	throw new Exception( 'Unable to upload file',0,$e);
}

// $biddingData= mysqli_query($mysqli,"UPDATE bidders SET product_id = '$propertyID', user_id = '$UserID', amount = '$bidAmount'  WHERE slug='$listingSlug'");

    if(!$insertData)
    {
        echo mysqli_error();
    }
header("Location:products.php?name=".$Slug."&bid=".$bid);
} 
// Save Business Contact Info



?>







<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php include 'includes/header.php';?>  

	<link rel="stylesheet" type="text/css" href="assets/css/custom-style.css">

	<style>
		#bid_amount{
			font-size:28px;
			text-align:center;
			font-weight:600;
		}
	</style>
	
</head>

<body class="blue-skin">
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
			<section class="page-title-banner" id="exhibitorBanner" style="background-image:url(upload/products/<?php echo $featuredExhibitor['photo']; ?>);padding:10px;">
				<div class="container">
					<div class="row m-0 align-items-end detail-swap">
						<div class="tr-list-wrap">
							<!-- Begin  Content -->

							<?php 
								$todayDate = date("Y-m-d");
                                $auction_startDate = $featuredExhibitor['auction_start'];
                                $auction_endDate = $featuredExhibitor['auction_end'];
								$startingPrice = $featuredExhibitor['base_price'];
							?>
							<div class="listing-badge now-open" id="bidding-msg"></div>
										
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
						<div class="col-lg-9 col-md-9 col-sm-9">
							
							<!-- Single Block Wrap -->
							<div class="Reveal-block-wrap">
								<div class="Reveal-block-header">
									<h1 class="text-center"><?php echo $featuredExhibitor['name']; ?></h1>
									<h4 class="text-center">Starting from RS <?php echo $featuredExhibitor['base_price']; ?></h4>
								</div>
								
								<div class="Reveal-block-body">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<?php echo $featuredExhibitor['shortdescription']; ?>
										<div class="custom-tab style-1">
											<ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Features</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Additional Info</a>
												</li>
											</ul>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
													<?php echo $featuredExhibitor['description']; ?>
												</div>
												<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
													<?php echo $featuredExhibitor['features']; ?>
												</div>
												<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
													<?php echo $featuredExhibitor['additional_info']; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<hr>
					
							
						</div>


						<div class="col-lg-3 col-md-3 col-sm-12">
										<div class="row main_login_form">
											<div class="login_form_dm" id="allowBid">
											<?php
													$maxBidAmt = ($maxBidAmt > $startingPrice) ? $maxBidAmt : $startingPrice;
													$minBidAmt = ($maxBidAmt > $startingPrice) ? $maxBidAmt : $startingPrice;
													
													$maxBidAmt = $minBidAmt + ($minBidAmt*0.01);
												?>
												
												<!-- <h1 class="text-center">								
												<?php echo $minBidAmt ."    ". $maxBidAmt; ?>
												</h1> -->
												
												<?php if($featuredExhibitor['allowBidding'] == "yes") { ?>  
                                                 
												<?php if(! empty($_SESSION['logged_in'])) { ?>
												<form id="bidding_form" method="POST" class="edd_form">
													<fieldset>
														<p class="edd-login-username">
															<label>MIN BID AMOUNT <?php echo $minBidAmt; ?></label>
															<input class="form-control" type="number" id="bid_amount" max="<?php echo $maxBidAmt; ?>" min="<?php echo $minBidAmt; ?>" name="bid_amount" placeholder="BID Amount" value="<?php echo $minBidAmt; ?>" />
														</p>
														
														
														<p class="edd-login-submit">
															<input type="submit" class="btn btn-md btn-theme full-width" value="BID NOW">
														</p>
														
													</fieldset>
												</form>
												<?php } ?>

												<?php if(empty($_SESSION['logged_in'])) { ?>
													<center>
														<a href="login.php" class="btn btn-primary">
														<i class="fa fa-user"></i> SignIn to BID
													</a>
													</center>
													<hr>
												<?php } ?>
												
												
												<?php } ?>
												
												

												<?php if($featuredExhibitor['allowBidding'] == "no") { ?>
													<img id="bidClosedImg" src="assets/img/bidClosed.jpg" height="35" />
												<?php } ?>


											</div>
											<img id="bidClosedImg" src="assets/img/bidClosed.jpg" width="100%" style="display: none;" />
											<img id="bidOpeningSoonImg" src="assets/img/bidOpening.jpg" width="100%" style="display: none;" />
										</div>

							
										<div class="container">
										<div class="countdown text-center">
											<h3>Limited Time Only!</h3>											
											<span id="clock"></span>
											<div id="ribbon"></div>
											<br>
										</div>
										</div>

										
							<!-- Other Bidders in this product -->
							<table class="table table-bordered table-responsive" id="DataTable">
										<thead>
											<tr>
											<th>BID Time</th>
											<th>Amount</th>
										</tr>
										</thead>
										<tbody>
									
										<?php while($listing = mysqli_fetch_array($bidders))
										{ ?>
										<tr>
											<td><?php echo $listing['bid_time']; ?></td>
											<td><?php echo $listing['amount']; ?></td>
										</tr>

										<?php
										} ?>
										
										</tbody>
									</table>
							<!-- Other Bidders in this product -->
						</div>
					</div>

					<!-- FeaturedCategories -->
<?php include('includes/featuredCategoriesGrid.php'); ?>
		<!-- ./FeaturedCategopories -->


				</div>
			</section>
			<!-- Property Detail End -->
			<?php
		} ?>


		


		<!--  Footer Start ==== -->
		<?php include('includes/footer.php'); ?>
		<!-- == Footer End === -->

		

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


	<script src="assets/js/jquery.countdown.min.js"></script>


		<!-- Single Instance -->
		<script>

// $('#clock').countdown('<?php echo $auction_endDate; ?>', function(event) {
//   var $this = $(this).html(event.strftime(''
//     + '<span>%w</span> weeks '
//     + '<span>%d</span> days '
//     + '<span>%H</span> hr '
//     + '<span>%M</span> min '
//     + '<span>%S</span> sec'));
// });

			var m = new Date();
			var currentDateTime =
				m.getUTCFullYear() + "-" +
				("0" + (m.getUTCMonth()+1)).slice(-2) + "-" +
				("0" + m.getUTCDate()).slice(-2) + " " +
				("0" + m.getUTCHours()).slice(-2) + ":" +
				("0" + m.getUTCMinutes()).slice(-2) + ":" +
				("0" + m.getUTCSeconds()).slice(-2);


				var auctionStartDate = '<?php echo $auction_startDate; ?>';
				var auctionEndDate = '<?php echo $auction_endDate; ?>';
				var nowDateTime = currentDateTime;
				// console.log('Start ' + auctionStartDate);
				// console.log('End ' + auctionEndDate);
				// console.log('Now ' + nowDateTime);
				var ribbon = '';
				var allowBid = 0;
				auctionTime = '';

				if(auctionEndDate > nowDateTime) {
					ribbon = 'Bidding Running';
					allowBid = 1;
					auctionTime = auctionEndDate;
					// $('#content-container').html('My content here :-)');
				}
				if(auctionEndDate < nowDateTime) {
					ribbon = 'Bidding Expired';
					allowBid = 0;
					auctionTime = auctionEndDate;
					$('#bidClosedImg').css("display", "block");
					// $('#content-container').html('My content here :-)');
				}
				if(auctionStartDate > nowDateTime) {
					ribbon = 'Auction Opening Soon';
					allowBid = 0;
					auctionTime = auctionEndDate;
					$('#bidOpeningSoonImg').css("display", "block");
					// $('#content-container').html('My content here :-)');
				}

				$('#ribbon').html('<div class="badge badge-info">' + ribbon + '</div>');
				$('#bidding-msg').html(ribbon);

				if(allowBid == 1) {
					$('#allowBidding').show();
				}
				// if(allowBid == 0) {
				// 	$('#allowBid').css("display", "none");
				// }

			$('#clock').countdown(auctionTime)
				.on('update.countdown', function(event) {
				var format = '%H:%M:%S';
			
				if(event.offset.totalDays > 0) {
					format = '%-d Day%!d ' + format;
				}
				if(event.offset.weeks > 0) {
					format = '%-w week%!w ' + format;
				}
				// if(event.offset.hours > 0) {
				// 	format = '%-H <br>Hour%!H ' + format;
				// }
				$(this).html(event.strftime(format));
				})
				.on('finish.countdown', function(event) {
				$(this).html('Bidding Expired')
					.parent().addClass('disabled');
					$('#allowBid').css("display", "none");
					$('#bidClosedImg').css("display", "block");

				});


			// AJAX
			// function closeBID () {
			// 	$.ajax({
			// 		url:"functions.php?action=BidClose_AnnounceWinner",    //the page containing php script
			// 		type: "POST",    //request type,
			// 		dataType: 'json',
			// 		data: {propertyID: <?php echo $featuredExhibitor['id']; ?>},
			// 		success:function(result){
			// 			console.log(result);
			// 		}
			// 	});
   			//  }
			// AJAX
		</script>
		<!-- Single Instance -->
</body>
</html>