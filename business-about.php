<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$username = $_SESSION["email"];
$orgSlug = (string)$_GET['name'];
$userData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");

// $queryData = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE slug = '$orgSlug'");
//$queryData = mysqli_query($mysqli,"insert into 'about' (aboutbusiness) values ('$aboutbusiness')");
// if(isset($_POST['submit']))
// {
    
// $aboutbusiness = $_POST['aboutbusiness'];

// $insert= mysqli_query($mysqli,"INSERT INTO `about`(`aboutbusiness`) VALUES ('$aboutbusiness')");

//     if(!$insert)
//     {
//         echo mysqli_error();
//     }
     

// }
// mysqli_close($mysqli); // Close connection


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
                                    
                                    <h4>About My Company</h4>
                                    
                                    <div class="submit-section" >
                                        <div class="form-row">
                                            <form method="POST" action="saveData.php">
                                            
                                            <div class="form-group col-md-12">
                                                <label>Details</label>
                                                <input type="text" name="listingSlug" id="listingSlug" value="<?php echo $orgSlug; ?>" hidden>
                                                <textarea type="text" id="aboutbusiness"name="aboutbusiness" cols="200" rows="20" class="form-control" ></textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                            <input type="submit" value="SAVE" name="save_BusinessAbout" id="save_BusinessAbout" class="btn btn-secondary" />
                                            <input name="" type="reset" value="Reset" class="btn btn-secondary" />
                                            </div>
                    </form>
                                        </div>
                                    </div>
                
                                    
                                </div>

                                
                                
                                <hr>

                                
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