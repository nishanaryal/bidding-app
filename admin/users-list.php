<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
// $orgSlug = (string)$_GET['name'];
$users = mysqli_query($mysqli,"SELECT * FROM user");

// $queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE userid = '$UserID'");
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
							<div class="Reveal-gravity-list mt-0">
									<h4>Manage Users</h4>

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
									
										<?php while($listing = mysqli_fetch_array($users))
										{ ?>
											<tr>
											<td><?php echo $listing['userid']; ?></td>
											<td>
												<a href="#"><img src="../upload/profile/<?php echo $listing['user_photo']; ?>" alt="<?php echo $listing['name']; ?>" heigt="30" title="<?php echo $listing['name']; ?>"></a>

											</td>
											<td><?php echo $listing['name']; ?></td>
											<td><?php echo $listing['username']; ?></td>
											<td><?php echo $listing['email']; ?></td>
											<td><?php echo $listing['phone']; ?></td>
											<td><?php echo $listing['user_role']; ?></td>
											<td>
												<div class="btn-group mr-2" role="group">
													<a href="users-edit.php?refID=<?php echo $listing['userid']; ?>" class="btn btn-sm btn-info">
														<i class="fa fa-edit"></i>
													</a>
													<a href="javascript:deleteUser('<?php echo $listing['userid']; ?>', '<?php echo $userData['name']; ?>')" class="btn btn-sm btn-danger">
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