<?php
include_once("db-config.php");
include_once("functions.php");

$queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
	<?php include 'includes/header.php';?>

	<!-- JS Cropper  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
	<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
	<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
	<script src="https://unpkg.com/dropzone"></script>
	<script src="https://unpkg.com/cropperjs"></script>
	<!-- ./JS Cropper -->


	<!-- JS Cropper CSS -->
	<link rel="stylesheet" type="text/css" href="css/js-cropper.css">
	<!-- ./JS Cropper CSS -->
	
	<link rel="stylesheet" type="text/css" href="css/account-profile.css">
</head>


<body>
	<?php include 'includes/mega-menu.php'; ?>
	<div class="clearfix"></div>

	<!-- JS Cropper Demo -->
	<div class="container" align="center">
		<br>
		<div class="row">

			

			<div class="modal fade" id="ProfileLogomodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Profile Logo Crop Image Before Upload</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="img-container">
								<div class="row">
									<div class="col-md-8">
										<img src="" id="sample_image_ProfileLogo" />
									</div>
									<div class="col-md-4">
										<div class="preview_ProfileLogo"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="crop_ProfileLogo" class="btn btn-primary">Crop</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="ProfilePicturemodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Profile Picture Upload</h5>
							<button type="button" class="close" data-dismiss="ProfilePicturemodal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="img-container">
								<div class="row">
									<div class="col-md-8">
										<img src="" id="sample_image_ProfilePicture" />
									</div>
									<div class="col-md-4">
										<div class="preview_ProfilePicture"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="crop_ProfilePicture" class="btn btn-primary">Crop</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Crop Image Before Upload</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="img-container">
								<div class="row">
									<div class="col-md-8">
										<img src="" id="sample_image" />
									</div>
									<div class="col-md-4">
										<div class="preview"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="crop" class="btn btn-primary">Crop</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</body>
	</html>

	<!--ProfilePicture JS Cropper Implementation -->
	<script>
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
							url:'upload-img.php',
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
	</script>
	<!-- ./ProfilePicture JS Cropper Implementation -->



	<!--ProfileCover JS Cropper Implementation -->
	<script>
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
							url:'upload-img.php',
							method:'POST',
							data:{image:base64data},
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
	</script>
	<!-- ./ProfileCover JS Cropper Implementation -->


	<!--ProfileLogo JS Cropper Implementation -->
	<script>
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
							url:'upload-img.php',
							method:'POST',
							data:{imageProfileLogo:base64data},
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
	<!-- ./ProfileLogo JS Cropper Implementation -->







