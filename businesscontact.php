<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$orgSlug = (string)$_GET['name'];
$userData = mysqli_query($mysqli,"SELECT * FROM user WHERE email = '$username'");

$queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE slug = '$orgSlug'");

while($exhibitor = mysqli_fetch_array($queryData))
{
 $orgName = $exhibitor['orgname'];
 $orgEmail = $exhibitor['orgemail'];
$orgPhone = $exhibitor['orgphone'];
$focalPerson = $exhibitor['focalperson'];
$focalPersonPosition = $exhibitor['yourposition'];
$orgFullAddress = $exhibitor['fulladdress'];
$shortDescription = $exhibitor['shortdescription'];
$description = $exhibitor['description'];
 // $profilePic = ($user['profilepic'] == NULL) ? "upload/profile/$user['profilepic']" : "assets/img/user-1.png";
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Profile - ExpoTV Online</title>
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
                                    <h4>My Business Contact</h4>
                                    <div class="submit-section">
                                        <form method="POST" action="saveData.php">
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-12">
                                                <label>Business Contact Info</label>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Organization Name</label>
                                                <input type="text" name="orgname" id="orgname" class="form-control" value="<?php echo $orgName;?>" placeholder="Organization Name">
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
                                                class="form-control combobox" id="businessCategory">
                                                <option value="">(Select from List)</option>
                                                <option value="Bathroom">Bathroom</option>
                                                <option value="Bedroom">Bedroom</option>
                                                <option value="Building Materials">Building Materials</option>
                                                <option value="Design Services">Design Services</option>
                                                <option value="Dining Room">Dining Room</option>
                                                <option value="Doors & Windows">Doors & Windows</option>
                                                <option value="Finance & Legal Services">Finance & Legal Services</option>
                                                <option value="Flooring">Flooring</option>
                                                <option value="Furniture">Furniture</option>
                                                <option value="Gardening">Gardening</option>
                                                <option value="37">Heating & Cooling</option>
                                                <option value="15">Home Appliances</option>
                                                <option value="24">Home Builders</option>
                                                <option value="25">Home Entertainment</option>
                                                <option value="26">Home Security</option>
                                                <option value="32">Homemaker Centres</option>
                                                <option value="27">Kitchen</option>
                                                <option value="28">Lighting</option>
                                                <option value="29">Outdoor Living</option>
                                                <option value="30">Sustainable Homes</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 col-lg-12">
                                                <label>SLUG / URL <span>[Please contact Administrator to change this.]</span></label> 
                                                <input type="text" name="listingSlug" id="listingSlug" value="<?php echo $orgSlug; ?>" class="form-control">    
                                            </div>
                                            

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Focal Person</label>
                                                <input type="text" id="focalperson" name="focalperson" class="form-control" value="<?php echo $focalPerson;?>" placeholder="Focal Person">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Focal Person (Position)</label>
                                                <input type="text" value="<?php echo $focalPersonPosition;?>" id="yourposition" name="yourposition" class="form-control" placeholder="Focal Person">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label>Organization Email</label>
                                                <input type="text" name="orgemail" value="<?php echo $orgEmail;?>" id="orgemail" class="form-control" placeholder="Organization Email">
                                            </div>

                                            <div class="form-group col-md-6 col-lg-12">
                                                <label>Phone Number</label>
                                                <input type="text" name="orgphone" value="<?php echo $orgPhone;?>" id="orgphone" class="form-control" placeholder="phone">
                                            </div>

                                            <div class="form-group col-md-8 col-lg-12">
                                                <label>Short Description</label>
                                                <textarea name="shortdescription" id="shortdescription" cols="200" rows="10" class="form-control" >
                                                    <?php echo $shortdescription;?>
                                                </textarea>
                                            </div>

                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>Where Are You Located</label>
                                                <input type="text" class="form-control" placeholder="Enter a location:350 Fifth Avenue, New York, NY 10118" value="<?php echo $orgFullAddress;?>">
                                            </div>
                                            <div class='clear clearfix'></div>

                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>Address Line 1</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group col-md-12 col-lg-12">
                                                <label>Address Line 2</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group col-md-12 col-lg-6">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group col-md-12 col-lg-6">
                                                <label>State</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group col-md-12 col-lg-6">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group col-md-12 col-lg-6">
                                                <label>Enter Postal Code</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>

                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="save_BusinessContact" id="save_BusinessContact" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>


                                        </form>
                                    </div>
                                </div>

                                <hr>
                                <!-- Social form starts here-->
                                <div class="form-submit">   
                                    <h4>Social Accounts</h4>
                                    <div class="submit-section">
                                        <div class="form-row">
                                        
                                            <div class="form-group col-md-6">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" value="https://facebook.com/">
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Twitter</label>
                                                <input type="email" class="form-control" value="https://twitter.com/">
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Google Plus</label>
                                                <input type="text" class="form-control" value="https://googleplus.com/">
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>LinkedIn</label>
                                                <input type="text" class="form-control" value="https://linkedin.com/">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Blog</label>
                                                <input type="text" class="form-control" value="https://blog.com/">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Pinterest</label>
                                                <input type="text" class="form-control" value="https://pinterest.com/">
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="submit-aboutDesc" id="submit-aboutDesc" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-submit">
                                    <h4>About Business</h4>
                                    
                                    <div class="submit-section" >
                                        <div class="form-row">
                                            <form method="POST" action="saveData.php"> 
                                                <div class="form-group col-md-12">
                                                    <label>Details</label>
                                                    <input type="text" name="listingSlug" id="listingSlug" value="<?php echo $orgSlug; ?>" hidden>
                                                    <textarea type="text" id="aboutbusiness"name="aboutbusiness" cols="200" rows="20" class="form-control" >
                                                        <?php echo $description;?>
                                                    </textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                <input type="submit" value="SAVE" name="save_BusinessAbout" id="save_BusinessAbout" class="btn btn-secondary" />
                                                <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                        
                    </div>
                    <?php 
                    } ?>

                </div>
            </section>

            <?php include('includes/jsCropperImageUploader.php'); ?>


            <!-- ============================ Dashboard End ================================== -->
            
            <!-- ============================ Call To Action Start ================================== -->
            <?php include('includes/call-to-action.php'); ?>
            <!-- ============================ Call To Action End ================================== -->
            
            <!-- ============================ Footer Start ================================== -->
            <?php include('includes/footer.php'); ?>
            <!-- ============================ Footer End ================================== -->
            
            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

            

        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->

        <?php include('includes/dashboard-footerJS.php'); ?>

        <!-- <script type="text/javascript" src="../assets/js/jsCropperCustom.js"></script> -->

        <script>

        var listingSlug = "<?php echo $orgSlug; ?>";
        var orgSlug;

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
                            data:{imageProfilePicture:base64dataProfilePicture, orgSlug:listingSlug},
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