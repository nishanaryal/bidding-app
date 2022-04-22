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

// $exhibitorID = (string)$_GET['eid'];
$pid = $_GET['pid'];

$message = "";

$productDetails = mysqli_query($mysqli,"SELECT *, DATE_FORMAT(auction_start, '%Y-%m-%dT%H:%i') AS startDate, DATE_FORMAT(auction_end, '%Y-%m-%dT%H:%i') AS endDate FROM products WHERE productid = '$pid'");
   
// while($product = mysqli_fetch_array($productDetails));
// {
//     $productid = $product['productid'];
//     $name = $product['name'];
//     $photo = $product['photo'];
//     $slug = $product['slug'];
//     $shortdescription = $product['shortdescription'];
//     $description = $product['description'];
//     $features = $product['features'];
//     $additional_info = $product['additional_info'];
//     $exhibitorid = $product['exhibitorid'];
//     $categoryid = $product['categoryid'];
//     $isActive = $product['isActive'];
//     $isFeatured = $product['isFeatured'];
//     $allowBidding = $product['allowBidding'];
//     $auction_start = $product['auction_start'];
//     $auction_start = $product['auction_start'];
//     $base_price = $product['base_price'];
// }



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
	// $photo = $_POST['photo'];
	// $slug = $_POST['slug'];
	$shortdescription = $_POST['shortdescription'];
	$description = $_POST['description'];
	$features = $_POST['features'];
	$additional_info = $_POST['additional_info'];

	// $exhibitorid = $exhibitorID;
	$categoryid = $_POST['categoryid'];
	$isActive = $_POST['isActive'];
	$isFeatured = $_POST['isFeatured'];
	$auction_start = $_POST['auction_start'];
	$auction_end = $_POST['auction_end'];
    $biddingStatus = $_POST['biddingStatus'];

    try {

	$updateData= mysqli_query($mysqli,"UPDATE products SET name='$name',
                                        base_price = '$base_price',
                                        shortdescription = '$shortdescription',
                                        description = '$description', 
                                        features = 'features',
                                        additional_info = '$additional_info',
                                        categoryid = '$categoryid',
                                        isActive = '$isActive',
                                        isFeatured = '$isFeatured',
                                        auction_start = '$auction_start',
                                        biddingStatus = '$biddingStatus',
                                        auction_end = '$auction_end'
                                        WHERE productid='$pid'");

        if($updateData){
            echo "<script>alert('Update Successfully');</script>";
            header("Location:dashboard-mylistings.php");
        }
	} 
    catch (Exception $e)
    {
    $message = 'Unable to add new product.' + $e;
    throw new Exception( 'Unable to save details. Please try again later.',0,$e);
    }
}
?>
<!-- Save Business Contact Info -->


<!-- xEdit Products -->



