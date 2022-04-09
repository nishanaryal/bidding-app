<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

$search = (string)$_GET['s'];

// $query="select * from Product where ProductName like '%".$search."%' OR categoryName like '%".$search."%' ";

$searchQuery = mysqli_query($mysqli,"SELECT * FROM products WHERE name like '%".$search."%' OR description like '%".$search."%' ");


?>

<!DOCTYPE html>
<html lang="zxx">
	<head>
	  <?php include 'includes/header.php';?>  
	</head>
	
	<body class="blue-skin">
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">
		
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			<!-- Start Navigation -->
			<?php include 'includes/navigation.php'; ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- Top header  -->
			

			

			<!-- Search products -->

<!-- FeaturedProducts -->
<section class="gray">
    <div class="container">        
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h3>Search <span class="theme-cl"> Results</span></h3>
                    <h4 class="text-center">
                        Showing searches for Keyword: <?php echo $search; ?>
                    </h4>
                </div>
            </div>
        </div>
        <!-- Row -->

        <div class="row">
        <!--  Single Listing -->
                                <?php while($featuredProduct = mysqli_fetch_array($searchQuery))
                                { ?>
                                    <?php

                                    $datenow = date("Y-m-d");
                                    $auction_startDate = $featuredProduct['auction_start'];
                                    $auction_endDate = $featuredProduct['auction_end'];

                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="Reveal-verticle-list listing-shot">
                                            <?php if($auction_endDate >= $datenow) { ?>
                                                <div class="listing-badge now-open">Running</div>
                                            <?php } ?>

                                            <?php if($auction_endDate < $datenow) { ?>
                                                <div class="listing-badge now-close">Expired</div>
                                            <?php } ?>

                                            <?php if($auction_startDate >= $datenow) { ?>
                                                <div class="listing-badge now-open">Opening Soon</div>
                                            <?php } ?>



                                            <div class="Reveal-signle-item">
                                                <a class="listing-item" href="products.php?name=<?php echo $featuredProduct['slug']; ?>&bid=<?php echo $featuredProduct['productid']; ?>">
                                                    <div class="listing-items">
                                                        <div class="listing-shot-img">
                                                            <img src="upload/products/<?php echo $featuredProduct['photo']; ?>" class="img-responsive" alt="" />
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="Reveal-verticle-listing-caption">
                                                    <a href="products.php?name=<?php echo $featuredProduct['slug']; ?>&bid=<?php echo $featuredProduct['productid']; ?>" class="like-listing"></a>

                                                    

                                                    <div class="Reveal-listing-shot-caption">
                                                        <h4><a href="products.php?name=<?php echo $featuredProduct['slug']; ?>&bid=<?php echo $featuredProduct['productid']; ?>"><?php echo $featuredProduct['name']; ?></a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>

                                                        <div class="property_meta"> 
                                                          <div class="list-fx-features">
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-check"><b>Ends at </b> <?php echo $featuredProduct['auction_end']; ?></span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-check"><b>Starting from </b>Rs. <?php echo $featuredProduct['base_price']; ?></span>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <?php if($featuredProduct['allowBidding'] == "yes") { ?>
                                                            <a href="javascript:bid('<?php echo $featuredProduct['slug']; ?>', <?php echo $featuredProduct['productid']; ?>)" class="btn btn-primary">BID NOW
                                                            </a>
                                                        <?php } ?>

                                                        
                                                        <!-- <a href="products.php?name=<?php echo $featuredProduct['slug']; ?>" class="btn btn-primary">READ MORE
                                                        </a> -->

                                                        
                                                        <!-- <p class="Reveal-short-descr">
                                                            <?php echo substr($featuredProduct['shortdescription'], 0, 160); ?></p> -->
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <?php
                                } ?>        
                            </div>
                        </div>
                    </section>
                    
                            <!-- FeaturedProducts -->
			
			<!-- Search Products -->


			
			<!-- ============================ Footer Start ==== -->
			<?php include('includes/footer.php'); ?>
			<!-- ============================ Footer End === -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
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
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->





	</body>

<!-- Mirrored from codeminifier.com/reveal-live/reveal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Jul 2021 10:35:29 GMT -->
</html>