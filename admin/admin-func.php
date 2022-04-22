<?php
session_start();
include_once("../db-config.php");
include_once("../functions.php");
include_once("../func.php");


// Delete Product
if(isset($_GET['delete-pid']))
{
    $pid=$_GET['delete-pid'];

    $deleteProduct = mysqli_query($mysqli,"DELETE FROM products WHERE productid = '$pid'");
        // alert("Product ID : " . $pid);
        header('Location:dashboard.php');
}
// Delete Product


// Delete User
if(isset($_GET['delete-userid']))
{
    $deluserID=$_GET['delete-userid'];

    $deleteUser = mysqli_query($mysqli,"DELETE FROM user WHERE userid = '$deluserID'");
        header('Location:dashboard.php');
}
// Delete User


// Make Bidder WIN
// makeBidderWin
// Make Bidder WIN

// Update UserProfile
if(isset($_POST['update_UserProfile']))
{   
    $refUserID = $_POST['refUserID'];
    $Name=$_POST['name'];
    $UserName=$_POST['username'];
    $Email=$_POST['email'];
    $Phone=$_POST['phone'];
    $Address=$_POST['address'];
    $UserRole=$_POST['user_role'];
    $Gender=$_POST['gender'];
    $DOB=$_POST['dob'];
    
    try{
    $updateUserData = mysqli_query($mysqli,"UPDATE user SET name='$Name', 
                                    username='$UserName', 
                                    email='$Email', phone='$Phone', 
                                    address='$Address', dob = '$DOB',
                                    user_role = '$UserRole', gender = '$Gender'
                                    WHERE userid='$refUserID'");

        

        if(!$updateUserData){
            echo("Error description: " . $mysqli -> error);
            header("Location:users-list.php");
        }
        if($updateUserData){
            echo "<script>alert('Update Successfully');</script>";
            header("Location:users-list.php");
        }

    
    }
    catch (exception $e) {
        if(!$updateUserData){
            echo("Error description: " . $mysqli -> error);
            header("Location:users-list.php");
        }
        echo "<script>alert('Error Occured while updating User. Error description: ' . $mysqli -> error);</script>";
    }


    finally {
        header('Location:users-list.php');
    }
}


?>