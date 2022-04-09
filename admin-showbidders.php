<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];

$user = $_SESSION["username"];
$user_image = $_SESSION["user_image"];
$user_type = $_SESSION["user_type"];

$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE email = '$username'");

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
													}
													?>
												</td>
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