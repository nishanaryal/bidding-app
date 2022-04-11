<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
// $orgSlug = (string)$_GET['name'];
$bidders = mysqli_query($mysqli,"SELECT
products.name AS productName,
products.slug,
products.productid,
products.photo AS productPhoto,
products.base_price,
user.name AS bidderName,
user.user_photo AS bidderPhoto,
bidders.amount AS biddingAmount,
bidders.isWin As isWin,
bidders.bid_time AS biddingTime
FROM products
JOIN bidders
ON products.productid = bidders.product_id
JOIN user
ON user.userid = bidders.user_id");

// $queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE userid = '$UserID'");
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Bidders - Auction Nepal</title>
		<!-- All Plugins Css -->
		<link rel="stylesheet" href="../assets/css/plugins.css">
		<!-- Custom CSS -->
		<link href="../assets/css/styles.css" rel="stylesheet">
		<!-- Custom Color Option -->
		<link href="../assets/css/colors.css" rel="stylesheet">

		<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

	</head>
	
	<body class="red-skin">
		<!-- Main wrapper -->
		<div id="main-wrapper">
			<?php include('../admin/includes/navigation.php') ?>
			
			<div class="clearfix"></div>
			
			<!-- Dashboard Start -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<?php include('../includes/dashboard-admin.php');	?>
						</div>
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
                                <div class="Reveal-gravity-list mt-0">
                                    <h4>Manage Bidding</h4>

                                         <!-- Other Bidders in this product -->
										<table class="table table-bordered table-responsive" id="BiddingTable">
											<thead>
												<tr>
                                                <th>Product Photo</th>
                                                <th>Product Name</th>
													<th>Base Price NPR.</th>
													<th>Bidder Name</th>
													<th>Bidding Amount</th>
													<th>IsWinner</th>
													<th>Bidding Time</th>
												</tr>
											</thead>
											<tbody>
										
											<?php while($listing = mysqli_fetch_array($bidders))
											{ ?>
											<tr>
                                            <td><img src="../upload/products/<?php echo $listing['productPhoto']; ?>" height="50" /></td>
												<td><?php echo $listing['productName']; ?></td>
												<td><?php echo $listing['base_price']; ?></td>
												<td><img src="../upload/products/<?php echo $listing['bidderPhoto']; ?>" class="img img-circle" width="30" /> <?php echo $listing['bidderName']; ?></td>
												<td><?php echo $listing['biddingAmount']; ?></td>
												<td>
													<?php if($listing['isWin']){
													echo "<span class='badge badge-primary'>Winner</span>";
												}
												else{
													echo "<span class='badge badge-danger'>-</span>";
												}  ?>
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
			
			
			<?php include('../includes/footer.php'); ?>
		</div>
	
		<?php include('../includes/dashboard-footerJS.php'); ?>

        <script>
			$(document).ready(function() {
			var groupColumn = 1;
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