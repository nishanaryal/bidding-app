<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");

// $username = $_SESSION["email"];
// $queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");

global $mysqli;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <?php include 'includes/header.php';?> 
	</head>
	
	<body class="blue-skin">

		<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "auctionbid";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);

         $fullname     =$_POST['fullname'];
         $username    =$_POST['username'];
         $password =$_POST['password'];
         $email    =$_POST['email'];
         $phone    =$_POST['phone'];
         $dob      =$_POST['dob'];
         $gender   =$_POST['gender'];
         $address  =$_POST['address'];
         $user_role  =$_POST['user_role'];


         $pic_destination = $_FILES['image']['name'];
         $filename    = $_FILES['image']['tmp_name'];  

         move_uploaded_file($filename, "upload/profile/".$pic_destination);

         $query="INSERT INTO user (name,username,password,email,phone,gender,dob,address,user_photo,user_role) values('$fullname','$username','$password','$email','$phone','$gender','$dob','$address','$pic_destination','$user_role')";
		 $query="INSERT INTO user (name,username,password,email,phone,gender,dob,address,user_photo,user_role) values('$fullname','$username','$password','$email','$phone','$gender','$dob','$address','$pic_destination','$user_role')";
         $ret= mysqli_query($connection,$query);
      
        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        header("location: index.php");
        echo '</script>';
      } 

?>


		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">
		
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			<!-- Start Navigation -->
			<?php include 'includes/navigation.php'; ?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Login Start================================== -->
			<section class="gray">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-10">
							<div class="loving-modern-login">
                        
                               <div class="text-center mb-4"><img src="assets/img/logo.png" class="img-fluid" alt="" /></div>
								<div class="row main_login_form">
									<div class="login_form_dm">
										<form method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
						
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Full Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fullname" id="fullname"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>
					    <div class="form-group">
							<label  class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your User Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label  class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label  class="cols-sm-2 control-label">Email Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label  class="cols-sm-2 control-label">Phone No</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-mobile fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone"  placeholder="Enter your Phone Number"/>
								</div>
							</div>
						</div>
							

                        <div class="form-group">
							<label  class="cols-sm-2 control-label">Date of Birth</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="dob" placeholder="Date of Birth" />
								</div>
							</div>
						</div>

                        <div class="form-group">
							<label  class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="address" placeholder="Your Address" value="Kathmandu" />
								</div>
							</div>
						</div>
                           <div class="form-group">
							<label  class="cols-sm-2 control-label">Your Gender</label>
							<div class="cols-sm-10">
								<select class="form-control" id="gender" name="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								
							</div>
						</div>
						  <div class="form-group">
							<label class="cols-sm-2 control-label">Your Profile Picture</label>
							<div class="cols-sm-10">
								<div class="input-group">
								
									<input type="file" name="image">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label  class="cols-sm-2 control-label">User Type</label>
							<div class="cols-sm-10">
								<select class="form-control" name="user_role" id="user_role">
									<option value="Seller">Seller</option>
									<option value="Buyer / General">Buyer / General</option>
								</select>
								
							</div>
						</div>


						<div class="form-group ">
							<input  type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">
						</div>
						
					</form>
									</div>
								</div>
                                        
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Login End ================================== -->
			
			<!-- Call To Action Start -->
			<?php include('includes/call-to-action.php'); ?>
			<!-- Call To Action End -->
			
			<!-- ============================ Footer Start ================================== -->
			<?php include('includes/footer.php'); ?>
			<!-- ============================ Footer End ================================== -->


		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/rangeslider.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/slider-bg.js"></script>
		<script src="assets/js/lightbox.js"></script> 
		<script src="assets/js/imagesloaded.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/counterup.min.js"></script>
		 
		<script src="assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->


		<script type="text/javascript">
	function RegisterValid()
	{
    var fullname     = Registerform.fullname;
    var username    = Registerform.username;
    var password = Registerform.password;
    var email    = Registerform.email;
    var phone    = Registerform.phone;
    var dob      = Registerform.dob;
    var gender   = Registerform.gender;
    var address  = Registerform.address;
    var user_role = Registerform.user_role;


    if (fullname.value == "")
    {
        window.alert("Please enter your name.");
        Name.focus();
        return false;
    }

    // if (!/^[a-zA-Z]*$/g.test(Name.value)) {
    //     alert("Invalid Characters For Name");
    //     Name.focus();
    //     return false;
    // }

    if (username.value == "")
    {
        window.alert("Please enter your username.");
        Uname.focus();
        return false;
    }
    if (password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

     if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 10)
    {
        window.alert("Please  your telephone number must be 10 digit.");
        phone.focus();
        return false;
    }

    if (dob.value == "")
    {
        window.alert("Please Date of Birth.");
        dob.focus();
        return false;
    }
    if (address.value == "")
    {
        window.alert("Please provide Your Address");
        address.focus();
        return false;
    }

    if (gender.value == "")
    {
        window.alert("Please provide Gender.");
        gender.focus();
        return false;
    }

    return true;
}

 
	function validateCaseSensitiveEmail(email) 
	{ 
	var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	if (reg.test(email)){
	return true; 
	}
	else{
	return false;
	} 
	} 
	</script>
	</body>
</html>