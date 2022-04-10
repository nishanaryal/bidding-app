
<?php include_once("db-config.php"); ?>
<?php 
// Start PHP session at the beginning 
global $mysqli;


// If form submitted, collect email and password from form
// if (isset($_POST['member_login_submit'])) {
//   $email = stripslashes($_POST['email']);
//   $email = mysqli_real_escape_string($mysqli,$email);
//   $password = stripslashes($_POST['password']);
//   $password = mysqli_real_escape_string($mysqli,$password);
 
// 	// $email    = $_POST['email'];
// 	// $password = $_POST['password'];

// 	// Check if a user exists with given username & password
// 	$result = mysqli_query($mysqli, "select 'email', 'password' from users
// 		where email='$email' and password='$password'");

// 	// Count the number of user/rows returned by query 
// 	$user_matched = mysqli_num_rows($result);

// 	// Check If user matched/exist, store user email in session and redirect to sample page-1
// 	if ($user_matched > 0) {

// 		$_SESSION["email"] = $email;
// 		$_SESSION["username"] = $email;
// 		$_SESSION['logged_in'] = true;
// 		header("location: index.php");
// 	} else {
// 		echo "User email or password is not matched <br/><br/>";
// 	}
// }


// $sql = "UPDATE persons SET email='peterparker_new@mail.com' WHERE id=1";




/*if(isset($_POST['logout_user_btn'])) {
	session_destroy();

	header('location:home-main.php');
}
*/

function BidClose_AnnounceWinner($propertyID)
{
if(isset($_POST['update_UserProfile']))
{
    
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Phone=$_POST['phone'];
    $Address=$_POST['address'];
    $DOB=$_POST['dob'];
    
     $updateUserData = mysqli_query($mysqli,"UPDATE user SET name='$Name',email='$Email',phone='$Phone', address='$Address', dob = '$DOB' where userid='$userID'");
    //  $query="UPDATE user SET name='$name',email='$Email',phone='$Phone', address='$Address' where username='$username'";
     
    if($updateUserData){
        echo "<script>alert('Update Successfully');</script>";
        header("Location:user-profile.php?id=".$userID."&&username=".$user);
    }
    if(!$updateUserData){
        echo mysqli_error();
        die('Error Occured: '.mysqli_error());
    }
    // else{
    //     die("Couldnot update the details");
    // }

    header("Location:user-profile.php?id=".$userID."&&username=".$user);
}
}



function countCategoryListing($categoryid){
	include_once("db-config.php");
	$result = mysqli_query($mysqli, "SELECT * from listing WHERE categoryid = '$categoryid'");
	$count = mysqli_fetch_array($result);
	$total = $count[0];

	return $total;
}
?>

<?php function getExhibitorBySlug($slug){

	 $exhibitorData = mysqli_query($mysqli, "select 'name', 'displayTitle', 'icon_image' from exhibitor_profile WHERE slug = '$slug'");

	// Count the number of user/rows returned by query 
	$exhibitor_result = mysqli_fetch_assoc($exhibitorData); 

	$count = mysqli_num_rows($exhibitorData);
	if ($count > 0) {
	$categories = array();
	while( $row = mysqli_fetch_array( $categoryList, MYSQLI_ASSOC ) ) {
		array_push( $categories, $row );
	 }
	 return $categories;
	}
}

?>

<?php function auto_copyright($year = 'auto'){ ?>
   <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
   <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
   <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
   <?php if(intval($year) > date('Y')){ echo date('Y'); } ?>
<?php } ?>