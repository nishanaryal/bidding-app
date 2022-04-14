<?php 
$username = isset($_SESSION["email"]) ?  $_SESSION["email"] : '';
$userID = isset($_SESSION["userid"]) ?  $_SESSION["userid"] : '';
$username = isset($_SESSION["username"]) ?  $_SESSION["username"] : 'Welcome';

$userFullName = isset($_SESSION["userFullName"]) ? $_SESSION["userFullName"] : 'Welcome';

$userImage = $_SESSION["userImage"];
$userRole = $_SESSION["userRole"];


?>


<?php 
include_once("db-config.php");
// $userID = $_SESSION["userid"];

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


function getLoggedInUserDetails(){
	global $mysqli;
	global $loggedUser_FullName;
	global $loggedUser_Username;
	global $loggedUser_Photo;
	global $loggedUser_Email;


   $userDetails = mysqli_query($mysqli, "SELECT * FROM user WHERE userid = '$userID'");

//    $rows = mysql_query($q);
// while($loggedUser = mysql_fetch_array($rows)) {
//    $loggedUser_FullName = $loggedUser['name'];
//    $loggedUser_Username = $loggedUser['username'];
//    $loggedUser_Photo = $loggedUser['user_photo'];
//    $loggedUser_Email = $loggedUser['email'];
// }
// echo $j;




  // Count the number of user/rows returned by query 
  $count = mysqli_num_rows($userDetails);
  if ($count > 0) {
  $userDetail = array();
  while( $row = mysqli_fetch_array( $userDetails, MYSQLI_ASSOC ) ) {
	  array_push( $userDetail, $row );
   }
   return $userDetail;
  }
}


function countCategoryListing1($categoryid){
	global $mysqli;
	$result = mysqli_query($mysqli, "SELECT COUNT(*) from categories WHERE categoryid = '$categoryid'");
	$count = mysqli_fetch_array($result);
	// $total = $count[0];

	return $result;
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




// $d = showNewCategories();
// var_dump($d);