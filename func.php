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

