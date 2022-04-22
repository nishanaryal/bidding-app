<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

// $username = $_SESSION["email"];
// $userID = $_SESSION["userid"];
// $user = $_SESSION["username"];
// $user_image = $_SESSION["user_image"];
// $user_fullname = $_SESSION["user_fullname"];
// $user_type = $_SESSION["user_type"];
// $user_role = $_SESSION["user_role"];


$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE userid = '$userID'");

$userProfile = mysqli_query($mysqli,"SELECT * FROM user WHERE username = '$userID'");
   
while($profileData = mysqli_fetch_array($userProfile));
{
    $name = $profileData['name'];
    // $username = $user['username'];
    $email = $profileData['email'];
    $phone = $profileData['phone'];
    $gender = $profileData['gender'];
    $address = $profileData['address'];
}

if(isset($_POST['update_UserProfile']))
{  
    $Name       =   $_POST['name'];
    $Email      =   $_POST['email'];
    $Phone      =   $_POST['phone'];
    $Address    =   $_POST['address'];
    $PermanentAddress=$_POST['permanent_address'];
    $DocType        =   $_POST['docType'];
    $DocumentNo     =   $_POST['documentNo'];
    // $Document=$_POST['document'];

    $DOB=$_POST['dob'];
    $ModifiedOn = Date('Y-m-d H:i:s');

    // Upload KYC Document
    $target_dir = "upload/profile/kyc/";

    // $data_DocumentFile = $_POST['document'];
    // $docs_array_1 = explode(";", $data_DocumentFile);

	// $docs_array_2 = explode(",", $docs_array_1[1]);

    // $data_DocumentFile = base64_decode($docs_array_2[1]);

	// $image_name_document = time() . '.jpg';
	// $image_location_document=  'upload/profile/kyc/' . $image_name_document;



    $documentUploadName = basename($_FILES["document"]["name"]);
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["document"])) {
    $check = getimagesize($_FILES["document"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }


  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["document"]["size"] > 500000) {
    echo "Sorry, your file is too large. Please try uploading smaller size file.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }




    // Upload KYC Document
    
     $updateUserData = mysqli_query($mysqli,"UPDATE user SET name='$Name',email='$Email',
                                    phone='$Phone', address='$Address', 
                                    dob = '$DOB', isActive = '1', 
                                    modifiedOn = '$ModifiedOn',
                                    address = '$Address',
                                    permanent_address = '$PermanentAddress',
                                    docType = '$DocType',
                                    documentNo = '$DocumentNo',
                                    document = '$documentUploadName'
                                    WHERE userid='$userID'");
    
    if($updateUserData){
        echo "<script>alert('Update Successfully');</script>";
        header("Location:user-profile.php?id=".$userID."&&username=".$user);
    }
    if(!$updateUserData){
        echo mysqli_error();
        die('Error Occured: '.mysqli_error());
    }

    header("Location:user-profile.php?id=".$userID."&&username=".$user);
}
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Manage Profile - Auction Nepal</title>
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
    
    <body class="blue-skin">
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
                    <?php while($user = mysqli_fetch_array($userData))
                    { ?>
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <?php include('includes/dashboard-UserProfileMenu.php'); ?>
                        </div>
                        
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div class="dashboard-wraper">
                            
                                <!-- Basic Information -->
                                <div class="form-submit">   
                                    <h4>User Profile Details</h4>
                                    <p><b>Last Modified On: </b> <?php echo date('D, jS M Y G:i A', strtotime($user['modifiedOn']));?> </p>
                                    <br>
                                    <div class="submit-section">
                                        <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-12">
                                                <label>User Name <span class="text-danger">*Please contact Administrator to change this.</span></label>
                                                <input type="text" name="username" id="username" class="form-control" disabled value="<?php echo $user['username'];?>" placeholder="User  Name">
                                                
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

                                            

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Temporary Address</label>
                                                <input type="address" value="<?php echo $user['address'];?>" id="address" name="address" class="form-control" placeholder="Eg. Sanepa Height, Lalitpur">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Permanent Address</label>
                                                <input type="permanent_address" value="<?php echo $user['permanent_address'];?>" id="permanent_address" name="permanent_address" class="form-control" placeholder="Eg. Sanepa Height, Lalitpur">
                                            </div>


                                            <div class="form-group col-md-4 col-lg-4">
                                                <label>Document Type</label>
                                                <select name="docType" id="docType" class="form-control combobox" required autocomplete="off">
                                                    <option value="Citizenship" selected="selected">Citizenship</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="PAN">PAN</option>
                                                    <option value="Company Registration Document">Company Registration Document</option>
                                                    <option value="None">Nonex`</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4 col-lg-4">
                                                <label>Identity No</label>
                                                
                                                <input type="text" id="documentNo" name="documentNo" value="<?php echo $user['documentNo'];?>" placeholder="Enter Identity No"class="form-control" />
                                            </div>

                                            <div class="form-group col-md-4 col-lg-4">
                                                <label>KYC Verification Document</label>
                                                <!-- <?php
                                                    if(file_exists("upload/profile/kyc/".$user['document'])){
                                                        echo "<a class='btn btn-sm' href='upload/profile/kyc/".$user['document'].">View Document</a>";
                                                    }
                                                ?> -->
                                                
                                                <input type="file" id="document" name="document" class="" />
                                            </div>



                                           
                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="update_UserProfile" id="update_UserProfile" class="btn btn-primary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-danger" />
                                            </div>


                                        </form>
                                    </div>
                                </div>

                                <hr>

                                <?php $default_ProfilePicture = ($user['user_photo'] != '') ? 'upload/profile/'. $user['user_photo'] : 'assets/img/profile-profile-holder.png'; ?>
                                <!-- Upload Profile Pic -->
                                <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">
								<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


								<h3 class="photoUploadTitle">Upload Profile Picture</h3>
								<div class="alert alert-primary">
									<b>ACCEPTED FORMATS:</b> JPG, GIF &amp; PNG
								</div>
								<div class="row">
									<div class="col-md-6">
									    <div class="current-photo-container well">
															
											<h3 class="text-center">Profile Picture</h3>
											<p>Recommended Size: 300 pixels by 300 pixels</p>
											<div class="image_area">
												<form method="post">
													<label for="upload_image_ProfilePicture">
														<img src="<?php echo $default_ProfilePicture; ?>" id="uploaded_image_ProfilePicture" />
														<div class="overlay">
															<div class="text">Click to Change Profile Picture</div>
															</div>
															<input type="file" name="imageProfilePicture" class="image" id="upload_image_ProfilePicture" style="display:none" />
													</label>
												</form>
											</div>
															
										</div>
									</div>
										<!-- <div class="col-md-6">
														<div class="current-logo-container well">
															<h3 class="text-center"> Profile Logo </h3>
															<p>Please Upload logo with Minimum Size: 300 pixels by 100 pixels</p>
															<div class="image_area">
																<form method="post">
																	<label for="upload_image_ProfileLogo">
																		<img src="<?php echo $default_ProfileLogo; ?>" id="uploaded_image_ProfileLogo" />
																		<div class="overlay">
																			<div class="text">Click to Change Profile Logo</div>
																		</div>
																		<input type="file" name="imageProfileLogo" class="image" id="upload_image_ProfileLogo" style="display:none" />
																	</label>
																</form>
															</div>
															
			
														</div>
									</div> -->
								</div>
                                <!-- ./Upload Profile Pic -->

                                
                            </div>
                        </div>
                        
                    </div>
                    <?php 
                    } ?>

                </div>
            </section>

            <?php include('includes/jsCropperImageUploader.php'); ?>
           
            
            <!-- Footer Start -->
            <?php include('includes/footer.php'); ?>
            <!-- Footer End -->

        </div>
        <!-- End Wrapper -->


        <!-- All Jquery -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/rangeslider.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/slider-bg.js"></script>
		<script src="assets/js/lightbox.js"></script> 
		<script src="assets/js/imagesloaded.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/counterup.min.js"></script>
		 
		<script src="assets/js/custom.js"></script>
		<script src="assets/js/auction.js"></script>
		
		<!-- This page plugins -->
		<script src="assets/js/jquery.countdown.min.js"></script>





        <!-- <script type="text/javascript" src="assets/js/jsCropperCustom.js"></script> -->

        <script>

        
            // ProfilePicture JS Cropper Implementation
        $(document).ready(function(){
            var $modalProfilePicture = $('#ProfilePicturemodal');
            var image_ProfilePicture = document.getElementById('sample_image_ProfilePicture');
            var cropper_ProfilePicture;
            $('#upload_image_ProfilePicture').change(function(event){
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

            $('#crop_ProfilePicture').click(function(){
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
                            data:{imageProfilePicture:base64dataProfilePicture},
                            success:function(data)
                            {
                                $modalProfilePicture.modal('hide');
                                $('#uploaded_image_ProfilePicture').attr('src', data);
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

    </body>
</html>