<!DOCTYPE html>
<html>
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
		<!-- Main wrapper -->
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
							<?php include('includes/dashboard-UserProfileMenu.php');	?>
						</div>
						
						<?php while($product = mysqli_fetch_array($productDetails))
                    { ?>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
                            
                                <!-- Basic Information -->
                                <div class="form-submit">   
                                    <h4><b>Edit Product</b> <?php echo $product['name']; ?></h4>
                                    <hr>
                                    <p>
                                    	<?php echo $message; ?>
                                    </p>
                                    <div class="submit-section">
                                        <form method="POST" id="ProductDetails">
                                        <div class="form-row">
                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>Product Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $product['name']; ?>" placeholder="Product Name">
                                                <input type="text" name="exhibitorid" id="exhibitorid" class="form-control" hidden value="<?php echo $product['exhibitorid']; ?>">
                                            </div>

                                            <div class="form-group col-md-4 col-lg-4">
                                                <label>Auction Start</label>
                                                <input type="datetime-local" name="auction_start" id="auction_start" value="<?php echo $product['startDate']; ?>" class="form-control" />
                                            </div>

                                             <div class="form-group col-md-4 col-lg-4">
                                                <label>Auction End</label>
                                                <input type="datetime-local" name="auction_end" id="auction_end" value="<?php echo $product['endDate']; ?>" class="form-control" />
                                            </div>

                                             <div class="form-group col-md-4 col-md-4">
                                                <label>Bidding Status</label>
                                                <select name="biddingStatus" required autocomplete="on" class="form-control combobox" id="biddingStatus">
                                                    <option value="Running">Running</option>
                                                    <option value="Closed">Closed</option>
                                                    <option value="Opening Soon">Opening Soon</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Base Price for Bidding</label>
                                                <input type="number" name="base_price" id="base_price" class="form-control" min="1000" value="<?php echo $product['base_price']; ?>" placeholder="Base Price for Product">
                                            </div>

                                            <!-- <div class="form-group col-md-6 col-lg-6">
                                                <label>Photo URL</label>
                                                <input type="text" name="photo" id="photo" class="form-control" placeholder="Photo URL">
                                            </div> -->

                                            <div class="form-group col-md-6">
                                                <label>What best Describes this? (Category)</label>
                                                <select name="categoryid" required autocomplete="off"
                                                class="form-control combobox" id="categoryid">

                                                <?php $cat = showNewCategories(); 
                                                foreach ($cat as $category): ?>
                                                    <option value="<?php echo $category['categoryid']; ?>" ><?php echo $category['displayTitle']; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>SLUG / URL <span>[Please contact Administrator to change this.]</span></label> 
                                                <input type="text" disabled name="slug" id="slug" value="<?php echo $product['slug']; ?>" class="form-control">    
                                            </div>                                      

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Short Description</label>
                                                <textarea name="shortdescription" id="shortdescription" cols="200" rows="10" class="form-control" >
                                                <?php echo $product['shortdescription']; ?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Product Description</label>
                                                <textarea name="description" id="description" cols="200" rows="10" class="form-control" >
                                                <?php echo $product['description']; ?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Features</label>
                                                <textarea name="features" id="features" cols="200" rows="10" class="form-control" >
                                                <?php echo $product['features']; ?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Additional Info</label>
                                                <textarea name="additional_info" id="additional_info" cols="200" rows="10" class="form-control" >
                                                <?php echo $product['additional_info']; ?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-6 col-md-6">
                                                <label>Is Featured</label>
                                                <select name="isFeatured" required autocomplete="off" class="form-control combobox" id="isFeatured">
                                                <option value="1">Active</option>
                                                <option value="2">InActive</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 col-md-6">
                                                <label>Is Active</label>
                                                <select name="isActive" required autocomplete="off" class="form-control combobox" id="isActive">
                                                <option value="1">Active</option>
                                                <option value="2">InActive</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="" id="" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>


                                        </form>
                                    </div>
                                    <hr>

                                    <!-- Product Photo -->
                                    <div class="submit-section">
                                    <?php $default_ProductPicture = ($product['photo'] != '') ? 'upload/products/'. $product['photo'] : 'assets/img/no-image-product.jpg'; ?>
                                <!-- Upload Product Pic -->
                                <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">
								<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


								<h3 class="photoUploadTitle text-primary">Product Picture</h3>
								<div class="alert alert-primary">
									<b>ACCEPTED FORMATS:</b> JPG &amp; PNG
								</div>
								<div class="row">
                                    <!-- .Row -->
									<div class="col-md-6">
									    <div class="current-photo-container well">
											<p>Recommended Size: 726 pixels by 482 pixels</p>
											<div class="image_area">
												<form method="post">
													<label for="upload_image_ProductPicture">
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

                        <?php  } ?>
						<!-- ./ Col-9 -->
						
					</div>
					

				</div>
			</section>
			<!-- Dashboard End -->
			

            <?php include('includes/jsCropperImageUploader.php'); ?>
			
			
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
            // ProductPicture JS Cropper Implementation
            $(document).ready(function(){
            var $modalProductPicture = $('#ProductPicturemodal');
            var image_ProductPicture = document.getElementById('sample_image_ProductPicture');
            var cropper_ProductPicture;
            $('#upload_image_ProductPicture').change(function(event){
                var files_ProductPicture = event.target.files;
                var doneProductPicture = function(url){
                    image_ProductPicture.src = url;
                    $modalProductPicture.modal('show');
                };

                if(files_ProductPicture && files_ProductPicture.length > 0)
                {
                    reader_ProductPicture = new FileReader();
                    reader_ProductPicture.onload = function(event)
                    {
                        doneProductPicture(reader_ProductPicture.result);
                    };
                    reader_ProductPicture.readAsDataURL(files_ProductPicture[0]);
                }
            });

            $modalProductPicture.on('shown.bs.modal', function() {
                cropper_ProductPicture = new Cropper(image_ProductPicture, {
                    aspectRatio: 1.5 / 1,
                    viewMode: 1,
                    preview:'.preview_ProductPicture'
                });
            }).on('hidden.bs.modal', function(){
                cropper_ProductPicture.destroy();
                cropper_ProductPicture = null;
            });

            $('#crop_ProductPicture').click(function(){
                canvas_ProductPicture = cropper_ProductPicture.getCroppedCanvas({
                    width:726,
                    height:482
                });

                canvas_ProductPicture.toBlob(function(blob){
                    url = URL.createObjectURL(blob);

                    var reader_ProductPicture = new FileReader();
                    reader_ProductPicture.readAsDataURL(blob);
                    reader_ProductPicture.onloadend = function(){
                        var base64dataProductPicture = reader_ProductPicture.result;
                        $.ajax({
                            url:'uploadImgCustom.php',
                            method:'POST',
                            data:{imageProductPicture:base64dataProductPicture, pid:<?php echo $pid; ?>},
                            success:function(data)
                            {
                                $modalProductPicture.modal('hide');
                                $('#uploaded_image_ProductPicture').attr('src', data);
                            }
                        });
                    };
                });
            });

        });




        $(document).ready(function(){
            var $modal = $('#modal');
            var image = document.getElementById('sample_image');
            var cropper;
            $('#upload_image').change(function(event){
                var files = event.target.files;
                var done = function(url){
                    image.src = url;
                    $modal.modal('show');
                };

                if(files && files.length > 0)
                {
                    reader = new FileReader();
                    reader.onload = function(event)
                    {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 11 / 5.15,
                    viewMode: 3,
                    preview:'.preview'
                });
            }).on('hidden.bs.modal', function(){
                cropper.destroy();
                cropper = null;
            });

            $('#crop').click(function(){
                canvas = cropper.getCroppedCanvas({
                    width:1100,
                    height:515
                });

                canvas.toBlob(function(blob){
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function(){
                        var base64data = reader.result;
                        $.ajax({
                            url:'uploadImgCustom.php',
                            method:'POST',
                            data:{image:base64data, orgSlug:listingSlug},
                            success:function(data)
                            {
                                $modal.modal('hide');
                                $('#uploaded_image').attr('src', data);
                            }
                        });
                    };
                });
            });

        });


        $(document).ready(function(){
            var $modalProfileLogo = $('#ProfileLogomodal');
            var image_ProfileLogo = document.getElementById('sample_image_ProfileLogo');
            var cropper_ProfileLogo;
            $('#upload_image_ProfileLogo').change(function(event){
                var files_ProfileLogo = event.target.files;
                var done = function(url){
                    image_ProfileLogo.src = url;
                    $modalProfileLogo.modal('show');
                };

                if(files_ProfileLogo && files_ProfileLogo.length > 0)
                {
                    reader_ProfileLogo = new FileReader();
                    reader_ProfileLogo.onload = function(event)
                    {
                        done(reader_ProfileLogo.result);
                    };
                    reader_ProfileLogo.readAsDataURL(files_ProfileLogo[0]);
                }
            });

            $modalProfileLogo.on('shown.bs.modal', function() {
                cropper_ProfileLogo = new Cropper(image_ProfileLogo, {
                    aspectRatio: 3 / 1,
                    viewMode: 3,
                    preview:'.preview_ProfileLogo'
                });
            }).on('hidden.bs.modal', function(){
                cropper_ProfileLogo.destroy();
                cropper_ProfileLogo = null;
            });

            $('#crop_ProfileLogo').click(function(){
                canvas_ProfileLogo = cropper_ProfileLogo.getCroppedCanvas({
                    width:300,
                    height:100
                });

                canvas_ProfileLogo.toBlob(function(blob){
                    url = URL.createObjectURL(blob);
                    var reader_ProfileLogo = new FileReader();
                    reader_ProfileLogo.readAsDataURL(blob);
                    reader_ProfileLogo.onloadend = function(){
                        var base64data = reader_ProfileLogo.result;
                        $.ajax({
                            url:'uploadImgCustom.php',
                            method:'POST',
                            data:{imageProfileLogo:base64data, orgSlug:listingSlug},
                            success:function(data)
                            {
                                $modalProfileLogo.modal('hide');
                                $('#uploaded_image_ProfileLogo').attr('src', data);
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