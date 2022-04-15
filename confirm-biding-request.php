<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

// Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
$mail->SMTPDebug = SMTP::DEBUG_OFF;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'aryalnishan@gmail.com'; // YOUR gmail email
$mail->Password = 'vcbwzmyveijudybr'; // YOUR gmail password


?>

<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");


$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];

$bid = $_GET['bid'];
$pid = $_GET['pid'];
$emailSendMsg = '';


$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE email = '$username'");

$makeProductInactive = mysqli_query($mysqli,"UPDATE products SET isActive = 0 WHERE productid = $pid");

$queryData = mysqli_query($mysqli,"SELECT
  products.name AS productName,
  products.slug,
  products.productid,
  products.base_price,
  user.name AS bidderName,
  user.email AS BidderEmail,
  bidders.amount AS biddingAmount,
  bidders.isWin As isWin,
  bidders.bid_time AS biddingTime
FROM products
JOIN bidders
  ON products.productid = bidders.product_id
JOIN user
  ON user.userid = bidders.user_id
  
 WHERE bidders.product_id = '$pid'");

try {
		//First reset all Winners and
		$resetWinners = mysqli_query($mysqli,"UPDATE bidders SET isWin='0' WHERE product_id='$pid'");


		$updateData = mysqli_query($mysqli,"UPDATE bidders SET isWin='1' WHERE bid_id='$bid'"); 
		if($updateData){

			$getBidderInfo = mysqli_query($mysqli,
							"SELECT
							products.name AS productName,
							products.slug,
							products.productid,
							products.base_price,
							user.name AS bidderName,
							user.email AS BidderEmail,
							user.user_photo AS BidderPhoto,
							bidders.amount AS biddingAmount,
							bidders.isWin As isWin,
							bidders.bid_time AS biddingTime
						FROM products
						JOIN bidders
							ON products.productid = bidders.product_id
						JOIN user
							ON user.userid = bidders.user_id
						WHERE bidders.bid_id = '$bid'");

			while ($bidding = $getBidderInfo->fetch_assoc()) {

			// Send Email notification
			try {
				// Sender and recipient settings
				$mail->setFrom('testnow.emailservice@gmail.com', 'Bidding Nepal App');
				$mail->addAddress($bidding['BidderEmail'], $bidding['bidderName']);
				$mail->addReplyTo('nishan-aryal@outlook.com', 'Nishan Aryal'); // to set the reply to

				// Setting the email content
				$mail->IsHTML(true);
				$mail->Subject = "Congratulations! ".$bidding['bidderName']." - ".$bidding['productName']." has been sold to you.";
				
				
				$emailBody = '<html> 
				<head>
					<title>Congratulations! Product sold to you.</title> 
				</head> 
				<body>
				<h1>Congratulations!!!</h1>';

				$emailBody .= '<p>Your Bid has been approved and you are WINNER.';

				$emailBody .=	"<table cellspacing='0' style='border: 2px dashed #FB4314; width: 100%;'> 
								<tr> 
									<td><b>Product Name: </b></td><td>".$bidding['productName']."</td> 
								</tr>";
				$emailBody .=	"<tr> 
									<td><b>Product Base Price:</b></td><td>NPR. ".$bidding['base_price']."</td> 
								</tr>";
				$emailBody .=	"<tr> 
									<td><b>Product Sold Price: </b></td><td>NPR. ".$bidding['biddingAmount']."</td> 
								</tr>";
				$emailBody .=	"</table> 
								</body> 
								</html>";

				$mail->Body = $emailBody;

				$mail->AltBody = 'Congratulations! '.$bidding['bidderName'].' Your BID for '.$bidding['productName'].' has been approved. You have won the BID. Please clear the pending dues and collet your Product.';

				$mail->send();
				$emailSendMsg = "Email message sent successfully";
			}
			catch (Exception $e) {
				echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
			}
			} //While Loop

			// ./Send Email Notification
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
		
			
			<!-- Dashboard Start -->
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
								<div class="alert alert-success"><?php echo $emailSendMsg; ?></div>
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