<?php while($data = mysqli_fetch_array($queryData))
{
	$default_ProfileLogo = ($data['profile_logo'] != '') ? 'upload/'. $data['profile_logo'] : 'images/logo-sample.png';
	$default_ProfilePicture = ($data['profile_photo'] != '') ? 'upload/'. $data['profile_photo'] : 'images/profile-profile-holder.png';
	$default_ProfileCover = ($data['profile_coverImg'] != '') ? 'upload/'. $data['profile_coverImg'] : 'images/cover-sample.jpg';

 ?>
	<!-- Begin  Content -->
	<div id="first_container" class="content-container fr-view">
		<div class="container" id="new-width">
			
			<!-- SideBar Col 3 -->
			<div class="col-xs-6 col-sm-3 col-md-3 nolpad member_sidebar">
				<div class="well member_admin_sidemenu" style="padding-top:10px;">
					<h4 style="text-transform: capitalize;word-wrap: break-word;" class="bold text-center">
					</h4>
					<a href="">
						<img src="<?php echo $default_ProfilePhoto; ?>" style="max-height:160px;" class="img-thumbnail center-block bmargin" title="<?php echo $data['name']; ?>" alt="<?php echo $data['name']; ?>">
					</a>
					<div class="clearfix"></div>
					<a href="exhibitor-main.php" style="" class="btn btn-primary btn-sm bold btn-block no-radius-bottom view-listing-link">
						View Public Listing
						<i class="fa fa-external-link fa-fw"></i>
					</a>
					<span class="module center-block fpad member-account-information text-center bmargin no-radius-top" style="padding-top:5px;">
						<span class="bold member-account-id">
						Member ID #68 </span>
						<br>
						<span class="small member-level-name">
						Plan: Practera </span>
						<p><?php echo $data['name']; ?></p>
					</span>
					<div class="panel-group sidemenu_panel" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading " role="tab" id="headingOne">
								<h4 class="panel-title">
									<a href="/account/home"><i class="fa fa-home"></i> My Dashboard</a>
								</h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingThree">
								<h4 class="panel-title">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<i class="fa fa-user-circle"></i> Manage Profile <i class="pull-right fa fa-caret-down"></i>
									</a>
								</h4>
							</div>
							<div class="clearfix"></div>
							<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
								<div>
									<a href="/account/contact" class="list-group-item ">–  Contact Details</a>
									<a href="/account/profile" class="list-group-item bold">–  Profile Photo</a>
									<a href="/account/resume" class="list-group-item ">–  Listing Details</a>
									<a href="/account/about" class="list-group-item ">–  About</a>
								</div>
							</div>
						</div>
						<div class="panel panel-default notifications">
							<div class="panel-heading" id="headingOne">
								<h4 class="panel-title">
									<a href="/account/leads">
										<i class="fa fa-folder-open"></i>
										Manage Leads
									</a>
								</h4>
							</div>
						</div>
						<hr class="vmargin">
						<div class="panel panel-default">
							<div class="panel-heading" id="heading-10">
								<h4 class="panel-title">
									<a href="/account/photo-albums/view">
										<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0"> 0 </span>
										<i class="fa fa-picture-o"></i>Featured  </a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" id="heading-11">
									<h4 class="panel-title">
										<a href="/account/products/view">
											<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0">0</span>
											<i class="fa fa-shopping-cart"></i>Products</a>
										</h4>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" id="heading-13">
										<h4 class="panel-title">
											<a href="/account/videos/view">
												<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0">0 </span>
												<i class="fa fa-video-camera"></i>Videos</a>
											</h4>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading" id="heading-7">
											<h4 class="panel-title">
												<a href="/account/coupons/view">
													<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0">0</span>
													<i class="fa fa-tag"></i> Coupons </a>
												</h4>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" id="heading-15">
												<h4 class="panel-title">
													<a href="/account/articles/view">
														<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0">0 </span>
														<i class="fa fa-pencil"></i>Member</a>
													</h4>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" id="heading-5">
													<h4 class="panel-title">
														<a href="/account/audio-files/view">
															<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0"> 0 </span>
															<i class="fa fa-soundcloud"></i> Audio</a>
														</h4>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" id="heading-14">
														<h4 class="panel-title">
															<a href="/account/blog/view">
																<span class="label img-circle weight-normal font-sm bg-default pull-right post-count-0">0 </span>
																<i class="fa fa-pencil"></i>Blog </a>
															</h4>
														</div>
													</div>
													<hr class="vmargin">
													<div class="panel panel-default">
														<div class="panel-heading" role="tab" id="headingFour">
															<h4 class="panel-title">
																<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
																	<i class="fa fa-cog"></i> Account <i class="pull-right fa fa-caret-down"></i>
																</a>
															</h4>
														</div>
														<div class="clearfix"></div>
														<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
															<div>
																<a href="" class="list-group-item ">–  Billing Information</a>
																<a href="" class="list-group-item ">–  Manage Account</a>
																<a href="" class="list-group-item change-password-sidebar ">–  Change Password</a>
																<a href="" class="list-group-item">–  Contact Us</a>
																<a href="" class="list-group-item">–  Logout</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- SideBar Col 3 -->

										<!-- MainContent Col 9 -->
										<div class="col-sm-12 col-md-9 norpad sm-nopad member_accounts">

											<ul class="nav nav-pills nav-justified bpad bmargin hidden-xs hidden-sm hidden-md setup-panel member_wizard2">
												<li class="incomplete"><a href="/account/contact"><i class="fa fa-exclamation-triangle"></i> Contact Details</a></li>
												<li class="active"><a href="/account/profile"><i class="fa fa-pencil"></i> Profile Photo</a></li>
												<li class="incomplete"><a href="/account/resume"><i class="fa fa-exclamation-triangle"></i> Listing Details</a></li>
												<li class="incomplete"><a href="/account/about"><i class="fa fa-exclamation-triangle"></i> About Me</a></li>
											</ul>
											<span class="dashboard_custom_h1">
											</span>                        
											<div role="tabpanel" class="account-menu-tabs">
												<ul role="tablist" class="nav nav-tabs">
													<li class="">
														<a href="/account/contact">Contact Details</a>
													</li>
													<li class="active">
														<a href="/account/profile">Profile Photo</a>
													</li>
													<li class="">
														<a href="/account/resume">Listing Details</a>
													</li>
													<li class="">
														<a href="/account/about">About</a>
													</li>
												</ul>
											</div>
											<div class="account-form-box">
												<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">
												<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
												<h3 class="photoUploadTitle">Upload Profile Photo &amp; Company Logo</h3>
												<div class="alert bg-primary fpad">
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
													<div class="col-md-6">
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
													</div>
												</div>
												

												<!-- COVER PHOTO CODE START -->
												<div class="row">
													<div class="col-md-12">
														<div class="current-cover-container well">
															<h3 class="text-center">Profile Cover Photo</h3>
															<p>Recommended Size: 1,100 pixels by 500 pixels</p>
															<div class="image_area">
																<form method="post">
																	<label for="upload_image">
																		<img src="<?php echo $default_ProfileCover; ?>" id="uploaded_image" class="img-responsive img-thumbnail" />
																		<div class="overlay">
																			<div class="text">Click to Change Cover Image</div>
																		</div>
																		<input type="file" name="image" class="image" id="upload_image" style="display:none" />
																	</label>
																</form>
															</div>

															<!-- <img class="bmargin" src="images/company-banner.jpg">
															<div class="clearfix"></div>
															<button class="btn btn-lg btn-primary change-current-cover">Change Cover</button>
															<button class="btn btn-lg btn-danger delete-current-image" data-imgtype="cover_photo">
																Delete Cover
															</button> -->
														</div>
													</div>
												</div>
												<!-- Cover Photo Modal -->
												

												<div class="next-step-container">
													<a href="/account/resume" class="btn btn-success btn-lg btn-block">
														Continue to Next Section
													</a>
												</div>
												<canvas id="profile_img_canvas" class="pre-process-canvas"></canvas>
												<canvas id="profile_social_canvas" class="pre-process-canvas"></canvas>
												<canvas id="profile_logo_canvas" class="pre-process-canvas"></canvas>
												<canvas id="profile_logo_social_canvas" class="pre-process-canvas"></canvas>
												<canvas id="profile_cover_canvas" class="pre-process-canvas"></canvas>
												<canvas id="profile_cover_social_canvas" class="pre-process-canvas"></canvas>
												<span data-usertoken="c7ae9ff8311f908467f2fbf53a1b2d64" id="usertokenspan"></span>

											</div>
											<div class="clearfix"></div>
										</div>

										<!-- MainContent Col 9 -->

									</div>
								</div>




								<!-- Footer Top -->
								<div class="footer-bar">
									<a href="" class="btn btn-info center-any">
										<div class="row">
											<div class="col-md-6">
												<h4>
													Stay informed about <br />
													new products and deals
												</h4>
											</div>

											<div class="col-md-6">
												<h4>Click to Subscribe</h4>
											</div>
										</div>
									</a>
								</div>
								<!-- Footer Top -->




								<!-- Include includes/footer.php -->
								<?php include 'includes/footer.php';?>


							</body>
							</html>

<?php
} ?>