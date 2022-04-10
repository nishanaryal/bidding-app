<?php 
$featuredProducts = mysqli_query($mysqli,"SELECT * FROM products WHERE isFeatured = 1");
 ?>
<!-- FeaturedProducts -->
<section class="gray">
    <div class="container">        
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h3>FEATURED <span class="theme-cl"> AUCTIONS</span></h3>
                </div>
            </div>
        </div>
        <!-- Row -->

        <div class="row">
        <!--  Single Listing -->
                                <?php while($featuredProduct = mysqli_fetch_array($featuredProducts))
                                { ?>
                                    <?php

                                    $datenow = date("Y-m-d H:i:s");
                                    $auction_startDate = $featuredProduct['auction_start'];
                                    $auction_endDate = $featuredProduct['auction_end'];
                                    $bidBtnTxt = '';
                                    $BidMsg = "";
                                    $biddingTime = "";

                                    if($auction_endDate >= $datenow) { 
                                        $BidMsg = "<div class='listing-badge now-open'>Running</div>";
                                        $bidBtnTxt = "BID NOW";
                                        $biddingTime = "<p class='badge badge-info'><b>Bidding Expires in </b><span data-countdown=".$auction_endDate."></span><p>";
                                    }

                                    if($auction_endDate < $datenow) {
                                        $BidMsg = "<div class='listing-badge now-close'>Expired</div>";
                                        $bidBtnTxt = "READ MORE";
                                        $biddingTime = "<span class='badge badge-danger'><b>Bidding Expired in </b>".$auction_endDate. "<span>";
                                    }

                                    if($auction_startDate >= $datenow) { 
                                        $BidMsg = "<div class='listing-badge now-open'>Opening Soon</div>";
                                        $bidBtnTxt = "READ MORE";
                                        $biddingTime = "<span class='badge badge-primary'><b>Bidding Starts in </b><div data-countdown=".$auction_endDate."></div><span>";
                                    }

                                    ?>

                                    


                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="Reveal-verticle-list listing-shot">
                                            <?php echo $BidMsg; ?>

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
                                                                    <span class="inc-fleat inc-check"><b>Starting from </b>Rs. <?php echo $featuredProduct['base_price']; ?></span>
                                                                    <?php echo $biddingTime; ?>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <?php if($featuredProduct['allowBidding'] == "yes") { ?>
                                                            <a href="javascript:bid('<?php echo $featuredProduct['slug']; ?>', <?php echo $featuredProduct['productid']; ?>)" class="btn btn-primary"><?php echo $bidBtnTxt; ?>
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