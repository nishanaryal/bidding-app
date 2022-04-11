<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$userID = $_SESSION["userid"];
$user = $_SESSION["username"];
$user_image = $_SESSION["user_image"];
// $user_fullname = $_SESSION["user_fullName"];
$user_type = $_SESSION["user_type"];
// $user_role = $_SESSION["user_role"];

$exhibitorID = (string)$_GET['eid'];

$message = "";

// $slug = (string)$_GET['name'];
// $pid = (string)$_GET['pid'];

// $orgSlug = (string)$_GET['name'];
// $productDetails = mysqli_query($mysqli,"SELECT * FROM products WHERE productid = '$pid'");

// $queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE userid = '$UserID'");


// while($product = mysqli_fetch_array($productDetails))
// {
 
// $name = '';
// $base_price = 25000;
// $photo = 'no-image.jpg';
// $slug = '';
// $shortdescription = '';
// $description = '';
// $features = '';
// $additional_info = '';
// $exhibitorid = '';
// $categoryid = '';
// $isFeatured = '';
// $auction_start = '';
// $auction_end = '';
//  // $profilePic = ($user['profilepic'] == NULL) ? "upload/profile/$user['profilepic']" : "assets/img/user-1.png";
// }



// Edit Products
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$name = $_POST['name'];
	$base_price = $_POST['base_price'];
	$photo = $_POST['photo'];
	$slug = $_POST['slug'];
	$shortdescription = $_POST['shortdescription'];
	$description = $_POST['description'];
	$features = $_POST['features'];
	$additional_info = $_POST['additional_info'];

	$exhibitorid = $exhibitorID;
	$categoryid = $_POST['categoryid'];
	$isActive = $_POST['isActive'];
	$isFeatured = $_POST['isFeatured'];
	$auction_start = $_POST['auction_start'];
	$auction_end = $_POST['auction_end'];



try {

	$insertData= mysqli_query($mysqli,"INSERT INTO `products` (`productid`, `name`, `photo`, `slug`, `shortdescription`, `description`, `features`, `additional_info`, `exhibitorid`, `categoryid`, `isActive`, `isFeatured`, `auction_start`, `auction_end`, `base_price`) VALUES (NULL, '$name', '$photo', '$slug', '$shortdescription', '$description', '$features', '$additional_info', '$exhibitorid', '$categoryid', '$isActive', '$isFeatured', '$auction_start', '$auction_end', '$base_price')");


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
	 header("Location:dashboard-mylistings.php");

} 
?>
<!-- Save Business Contact Info -->


<!-- xEdit Products -->



