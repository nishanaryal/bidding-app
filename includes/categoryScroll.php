<?php 

$queryData = mysqli_query($mysqli,"SELECT * FROM categories WHERE isActive = 1");

?>

<?php include_once('func.php'); ?>

<section class="half light gray">
	<div class="container">

		<div class="row">
			<div class="owl-carousel owl-theme" id="categorie-slide">

				<?php $c = showNewCategories(); 
					foreach ($c as $data): ?>
						<div class="Reveal-cats-box">
							<a href="category.php?id=<?php echo $data['categoryid']; ?>" class="Reveal-category-box">
								<div class="category-desc">
									<div class="category-icon">
										<img src="upload/icons/<?php echo $data['icon_image']; ?>" style="height:80px;width:80px;display: block;margin-left: auto;margin-right: auto; width: 50%;">
									</div>

									<div class="Reveal-category-detail category-desc-text">
										<h4><?php echo $data['displayTitle']; ?></h4>
										<p> View Listings</p>
									</div>
								</div>
							</a>    
						</div>
					<?php endforeach; ?>
			


		

			</div>
		</div>

	</div>
</section>