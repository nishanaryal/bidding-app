<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
// $orgSlug = (string)$_GET['name'];
$users = mysqli_query($mysqli,"SELECT * FROM products");

// $queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE userid = '$UserID'");
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Manage Products - Auction Nepal</title>
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
							<div class="Reveal-gravity-list mt-0">
									<h4>Manage Products</h4>

									<table class="table table-bordered table-responsive" id="DataTable">
										<thead>
											<tr>
												<th>PID</th>
												<th>Photo</th>
												<th>Product Name</th>
												<th>IsActive</th>
												<th>IsFeatured</th>
												<th>Auction Start</th>
												<th>Auction End</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
									
										<?php while($listing = mysqli_fetch_array($users))
										{ ?>
											<tr>
											<td><?php echo $listing['productid']; ?></td>
											<td>
											<img src="../upload/products/<?php echo $listing['photo']; ?>" alt="<?php echo $listing['name']; ?>" height="50" title="<?php echo $listing['name']; ?>" /></td>
											<td><?php echo $listing['name']; ?></td>
											<td><?php echo $listing['isActive']; ?></td>
											<td><?php echo $listing['isFeatured']; ?></td>
											<td><?php echo $listing['auction_start']; ?></td>
											<td><?php echo $listing['auction_end']; ?></td>
											<td>
												<a href="products-edit.php?id=<?php echo $listing['productid']; ?>" class="btn btn-sm btn-info">
													<i class="fa fa-edit"></i>
												</a>
												<a href="products-edit.php?id=<?php echo $listing['productid']; ?>" class="btn btn-sm btn-danger">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>

										<?php
										} ?>
										
										</tbody>
									</table>

									
								</div>
								
							</div>
						</div>
						
					</div>
					

				</div>
			</section>
			<!-- Dashboard End -->
			
			
			
			<!-- ============================ Footer Start ================================== -->
			<?php include('../includes/footer.php'); ?>
			<!-- ============================ Footer End ================================== -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<?php include('../includes/dashboard-footerJS.php'); ?>
		


	</body>
</html>