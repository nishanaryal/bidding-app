<?php $loggedInUserData = mysqli_query($mysqli,"SELECT * FROM user WHERE userid = '$userID'"); ?>


<?php while($loggedUser = mysqli_fetch_array($loggedInUserData))
{ ?>
<div class="Reveal-dashboard-navbar">
	<?php 
	// if(isset($user_image)){
	// 	$userImage = "upload/profile/".$user_image;
	// }
	// else{
	// 	$userImage = "assets/img/default-user.jpg";
	// }

	if(file_exists('upload/profile/'.$loggedUser['user_photo'])){
		$userImage = "upload/profile/".$loggedUser['user_photo'];
	}
	else{
		$userImage = "assets/img/default-user.jpg";
	}
	?>
	<div class="Reveal-d-user-avater">
		<img src="<?php echo $userImage; ?>" class="img-fluid avater" title="<?php echo $username; ?>" alt="<?php echo $username; ?>">
		<h4> <?php echo $loggedUser['name']; ?></h4>
		<!-- <h4><?php isset($user_fullname) ? $user_fullname: "Welcome"; ?></h4> -->
		<p class="badge badge-primary badge-lg"><?php echo $loggedUser['user_role']; ?></p><br>
		<span><i class="ti-envelope"></i> <?php echo $loggedUser['email']; ?></span>
	</div>
								
	<div class="Reveal-dash-navigation">
		<ul>
			<li class="active"><a href="user-profile.php"><i class="ti-dashboard"></i>Manage Profile</a></li>
			
            <?php if($loggedUser['user_role'] == "Seller") 
                echo "<li><a href='dashboard-photo.php?name=marsden-park-home'><i class='ti-user'></i>Manage Photo</a></li>";
            ?>

            <?php if($loggedUser['user_role'] == "Seller" || $loggedUser['user_role'] == "General / Buyer") 
                echo "<li><a href='user-kyc.php'><i class='ti-user'></i>KYC Details</a></li>";
            ?>

			<?php if($loggedUser['user_role'] == "Super Admin") 
				echo '<li><a href="confirm-biding-request.php"><i class="ti-layers-alt"></i>View Bidders</a></li>';
			?>
			<?php if($loggedUser['user_role'] == "Seller")
                echo "<li><a href='dashboard-mylistings.php'><i class='ti-layers-alt'></i>My Listing</a></li>";
				echo '<li><a href="product-bidders.php"><i class="ti-layers-alt"></i>View Bidders</a></li>';
			?>

            <?php if($loggedUser['user_role'] == "General / Buyer") 
				echo '<li><a href="product-bidders.php"><i class="ti-layers-alt"></i>My Biddings</a></li>';
			?>
										
			<li><a href="logout.php"><i class="ti-lock"></i>Logout</a></li>
		</ul>
	</div>						
</div>
	
<?php } ?>