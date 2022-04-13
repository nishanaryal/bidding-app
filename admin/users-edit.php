<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];
$user_id = $_GET['refID'];

$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE userid = '$user_id'");

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
                            <?php while($user = mysqli_fetch_array($userData))
                            { ?>
							    <!-- Basic Information -->
                                <div class="form-submit">   
                                    <h4>User Profile Details</h4>
                                    <div class="submit-section">
                                        <form method="post" action="admin-func.php" >
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-12">
                                                <label>User Name <span class="text-danger"></span></label>
                                                <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username'];?>" placeholder="User  Name">
                                                <input type="hidden" name="refUserID" id="refUserID" class="form-control" value="<?php echo $user['userid'];?>" placeholder="User  Name">
                                                
                                            </div>

                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>Full Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $user['name'];?>" placeholder="Full Name">
                                            </div>


                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Email</label>
                                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user['email'];?>" placeholder="Email. Eg. abc@xyz.com">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Phone</label>
                                                <input type="number" value="<?php echo $user['phone'];?>" id="phone" name="phone" class="form-control" placeholder="Phone. Eg. 98XXXXXXXX">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Gender</label>
                                                <select name="gender" id="gender" class="form-control combobox" required autocomplete="off">
                                                    <option value="Male" selected="selected">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Date of Birth (DOB)</label>
                                                <input type="date" value="<?php echo $user['dob'];?>" id="dob" name="dob" class="form-control" placeholder="Date of Birth">
                                            </div>


                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>Address</label>
                                                <input type="address" value="<?php echo $user['address'];?>" id="address" name="address" class="form-control" placeholder="Eg. Sanepa Height, Lalitpur">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Gender</label>
                                                <select name="user_role" id="user_role" class="form-control combobox" required autocomplete="off">
                                                    <option value="Super Admin" selected="selected">Super Admin</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Seller">Seller</option>
                                                </select>
                                            </div>

                                        
                                        </div>

                                        <!-- Col-4 -->
                                        <div class="form-row col-md-4">
                                            <div class="jumbotron">
                                                <img src="../upload/profile/<?php echo $user['user_photo'];?>" class="img-responsive"> 
                                            </div>
                                        </div>
                                        <!-- ./Col-4 -->
                                           
                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="update_UserProfile" id="update_UserProfile" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
						</div>
						
					</div>
					

				</div>
			</section>
			<!-- Dashboard End -->
			
			<?php include('../includes/footer.php'); ?>

		</div>
		<?php include('../includes/dashboard-footerJS.php'); ?>
	</body>
</html>