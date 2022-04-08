<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");

$username = $_SESSION["email"];
$UserID = $_SESSION["userid"];

$message = "";

// $slug = (string)$_GET['name'];
$pid = (string)$_GET['pid'];

// $orgSlug = (string)$_GET['name'];
$productDetails = mysqli_query($mysqli,"SELECT * FROM products WHERE productid = '$pid'");

// $queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE userid = '$UserID'");


while($product = mysqli_fetch_array($productDetails))
{
 $productid = $product['productid'];
 $name = $product['name'];
 $base_price = $product['base_price'];
$photo = $product['photo'];
$slug = $product['slug'];
$shortdescription = $product['shortdescription'];
$description = $product['description'];
$features = $product['features'];
$additional_info = $product['additional_info'];
$exhibitorid = $product['exhibitorid'];
$categoryid = $product['categoryid'];
$isFeatured = $product['isFeatured'];
$auction_start = $product['auction_start'];
$auction_end = $product['auction_end'];
 // $profilePic = ($user['profilepic'] == NULL) ? "upload/profile/$user['profilepic']" : "assets/img/user-1.png";
}



// Edit Products
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$productName = $_POST['name'];
	$product_base_price = $_POST['base_price'];
	$product_photo = $_POST['photo'];
	$product_slug = $_POST['slug'];
	$product_shortdescription = $_POST['shortdescription'];
	$product_description = $_POST['description'];
	$product_features = $_POST['features'];
	$product_additional_info = $_POST['additional_info'];

	$product_exhibitorid = $_POST['exhibitorid'];
	$product_categoryid = $_POST['categoryid'];
	$product_isFeatured = $_POST['isFeatured'];
	$product_auction_start = $_POST['auction_start'];
	$product_auction_end = $_POST['auction_end'];






// $insertData= mysqli_query($mysqli,"INSERT INTO `bidders`('product_id','user_id', 'amount', 'isWin') VALUES ('$propertyID', '$UserID', '$bidAmount', '0')");

if($productid == NULL)
{
	try{
	$insertData= mysqli_query($mysqli,"INSERT INTO `products` (`productid`, `name`, `photo`, `slug`, `shortdescription`, `description`, `features`, `additional_info`, `exhibitorid`, `categoryid`, `isActive`, `isFeatured`, `auction_start`, `auction_end`, `base_price`) VALUES (NULL, '$name', '$photo', '$slug', '$shortdescription', '$description', '$features', '$additional_info', '$exhibitorid', '$categoryid', '$isActive', '$isFeatured', '$auction_start', '$auction_end', '$base_price'");


	}
	catch (Exception $e)
	{
		$message = 'Unable to add new product.' + $e;
		throw new Exception( 'Unable to save details. Please try again later.',0,$e);
	}
}
else
{
	try{
	$updateData= mysqli_query($mysqli,"UPDATE bidders SET
				-- productid = '$productid',
				name = '$name',
				base_price = '$base_price',
				photo= '$photo',
				slug = '$slug',
				shortdescription = '$shortdescription',
				features = '$features) 
				WHERE productid ='$productid'
			 ");
	}
	catch (Exception $e)
	{
		$message = 'Unable to Edit file' + $e;
		throw new Exception( 'Unable to upload file',0,$e);
	}
}

// $biddingData= mysqli_query($mysqli,"UPDATE bidders SET product_id = '$propertyID', user_id = '$UserID', amount = '$bidAmount'  WHERE slug='$listingSlug'");

    if(!$insertData)
    {
        echo mysqli_error();
    }
header("Location:product-edit.php?pid=".$pid);
} 
// Save Business Contact Info


// Edit Products

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Edit Products - Auction Nepal</title>
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
		<!-- Preloader - style you can find in spinners.css -->
		<!-- <div id="preloader"><div class="preloader"><span></span><span></span></div></div> -->
		

		<!-- Main wrapper - style you can find in pages.scss -->
		<div id="main-wrapper">

			<!-- Start Navigation -->
			<?php include('../includes/navigation.php') ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
		
			
			<!-- ============================ Dashboard Start ================================== -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						
						
						<div class="col-lg-3 col-md-4 col-sm-12">
							<?php include('../includes/dashboard-admin.php');	?>
						</div>
						
						
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-wraper">
                            
                                <!-- Basic Information -->
                                <div class="form-submit">   
                                    <h4>Product Details</h4>
                                    <p>
                                    	<?php echo $message; ?>
                                    </p>
                                    <div class="submit-section">
                                        <form method="POST" id="ProductDetails">
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-12">
                                                <label>Business Contact Info</label>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Product Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $name;?>" placeholder="Product Name">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Type Of Listing</label>
                                                <select name="listingType" id="listingType" class="form-control combobox" required autocomplete="off">
                                                    <option value="Company" selected="selected">Company / Organization</option>
                                                    <option value="Individual">Personal / Individual</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Best Describes you</label>
                                                <select name="businessCategory" required autocomplete="off"
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

                                            <div class="form-group col-md-6 col-lg-12">
                                                <label>SLUG / URL <span>[Please contact Administrator to change this.]</span></label> 
                                                <input type="text" name="listingSlug" id="slug" value="<?php echo $slug; ?>" class="form-control">    
                                            </div>                                      

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Short Description</label>
                                                <textarea name="shortdescription" id="shortdescription" cols="200" rows="10" class="form-control" >
                                                    <?php echo $shortdescription;?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Product Description</label>
                                                <textarea name="shortdescription" id="description" cols="200" rows="10" class="form-control" >
                                                    <?php echo $description;?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Features</label>
                                                <textarea name="features" id="features" cols="200" rows="10" class="form-control" >
                                                    <?php echo $features;?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Additional Info</label>
                                                <textarea name="additional_info" id="additional_info" cols="200" rows="10" class="form-control" >
                                                    <?php echo $additional_info;?>
                                                </textarea>
                                            </div>



                                            
                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="save_BusinessContact" id="save_BusinessContact" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>


                                        </form>
                                    </div>
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