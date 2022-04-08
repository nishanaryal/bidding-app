<?php 

$featuredCategories = mysqli_query($mysqli,"SELECT * FROM categories WHERE isActive = 1");

?>

			<!-- ============================ Listing Ctegory Start  -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">	
								<h2>Categories</h2>
								<h3>Featured & New <span class="theme-cl">category</span></h3>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="owl-carousel owl-theme" id="lists-slide">
							
							<!-- Single List -->
							<?php while($featuredCategory = mysqli_fetch_array($featuredCategories))
				{ ?>
							<div class="list-slide-box">
								<a class="Reveal-moderns-category" href="category.php?id=<?php echo $featuredCategory['categoryid']; ?>">
									<figure>
										 <img src="upload/category/<?php echo $featuredCategory['featuredImage']; ?>" title="store" alt="store">
										 <figcaption class="overlay-bg">
											<div class="cat-box">
												<div class="cat-info">
													<h4 class="cat-name"><?php echo $featuredCategory['displayTitle']; ?></h4>
													<span class="badge badge-pill theme-bg">View Category</span>
												</div>
											</div>
										</figcaption>
									</figure>
								</a>
							</div>
							<?php
				} ?>
							

							
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Listing Category End ================================== -->