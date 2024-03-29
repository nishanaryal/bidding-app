<?php

include_once("db-config.php");

global $mysqli;


// If form submitted, collect email and password from form
if (isset($_POST['member_login_submit'])) {
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($mysqli,$email);
  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($mysqli,$password);
  // echo $password;
 
	// $email    = $_POST['email'];
	// $password = $_POST['password'];

	// Check if a user exists with given username & password
	$result = mysqli_query($mysqli, "SELECT * FROM user
		where email='$email' and password='$password'");

	while($data = mysqli_fetch_array($result))
	{
		$userName = $data["username"];
		$userID = $data["userid"];
		$userFullname = $data["name"];
		$userImage = $data["user_image"];
		$user_role = $data["user_role"];


	// Count the number of user/rows returned by query 
	$user_matched = mysqli_num_rows($result);

	// var_dump($user_matched);

	// Check If user matched/exist, store user email in session and redirect to sample page-1
	if ($user_matched > 0) {
		session_start();
		$_SESSION["email"] = $email;
		$_SESSION["userid"] = $userID;
		$_SESSION["username"] = $userName;
		$_SESSION["password"] = $password;
		$_SESSION["userFullname"] = $userFullname;
		$_SESSION["userImage"] = $userImage;
		$_SESSION["user_role"] = $user_role;
		$_SESSION['logged_in'] = true;

		// Return to index.php after setting Session variables
		header("location: index.php");
	} else {
		echo "User email or password is not matched <br/><br/>";
		header("location: login.php");
	}

		}
}


?>