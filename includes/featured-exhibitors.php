<?php 

$featuredExhibitors = mysqli_query($mysqli,"SELECT * FROM exhibitor_profile WHERE isFeatured = 1");

?>
<!-- ================= Explore Places ================= -->
			<section class="gray">
				<div class="container">
				
					<!-- Row -->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h3>FEATURED <span class="theme-cl"> Sellers</span></h3>
							</div>
						</div>
					</div>
					<!-- Row -->
					
					<div class="row">

						<?php while($featuredExhibitor = mysqli_fetch_array($featuredExhibitors))
				{ ?>						
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="Reveal-grid-item classical-list">
								<div class="image">
									<a href="listing.php?name=<?php echo $featuredExhibitor['slug']; ?>" class="Reveal-featured-listing-thumb">
										<img src="upload/cover/<?php echo $featuredExhibitor['profile_coverImg']; ?>" alt="latest property" class="img-responsive">
									</a>
									<!-- <div class="Reveal-listing-price-info"> 
										<span class="pricetag">Estd: <?php echo $featuredExhibitor['establisheddate']; ?></span>
									</div> -->
									<a href="#" class="tag_t"><i class="ti-heart"></i>Save</a>								
								</div>
								
								<div class="proerty_content">
									<!-- <div class="author-avater">
										<img src="upload/logo/<?php echo $featuredExhibitor['profile_logo']; ?>" class="author-avater-img" alt="">
									</div> -->
									<div class="list-rates">
										<i class="fa fa-star filled"></i>	
										<i class="fa fa-star filled"></i>	
										<i class="fa fa-star filled"></i>	
										<i class="fa fa-star filled"></i>	
										<i class="fa fa-star"></i>	
									</div>
									<div class="proerty_text">
									  <h3 class="captlize"><a href="listing.php?name=<?php echo $featuredExhibitor['slug']; ?>"><?php echo $featuredExhibitor['orgname']; ?></a></h3>
									</div>
									<p class="property_add"><?php echo $featuredExhibitor['listingType']; ?></p>
									<div class="property_meta"> 
									  <div class="list-fx-features">
											<div class="listing-card-info-icon">
												<span class="inc-fleat inc-add"><?php echo $featuredExhibitor['fulladdress']; ?></span>
											</div>
											<div class="listing-card-info-icon">
												<span class="inc-fleat inc-call"><?php echo $featuredExhibitor['orgphone']; ?></span>
											</div>
										</div>  
									</div>
								</div>
								
								<div class="Reveal-listing-footer-info">
									<div class="m-listing-status">
										<a href="listing.php?name=<?php echo $featuredExhibitor['slug']; ?>"> <span class="l-status l-open"><?php echo $featuredExhibitor['website']; ?></span> </a>
									</div>
								</div>
								
							</div>
						</div>
						<?php
				} ?>
					
					</div>
					
					<!-- Row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 text-center">
							<a href="" class="btn btn-light btn-md rounded">Explore More Listings</a>
						</div>
					</div>
					<!-- Row -->
					
				</div>	
			</section>
			<!-- ================================= Explore Property =============================== -->

