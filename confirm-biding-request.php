<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
$bid = $_GET['bid'];
$pid = $_GET['pid'];


$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE email = '$username'");

$updateData = mysqli_query($mysqli,"UPDATE bidders SET isWin = 1 WHERE bid_id = '$bid'");

$makeProductInactive = mysqli_query($mysqli,"UPDATE products SET isActive = 0 WHERE productid = $pid");

$queryData = mysqli_query($mysqli,"SELECT
  products.name AS productName,
  products.slug,
  products.productid,
  products.base_price,
  user.name AS bidderName,
  bidders.amount AS biddingAmount,
  bidders.bid_time AS biddingTime
FROM products
JOIN bidders
  ON products.productid = bidders.product_id
JOIN user
  ON user.userid = bidders.user_id");

    
$updateData = mysqli_query($mysqli,"UPDATE bidders SET isWin='1' WHERE bid='$bid'");
    //  $query="UPDATE user SET name='$name',email='$Email',phone='$Phone', address='$Address' where username='$username'";
     
    if($updateData){
        echo "<script>alert('Update Successfully');</script>";
        header("Location:product-bidders.php?id=".$pid);
    }
    if(!$updateData){
        // echo mysqli_error();
        // die('Error Occured: '.mysqli_error());
    }
    // else{
    //     die("Couldnot update the details");
    // }

    header("Location:product-bidders.php?pid=".$pid);


// // Edit Products
// if ($_SERVER["REQUEST_METHOD"] == "POST") 
// {
// 	$product_id = $_POST['productid'];
// 	$user_id = $_POST['user_id'];
// 	$isWin = $_POST['isWin'];

try {

	// $makeProductInactive = mysqli_query($mysqli,"UPDATE products SET isActive = 0 WHERE productid = $pid");

	// UPDATE `bidders` SET `bid_time` = '2022-03-24 01:41:34' WHERE `bidders`.`bid_id` = 2;


// UPDATE Product SET ProductStatus = 'Yes' WHERE ProductID = '$prodid'
	// $markWinnerBidder = mysqli_query($mysqli,"UPDATE bidders SET isWin = 1 WHERE bid_id = '$bid'");
	// $markWinnerBidder = mysqli_query($mysqli,"UPDATE products SET isActive = 0 WHERE productid = $getProductID");


	} 
catch (Exception $e)
{
$message = 'Unable to add new product.' + $e;
throw new Exception( 'Unable to save details. Please try again later.',0,$e);
}

if(!$insertData)
{
$message = 'Couldnot save data..' + $e;
       echo mysqli_error();
}
	 header("Location:product-bidders.php?pid=".$pid);

// } 
?>



?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Bidding Request <?php echo $getProductID; ?> - Auction Nepal</title>
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
							<div class="mt-0">
									<h3>Bidders List</h3>
									
									<button style="margin-bottom: 30px;" class="btn btn-primary" onclick="history.back()">Go Back</button>


										<!-- Other Bidders in this product -->
										<table class="table table-bordered table-responsive" id="BiddersTable">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Base Price NPR.</th>
													<th>Bidder Name</th>
													<th>Bidding Amount</th>
													<th>Bidding Time</th>
												</tr>
											</thead>
											<tbody>
										
											<?php while($listing = mysqli_fetch_array($queryData))
											{ ?>
											<tr>
												<td><?php echo $listing['productName']; ?></td>
												<td><?php echo $listing['base_price']; ?></td>
												<td><?php echo $listing['bidderName']; ?></td>
												<td><?php echo $listing['biddingAmount']; ?></td>
												<td><?php echo $listing['biddingTime']; ?></td>
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


		


	</body>
</html>