<div class="header header-light">
				<div class="container-fluid">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="assets/img/logo.png" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li><a href="javascript:void(0);">Home<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="index.html">Home Style 1</a></li>                                    
										<li><a href="home-2.html">Home Style 2</a></li>                                    
										<li><a href="home-3.html">Home Style 3</a></li> 
										<li><a href="home-4.html">Home Style 4</a></li> 
										<li><a href="home-5.html">Home Style 5</a></li><li><a href="home-6.html">Home Style 6</a></li> 
										<li><a href="Map.html">Home Map</a></li> 
									</ul>
								</li>
								
								<li><a href="javascript:void(0);">Explore<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="events.html">All Events</a></li>
										<li><a href="hotels.html">Find Hotels</a></li>
										<li><a href="adventures.html">Find Adventures</a></li>		
										<li><a href="booking.html">Booking Page</a></li>
										<li><a href="dashboard.html">User Dashboard</a></li>
										<li><a href="add-listing.html">Submit Listing</a></li> 
									</ul>
								</li>
								
								<li><a href="javascript:void(0);">Listings<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="javascript:void(0);">List Layouts<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="list-layout-with-sidebar.html">With Sadebar</a></li>
												<li><a href="list-layout-full-width.html">Full Width</a></li>										
												<li><a href="list-layout-with-map.html">With Map</a></li> 
											</ul>
										</li>
										<li><a href="javascript:void(0);">Grid Layouts<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu" style="display: none;">
												<li><a href="grid-with-sidebar.html">With Sidebar</a></li>                                    
												<li><a href="grid-full-width.html">With Full Width</a></li>                                    
												<li><a href="grid-with-map.html">With Map</a></li> 
											</ul>
										</li>
										<li><a href="javascript:void(0);">Half Map Screen<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="half-map-with-list-layout.html">With List Layout</a></li>                                    
												<li><a href="half-map-with-grid-layout.html">With Grid Layout</a></li>                                    
												<li><a href="half-map-with-grid2-layout.html">With Grid Layout 2</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);">Single Listing<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="single-listing-1.html">Single Listing 1</a></li>                                    
												<li><a href="single-listing-2.html">Single Listing 2</a></li>                                    
												<li><a href="single-listing-3.html">Single Listing 3</a></li>
											</ul>
										</li>
									</ul>
								</li>
								
								<li class="active"><a href="javascript:void(0);">Pages<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-detail.html">Blog Detail</a></li>	
										<li><a href="pricing.html">Pricing Page</a></li>	
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="component.html">Component</a></li>
										<li><a href="404.html">Error Page</a></li>
										<li><a href="login.html">LogIn</a></li>
										<li><a href="register.html">SignUp</a></li>
									</ul>
								</li>
								
								<li><a href="contact.html">Contacts</a></li>
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								
								<li class="attributes">
									<?php if (! empty($_SESSION['logged_in'])) { ?>
										<div class="btn-group account-drop">
										<button type="button" class="btn btn-order-by-filt theme-cl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<img src="../assets/img/user-1.png" class="avater-img" alt=""><?php echo $_SESSION["username"]; ?> 
										</button>
										<div class="dropdown-menu pull-right animated flipInX">
											<a href="dashboard-mylistings.php"><i class="ti-dashboard"></i>Dashboard</a>
											<a href="dashboard-mylistings.php"><i class="ti-layers-alt"></i>My Listing</a>
											<a href=""><i class="ti-user"></i>My Profile</a>                                  
											<a href=""><i class="ti-layers"></i>My Exhibitor Stand</a>            
											<a class="active" href="">
												<form method="POST" action="functions.php">
													<input type="submit" value="LOG OUT" name="logout_user_btn" id="logout_user_btn">
												</form>
											</a>
										</div>
									</div>
									<?php } ?>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>