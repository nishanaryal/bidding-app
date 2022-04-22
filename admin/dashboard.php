<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
// $orgSlug = (string)$_GET['name'];
$usersData = mysqli_query($mysqli,"SELECT * FROM user");

// Count no of Users
$countUserdata = mysqli_query($mysqli,"SELECT COUNT('userid') AS totalUsers FROM user");
$userRow = mysqli_fetch_assoc($countUserdata);
$numUsers = $userRow['totalUsers'];
// ./Count No of Users

$productsData = mysqli_query($mysqli,"SELECT * FROM products");
// Count no of Users
$countproductsdata = mysqli_query($mysqli,"SELECT COUNT('productid') AS totalProducts FROM products");
$productsRow = mysqli_fetch_assoc($countproductsdata);
$numProducts = $productsRow['totalProducts'];
// ./Count No of Users


$biddingData = mysqli_query($mysqli,"SELECT
  products.name AS productName,
  products.slug,
  products.productid,
  products.base_price,
  user.name AS bidderName,
  bidders.amount AS biddingAmount,
  bidders.isWin As isWin,
  bidders.bid_time AS biddingTime
FROM products
JOIN bidders
  ON products.productid = bidders.product_id
JOIN user
  ON user.userid = bidders.user_id");

// Count no of Users
$countbiddingsdata = mysqli_query($mysqli,"SELECT COUNT('bid_id') AS totalBidders FROM bidders");
$biddingRow = mysqli_fetch_assoc($countbiddingsdata);
$numBidding = $biddingRow['totalBidders'];
// ./Count No of Users

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Manage Users - Auction Nepal</title>
		<!-- All Plugins Css -->
		<link rel="stylesheet" href="../assets/css/plugins.css">
		<!-- Custom CSS -->
		<link href="../assets/css/styles.css" rel="stylesheet">
		<!-- Custom Color Option -->
		<link href="../assets/css/colors.css" rel="stylesheet">

		<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

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
	<link rel="stylesheet" type="text/css" href="../assets/css/js-cropper.css">
	<!-- ./JS Cropper CSS -->


		
	</head>
	
	<body class="red-skin">
		<!-- Main wrapper -->
		<div id="main-wrapper">

			<?php include('../admin/includes/navigation.php') ?>
			
			<div class="clearfix"></div>
			<!-- Top header  -->
		
			
			<!-- Dashboard Start -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<?php include('../includes/dashboard-admin.php');	?>
						</div>
						
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
							<!-- Insights -->
							<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="Reveal-dashboard-widget">
											<div class="Reveal-dashboard-widget-icon widget-1"><i class="ti-pie-chart"></i></div>
											<div class="Reveal-dashboard-widget-content"><h4><span class="cto"><?php echo $numProducts; ?></span></h4> <p>Total Products</p></div>
										</div>	
									</div>
									
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="Reveal-dashboard-widget">	
											<div class="Reveal-dashboard-widget-icon widget-2"><i class="ti-user"></i></div>
											<div class="Reveal-dashboard-widget-content"><h4><span class="cto"><?php echo $numUsers; ?></span></h4> <p>Total Users</p></div>
										</div>	
									</div>
									
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="Reveal-dashboard-widget">
											<div class="Reveal-dashboard-widget-icon widget-3"><i class="ti-bar-chart"></i></div>
											<div class="Reveal-dashboard-widget-content"><h4><span class="cto"><?php echo $numBidding; ?></span></h4> <p>Total Bidders</p></div>
										</div>	
									</div>
									
								</div>
							<!-- Insights -->

								<!-- Users List -->
								<div class="Reveal-gravity-list mt-0">
								<h3><b>Manage Users</b> (Showing <?php echo $numUsers; ?> Users) </h3>
									<table class="table table-bordered table-responsive" id="DataTable">
										<thead>
											<td>S.No</td>
											<td>Photo</td>
											<td>Full Name</td>
											<td>Username</td>
											<td>Email</td>
											<td>Phone</td>
											<td>User Role</td>
											<td></td>
										</thead>
										<tbody>
									
										<?php while($userData = mysqli_fetch_array($usersData))
										{ ?>
											<tr>
											<td><?php echo $userData['userid']; ?></td>
											<td>
												<a href="#"><img src="../upload/profile/<?php echo $userData['user_photo']; ?>" alt="<?php echo $userData['name']; ?>" heigt="30" title="<?php echo $userData['name']; ?>"></a>

											</td>
											<td><?php echo $userData['name']; ?></td>
											<td><?php echo $userData['username']; ?></td>
											<td>
												<?php echo $userData['email']."<br>"; 

												if($userData['isKYCVerified']){
													echo "<p class='badge badge-success'><i class='fa fa-check'>&nbsp</i>KYC Verified</p>";
												}
												else {
													echo "<p class='badge badge-danger'><i class='fa fa-times'>&nbsp</i>KYC Not Verified</p>";
													// echo "";
													// echo '<a href="javascript:verifyKYC(''.$userData["userid"].')" class='badge badge-danger' class='btn btn-primary'>Verify KYC Now</a>';
												}
												?>
											
											</td>
											<td><?php echo $userData['phone']; ?></td>
											<td><?php echo $userData['user_role']; ?></td>
											<td>
												<div class="btn-group mr-2" role="group">
													<a href="users-edit.php?refID=<?php echo $userData['userid']; ?>" class="btn btn-sm btn-info">
														<i class="fa fa-edit"></i>
													</a>

													<a href="javascript:deleteUser('<?php echo $userData['userid']; ?>', '<?php echo $userData['name']; ?>')" class="btn btn-sm btn-danger">
														<i class="fa fa-trash"></i>
													</a>
												</div>
										</tr>

										<?php
										} ?>
										
										</tbody>
									</table>	
								</div>
								<!-- ./UsersList -->

								<hr>

								<!-- Products List -->
								<div class="Reveal-gravity-list mt-0">
								<h3 class="text-primary"><b>Manage Products</b> (Showing <?php echo $numProducts; ?> Products) </h3>

									<table class="table table-bordered table-responsive" id="DataTable">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Photo</th>
												<th>Product Name</th>
												<th>IsActive</th>
												<th>IsFeatured</th>
												<th>Bidding Status</th>
												<th>Auction Start</th>
												<th>Auction End</th>
												<th></th>
											</tr>
										</thead>
										<tbody>

										<?php while($product = mysqli_fetch_array($productsData))
										{ ?>
											<tr>
											<td><?php echo $product['productid']; ?></td>
											<td>
												<a href="#"><img src="../upload/products/<?php echo $product['photo']; ?>" alt="<?php echo $product['name']; ?>" heigt="25" title="<?php echo $product['name']; ?>"></a>

											</td>
											<td><?php echo $product['name']; ?></td>
											<td><?php echo $product['isActive']; ?></td>
											<td><?php echo $product['isFeatured']; ?></td>
											<td>											
												<?php
												if($product['biddingStatus']  == "Running"){
													echo "<span class='badge badge-success'>Running</span>";
												}
												if($product['biddingStatus']  == "Closed"){
													echo "<span class='badge badge-danger'>Closed</span>";
												}
												if($product['biddingStatus']  == "Opening Soon"){
													echo "<span class='badge badge-primary'>Opening Soon</span>";
												}
												?>
												</td>
											<td><?php echo $product['auction_start']; ?></td>
											<td><?php echo $product['auction_end']; ?></td>
											<td>
												<div class="btn-group mr-2" role="group">
													<a href="products-edit.php?pid=<?php echo $product['productid']; ?>" class="btn btn-sm btn-info">
														<i class="fa fa-edit"></i>
													</a>
													<a href="javascript:deleteProduct('<?php echo $product['productid']; ?>', '<?php echo $product['name']; ?>')" class="btn btn-sm btn-danger">
														<i class="fa fa-trash"></i>
													</a>
												</div>
											</td>
										</tr>

										<?php
										} ?>
										
										</tbody>
									</table>

								</div>
								<!-- ./Products -->


								<!-- Bidders -->
								<div class="Reveal-gravity-list mt-0">
								<h3 class="text-primary"><b>Manage Bidders</b> (Showing <?php echo $numBidding; ?> Bidders) </h3>
								<table class="table table-bordered table-responsive" id="BiddingTable">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Base Price NPR.</th>
													<th>Bidder Name</th>
													<th>Bidding Amount</th>
													<th>IsWinner</th>
													<th>Bidding Time</th>
												</tr>
											</thead>
											<tbody>
										
											<?php while($bid = mysqli_fetch_array($biddingData))
											{ ?>
											<tr>
												<td><?php echo $bid['productName']; ?></td>
												<td><?php echo $bid['base_price']; ?></td>
												<td><?php echo $bid['bidderName']; ?></td>
												<td><?php echo $bid['biddingAmount']; ?></td>
												<td>
													<?php if($bid['isWin']){
													echo "<span class='badge badge-primary'>Winner</span>";
												}
												else{
													echo "<span class='badge badge-danger'>-</span>";
												}  ?>
												</td>
												<td><?php echo $bid['biddingTime']; ?></td>
											</tr>

											<?php
											} ?>
											
											</tbody>
										</table>
								</div>
								<!-- ./Bidders -->
								
							</div>
						</div>
						
					</div>
					

				</div>
			</section>
			<!-- Dashboard End -->
			
			<?php include('../includes/footer.php'); ?>

		</div>

		<?php include('../includes/dashboard-footerJS.php'); ?>
		
		

		
	<style>
		tr.group, tr.group:hover {
			background-color: #ddd !important;
			font-weight: 600;
		}
	</style>

	</body>
</html>