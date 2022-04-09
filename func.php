<?php 
include_once("db-config.php"); 


function countCategoryListing1($categoryid){
	global $mysqli;
	$result = mysqli_query($mysqli, "SELECT COUNT(*) from categories WHERE categoryid = '$categoryid'");
	$count = mysqli_fetch_array($result);
	// $total = $count[0];

	return $result;
}

function showCategories1(){
 	 global $mysqli;
	 $categoryList = mysqli_query($mysqli, "SELECT * FROM categories WHERE isActive = 1");


	// Count the number of user/rows returned by query 
	$count = mysqli_num_rows($categoryList);
	if ($count > 0) {
	$categories = array();
	while( $row = mysqli_fetch_array( $categoryList, MYSQLI_ASSOC ) ) {
		array_push( $categories, $row );
	 }

	 return $categories;
	}
}

function showBidders(){
	global $mysqli;
	$biddersData = mysqli_query($mysqli,"SELECT
	products.name AS productName,
	products.slug,
	products.productid,
	products.base_price,
	user.name AS bidderName,
	bidders.amount AS biddingAmount,
	bidders.bid_time AS biddingTime
	FROM products
	JOIN bidders
		ON products.productid = bidders.product_id
	JOIN user
		ON user.userid = bidders.user_id");

	$count = mysqli_num_rows($biddersData);
	if ($count > 0) {
		$biddersData = array();
		while( $row = mysqli_fetch_array( $categoryList, MYSQLI_ASSOC ) ) {
			array_push( $biddersData, $row );
	}

	return $biddersData;
	}
}


function showNewCategories(){
 	 global $mysqli;
	 $categoryList = mysqli_query($mysqli, "SELECT * FROM categories WHERE isActive = 1");


	// Count the number of user/rows returned by query 
	$count = mysqli_num_rows($categoryList);
	if ($count > 0) {
	$categories = array();
	while( $row = mysqli_fetch_array( $categoryList, MYSQLI_ASSOC ) ) {
		array_push( $categories, $row );
	 }

	 return $categories;
	}
}

// $d = showNewCategories();
// var_dump($d);