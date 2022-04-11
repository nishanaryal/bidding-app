<?php error_reporting(0); ?>
<?php include_once('func.php'); ?>
<?php $loggedInUserData = mysqli_query($mysqli,"SELECT * FROM user WHERE userid = '$userID'"); ?>



<div class="header header-dark">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="http://localhost/bidding-app/index.php">
								<img src="assets/img/logo-dark.png" class="logo hd-992" alt="" />
								<img src="assets/img/logo.png" class="logo sw-m" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;margin-left: 20%;">
							<ul class="nav-menu">
								<li><a href="index.php">Home</a></li>                   
								<li><a href="javascript:void(0);">Show Categories<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										
										<?php $cat = showNewCategories(); 
										foreach ($cat as $Catdata): ?>
											<li><a href="category.php?id=<?php echo $Catdata['categoryid']; ?>"><?php echo $Catdata['displayTitle']; ?></a></li>
										<?php endforeach; ?>

									</ul>
								</li>
								<li><a href="about-us.php">About Us</a></li>
								
							</ul>

							<ul class="nav-menu nav-menu-social align-to-right">
								<?php if (! empty($_SESSION['logged_in'])) { ?>
								<li class="attributes">
									<div class="btn-group account-drop">
										<button type="button" class="btn btn-order-by-filt theme-cl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<img src="assets/img/user.png" class="avater-img" alt=""><?php echo $_SESSION['username']; ?>
										</button>

										<?php while($loggedUser = mysqli_fetch_array($loggedInUserData))
										{ ?>
										<div class="dropdown-menu pull-right animated flipInX">
											<?php if($loggedUser['user_role'] == "Super Admin") 
												echo "<a href='admin/dashboard.php'><i class='ti-user'></i>Dashboard</a>";
											?>

											<?php if($loggedUser['user_role'] == "Seller" || $loggedUser['user_role'] == "General / Buyer")
												echo '<a href="user-profile.php"><i class="ti-user"></i>Manage Profile</a>';
												echo '<a href="dashboard-photo.php?name=marsden-park-home"><i class="ti-layers-alt"></i>Manage Photo</a>';
												echo '<a href="dashboard-mylistings.php"><i class="ti-layers-alt"></i>My Listings</a>'
											?>
												<a class="active" href="logout.php"><i class="ti-unlock"></i>Logout</a>
										</div>
										<?php } ?>

									</div>
								</li>
								 <?php } else { ?>
									<li>
									<a href="login.php">
										<i class="fa fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
									</a>
								</li>
								<li class="add-listing bg-whit">
									<a href="user-registration.php">
										 <i class="fas fa-plus-circle"></i> Register Now
									</a>
								</li>
								<?php } ?>

							</ul>
						</div>
					</nav>
				</div>
			</div>