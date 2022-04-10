<div class="Reveal-dashboard-navbar">
								<?php 
								if(isset($user_image)){
									$userImage = "upload/profile/".$user_image;
								}
								else{
									$userImage = "assets/img/default-user.jpg";
								}
								
								?>
								<div class="Reveal-d-user-avater">
									<img src="<?php echo $userImage; ?>" class="img-fluid avater" title="<?php echo $username; ?>" alt="<?php echo $username; ?>">
									<h4> <?php echo $user['name']; ?></h4>
									<!-- <h4><?php isset($user_fullname) ? $user_fullname: "Welcome"; ?></h4> -->
									<p class="badge badge-primary badge-lg"><?php echo $user_type; ?></p><br>
									<span><i class="ti-envelope"></i> <?php echo $username; ?></span>
								</div>
								
								<div class="Reveal-dash-navigation">
									<ul>
										<li class="active"><a href="user-profile.php"><i class="ti-dashboard"></i>Manage Profile</a></li>
										<li><a href="dashboard-photo.php?name=marsden-park-home"><i class="ti-user"></i>Manage Photo</a></li>
										<li><a href="dashboard-mylistings.php"><i class="ti-layers-alt"></i>My Listing</a></li>

										<?php if($user_role == "admin") 
											echo '<li><a href="confirm-biding-request.php"><i class="ti-layers-alt"></i>View Bidders</a></li>';
										?>
										<?php if($user_role == "seller") 
											echo '<li><a href="product-bidders.php"><i class="ti-layers-alt"></i>View Bidders</a></li>';
										?>
										
										
										<li><a href="logout.php"><i class="ti-lock"></i>Logout</a></li>
									</ul>
								</div>
								
							</div>