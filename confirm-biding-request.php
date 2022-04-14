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

$makeProductInactive = mysqli_query($mysqli,"UPDATE products SET isActive = 0 WHERE productid = $pid");

$queryData = mysqli_query($mysqli,"SELECT
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

try {
		//First reset all Winners and
		$resetWinners = mysqli_query($mysqli,"UPDATE bidders SET isWin='0' WHERE product_id='$pid'");


		$updateData = mysqli_query($mysqli,"UPDATE bidders SET isWin='1' WHERE bid_id='$bid'"); 
		if($updateData){

			$to = 'nishankumararyal@tuicms.edu.np'; 
			$from = 'aryalnishan@gmail.com'; 
			$fromName = 'Bidders Nepal'; 
			
			$subject = "Congratulations! Your bidding has been Approved."; 
			
			$htmlContent = ' 
				<html> 
				<head> 
					<title>Welcome to CodexWorld</title> 
				</head> 
				<body> 
					<h1>Thanks you for joining with us!</h1> 
					<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
						<tr> 
							<th>Name:</th><td>CodexWorld</td> 
						</tr> 
						<tr style="background-color: #e0e0e0;"> 
							<th>Email:</th><td>contact@codexworld.com</td> 
						</tr> 
						<tr> 
							<th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td> 
						</tr> 
					</table> 
				</body> 
				</html>'; 
			
			// Set content-type header for sending HTML email 
			$headers = "MIME-Version: 1.0" . "\r\n"; 
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
			
			// Additional headers 
			$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
			$headers .= 'Cc: nishan-aryal@outlook.com' . "\r\n"; 
			$headers .= 'Bcc: nishan-aryal@outlook.com' . "\r\n"; 
			
			// Send email 
			if(mail($to, $subject, $htmlContent, $headers)){ 
				echo 'Email has sent successfully.'; 
			}else{ 
			echo 'Email sending failed.'; 
			}



			// echo "<script>alert('Update Successfully');</script>";
			header("Location:product-bidders.php?pid=".$pid);
		}
		if(!$updateData){
			echo mysqli_error();
			die('Error Occured: '.mysqli_error());
		}
	} 
catch (Exception $e)
{
	$message = 'Unable to add new product.' + $e;
	throw new Exception( 'Unable to save details. Please try again later.',0,$e);
}

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
		<!-- Main wrapper - style you can find in pages.scss -->
		<div id="main-wrapper">

			<!-- Start Navigation -->
			<?php include('includes/navigation.php') ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
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
										
											<?php while($listing = mysqli_fetch_array($queryData))
											{ ?>
											<tr>
												<td><?php echo $listing['productName']; ?></td>
												<td><?php echo $listing['base_price']; ?></td>
												<td><?php echo $listing['bidderName']; ?></td>
												<td><?php echo $listing['biddingAmount']; ?></td>
												<td>
													<?php if($listing['isWin']){
													echo "<span class='badge badge-primary'>Winner</span>";
												}
												else{
													echo "<span class='badge badge-danger'>-</span>";
												}  ?>
												</td>
												<td><?php echo date('D, jS M Y G:i A', strtotime($listing['biddingTime'])); ?></td>
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
		</div>

		<?php include('includes/dashboard-footerJS.php'); ?>
		

		<script>
			$(document).ready(function() {
			var groupColumn = 0;
			var table = $('#BiddingTable').DataTable({
				"columnDefs": [
					{ "visible": false, "targets": groupColumn }
				],
				"order": [[ groupColumn, 'asc' ]],
				"displayLength": 25,
				"drawCallback": function ( settings ) {
					var api = this.api();
					var rows = api.rows( {page:'current'} ).nodes();
					var last=null;
		
					api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
						if ( last !== group ) {
							$(rows).eq( i ).before(
								'<tr class="group"><td colspan="5">'+group+'</td></tr>'
							);
		
							last = group;
						}
					} );
				}
			} );
		
			// Order by the grouping
			$('#BiddingTable tbody').on( 'click', 'tr.group', function () {
				var currentOrder = table.order()[0];
				if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
					table.order( [ groupColumn, 'desc' ] ).draw();
				}
				else {
					table.order( [ groupColumn, 'asc' ] ).draw();
				}
			} );
		} );
		</script>

		
	<style>
		tr.group, tr.group:hover {
			background-color: #ddd !important;
			font-weight: 600;
		}
	</style>

	</body>
</html>