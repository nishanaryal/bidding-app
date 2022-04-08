<?php

session_start();
$UserID = $_SESSION["userid"];
$baseURL = $_SERVER['SERVER_NAME'];
include_once("db-config.php");
global $mysqli;



if(isset($_POST['save_BusinessAbout']))
{
$aboutbusiness = $_POST['aboutbusiness'];
$listingSlug = $_POST['listingSlug'];

// $insertData= mysqli_query($mysqli,"INSERT INTO `about`(`aboutbusiness`) VALUES ('$aboutbusiness')");
$insertData= mysqli_query($mysqli,"UPDATE exhibitor_profile SET description = '$aboutbusiness' WHERE slug='$listingSlug'");

    if(!$insertData)
    {
        echo mysqli_error();
    }
header("Location:businesscontact.php?name=".$listingSlug);
}
// mysqli_close($mysqli); // Close connection




// Save Business Contact Info
if(isset($_POST['save_BusinessContact']))
{
$listingSlug = $_POST['listingSlug'];
$orgName = $_POST['orgname'];
$listingType = $_POST['listingType'];

// $insertData= mysqli_query($mysqli,"INSERT INTO `about`(`aboutbusiness`) VALUES ('$aboutbusiness')");
$businessEditData= mysqli_query($mysqli,"UPDATE exhibitor_profile SET orgname = '$orgName', listingType = '$listingType' WHERE slug='$listingSlug'");

    if(!$businessEditData)
    {
        echo mysqli_error();
    }
header("Location:businesscontact.php?name=".$listingSlug);
} 
// Save Business Contact Info