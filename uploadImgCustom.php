<?php
session_start();
$UserID = $_SESSION["userid"];
$baseURL = $_SERVER['SERVER_NAME'];
include_once("db-config.php");
global $mysqli;

//upload.php

// Upload Profile Picture contactPerson_Img
if(isset($_POST['imageProfilePicture']))
{
	$listingSlug = $_POST['orgSlug'];
	$data_profilePicture = $_POST['imageProfilePicture'];

	$image_array_profilePicture_1 = explode(";", $data_profilePicture);

	$image_array_profilePicture_2 = explode(",", $image_array_profilePicture_1[1]);

	$data_profilePicture = base64_decode($image_array_profilePicture_2[1]);

	$image_name_profilePicture = time() . '.jpg';
	$image_location_profilePicture = 'upload/profile/' . $image_name_profilePicture;
	// $username = $_SESSION["email"];

	file_put_contents($image_location_profilePicture, $data_profilePicture);

	mysqli_query($mysqli, "UPDATE exhibitor_profile SET profile_photo='$image_name_profilePicture' WHERE slug='$listingSlug'");

	// $sql = "UPDATE users SET profile_coverImg='$image_name' WHERE email='$_SESSION["email"]'";

	echo $image_location_profilePicture;
}




// Upload Profile Logo
if(isset($_POST['imageProfileLogo']))
{
	$listingSlug = $_POST['orgSlug'];
	$data_profileLogo = $_POST['imageProfileLogo'];

	$image_array_profileLogo_1 = explode(";", $data_profileLogo);

	$image_array_profileLogo_2 = explode(",", $image_array_profileLogo_1[1]);

	$data_profileLogo = base64_decode($image_array_profileLogo_2[1]);

	$image_name_profileLogo = time() . '.jpg';
	$image_location_profileLogo =  'upload/logo/' . $image_name_profileLogo;
	$username = $_SESSION["email"];

	file_put_contents($image_location_profileLogo, $data_profileLogo);

	mysqli_query($mysqli, "UPDATE exhibitor_profile SET profile_logo='$image_name_profileLogo' WHERE slug='$listingSlug'");

	// $sql = "UPDATE users SET profile_coverImg='$image_name' WHERE email='$_SESSION["email"]'";

	echo $image_location_profileLogo;
}


// uPLOAD PROFILE COVER IMAGE
if(isset($_POST['image']))
{
	$listingSlug = $_POST['orgSlug'];
	$data = $_POST['image'];

	
	$image_array_1 = explode(";", $data);

	
	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$image_name = time() . '.jpg';
	$image_location =  'upload/cover/' . $image_name;
	$username = $_SESSION["email"];

	file_put_contents($image_location, $data);

	mysqli_query($mysqli, "UPDATE exhibitor_profile SET profile_coverImg='$image_name' WHERE slug='$listingSlug'");

	// $sql = "UPDATE users SET profile_coverImg='$image_name' WHERE email='$_SESSION["email"]'";

	echo $image_location;
}

?>