<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Edit Products - Auction Nepal</title>
		<!-- All Plugins Css -->
		<link rel="stylesheet" href="assets/css/plugins.css">
		<!-- Custom CSS -->
		<link href="assets/css/styles.css" rel="stylesheet">
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">

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
							<?php include('includes/dashboard-UserProfileMenu.php');	?>
						</div>
						
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
                            
                                <!-- Basic Information -->
                                <div class="form-submit">   
                                    <h4>Add New Product for Auction/Bidding</h4>
                                    <p>
                                    	<?php echo $message; ?>
                                    </p>
                                    <div class="submit-section">
                                        <form method="POST" id="ProductDetails">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Product Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="Product 1" placeholder="Product Name">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Base Price for Bidding</label>
                                                <input type="number" name="base_price" id="base_price" class="form-control" min="1000" value="25000" placeholder="Base Price for Product">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Photo URL</label>
                                                <input type="text" name="photo" id="photo" class="form-control" placeholder="Photo URL">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>What best Describes this? (Category)</label>
                                                <select name="categoryid" required autocomplete="off"
                                                class="form-control combobox" id="categoryid">
                                                <!-- <option value="">(Select from List)</option> -->
                                                <option value="1" >Car</option>
                                                <option value="2">Sports Bike</option>
                                                <option value="3">Mountain Bike</option>
                                                <option value="4">SUV</option>
                                                <option value="5">Pick Up Truck</option>
                                                <option value="6">Van</option>
                                                <option value="Hatchback">Hatchback</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>SLUG / URL <span>[Please contact Administrator to change this.]</span></label> 
                                                <input type="text" name="slug" id="slug" value="-" class="form-control">    
                                            </div>                                      

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Short Description</label>
                                                <textarea name="shortdescription" id="shortdescription" cols="200" rows="10" class="form-control" >
                                                    This is Product 1
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Product Description</label>
                                                <textarea name="description" id="description" cols="200" rows="10" class="form-control" >
                                                    This is Product 1
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Features</label>
                                                <textarea name="features" id="features" cols="200" rows="10" class="form-control" >
                                                    Features
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Additional Info</label>
                                                <textarea name="additional_info" id="additional_info" cols="200" rows="10" class="form-control" >
                                                    Additional Info
                                                </textarea>
                                            </div>


                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Auction Start</label>
                                                <input type="datetime-local" name="auction_start" id="auction_start" class="form-control" />
                                            </div>

                                             <div class="form-group col-md-6 col-lg-6">
                                                <label>Auction End</label>
                                                <input type="datetime-local" name="auction_end" id="auction_end" class="form-control" />
                                            </div>

                                             <div class="form-group col-md-6 col-md-6">
                                                <label>Is Active</label>
                                                <select name="isActive" required autocomplete="off"
                                                class="form-control combobox" id="isActive">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-md-6">
                                                <label>Is Featured</label>
                                                <select name="isFeatured" required autocomplete="off"
                                                class="form-control combobox" id="isFeatured">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="" id="" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>


                                        </form>
                                    </div>

                                    <!-- Product Photo -->
                                    <div class="submit-section">
                                    <?php $default_ProductPicture = 'assets/img/no-image-product.jpg'; ?>
                                <!-- Upload Profile Pic -->
                                <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">
								<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


								<h3 class="photoUploadTitle">Upload Profile Picture</h3>
								<div class="alert alert-primary">
									<b>ACCEPTED FORMATS:</b> JPG, GIF &amp; PNG
								</div>
								<div class="row">
                                    <!-- .Row -->
									<div class="col-md-6">
									    <div class="current-photo-container well">
															
											<h3 class="text-center">Product Photo</h3>
											<p>Recommended Size: 300 pixels by 300 pixels</p>
											<div class="image_area">
												<form method="post">
													<label for="upload_image_ProfilePicture">
														<img src="<?php echo $default_ProductPicture; ?>" id="uploaded_image_ProductPicture" />
														<div class="overlay">
															<div class="text">Click to Change Product Photo</div>
															</div>
															<input type="file" name="imageProductPicture" class="image" id="upload_image_ProductPicture" style="display:none" />
													</label>
												</form>
											</div>
															
										</div>
									</div> <!--row -->
								
								</div>
                                <!-- ./Upload Profile Pic -->
                                    </div>
                                    <!-- ./Product Photo -->
                                </div>

                                <hr>
                                
                                
                            </div>
						</div> 
						<!-- ./ Col-9 -->
						
					</div>
					

				</div>
			</section>
			<!-- Dashboard End -->
			
			
			
			<!-- ============================ Footer Start ================================== -->
			<?php include('includes/footer.php'); ?>
			<!-- ============================ Footer End ================================== -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<?php include('includes/dashboard-footerJS.php'); ?>
		
        <!-- ================================= JS Cropper for Product Image ============================ -->
        <script>
            // ProfilePicture JS Cropper Implementation
            $(document).ready(function(){
            var $modalProfilePicture = $('#ProductPicturemodal');
            var image_ProfilePicture = document.getElementById('sample_image_ProductPicture');
            var cropper_ProfilePicture;
            $('#upload_image_ProductPicture').change(function(event){
                var files_ProfilePicture = event.target.files;
                var doneProfilePicture = function(url){
                    image_ProfilePicture.src = url;
                    $modalProfilePicture.modal('show');
                };

                if(files_ProfilePicture && files_ProfilePicture.length > 0)
                {
                    reader_ProfilePicture = new FileReader();
                    reader_ProfilePicture.onload = function(event)
                    {
                        doneProfilePicture(reader_ProfilePicture.result);
                    };
                    reader_ProfilePicture.readAsDataURL(files_ProfilePicture[0]);
                }
            });

            $modalProfilePicture.on('shown.bs.modal', function() {
                cropper_ProfilePicture = new Cropper(image_ProfilePicture, {
                    aspectRatio: 1,
                    viewMode: 1,
                    preview:'.preview_ProfilePicture'
                });
            }).on('hidden.bs.modal', function(){
                cropper_ProfilePicture.destroy();
                cropper_ProfilePicture = null;
            });

            $('#crop_ProductPicture').click(function(){
                canvas_ProfilePicture = cropper_ProfilePicture.getCroppedCanvas({
                    width:1000,
                    height:1000
                });

                canvas_ProfilePicture.toBlob(function(blob){
                    url = URL.createObjectURL(blob);

                    var reader_ProfilePicture = new FileReader();
                    reader_ProfilePicture.readAsDataURL(blob);
                    reader_ProfilePicture.onloadend = function(){
                        var base64dataProfilePicture = reader_ProfilePicture.result;
                        $.ajax({
                            url:'uploadImgCustom.php',
                            method:'POST',
                            data:{imageProductPicture:base64dataProfilePicture, productID:pid},
                            success:function(data)
                            {
                                $modalProfilePicture.modal('hide');
                                $('#uploaded_image_ProductPicture').attr('src', data);
                            }
                        });
                    };
                });
            });

        });
        </script>
        <!-- ================================= JS Cropper for Product Image ============================ --->

	</body>
</html>