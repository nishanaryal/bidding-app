
<?php
session_start();
include_once("db-config.php");
include_once("functions.php");
include_once("func.php");


// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// $username = $_SESSION["email"];


// $username = $_SESSION["email"];
// global $mysqli;

// $queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");

?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <?php include 'includes/header.php';?>  
  </head>
  
  <body class="blue-skin">
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
      <!-- Top header  -->


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

	   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "auctionbid";
      $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
             $id=$_GET['bid'];
       $price=$_POST['category'];
       $buyer=$_SESSION['uname'];

      $qry="select * from Product where ProductID='$id'";
      $Rslt=mysqli_query($connection,$qry);

      $rw=mysqli_fetch_array($Rslt);

      $postbuyer=$rw['Buyer'];
      $productname=$rw['ProductName'];

      $message=$postbuyer." Someone Bid heigher than your Bid price on product".$productname.'! , You Can Bid Again This Product ';

      $insert="insert into Notification values('$postbuyer','$message','No')";
       mysqli_query($connection,$insert);


       $query="update Product set Price='$price',Buyer='$buyer' where ProductID='$id'";

       mysqli_query($connection,$query);

       header('Location:Bidding.php');



 }
 
?>

<?php

  

if(isset($_GET['bid']))
{

	 $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "auctionbid";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
	 $uname= $_SESSION['uname'];
        $id=$_GET['bid'];


    $query="select * from Product where ProductID ='$id'";

     $Result=mysqli_query($connection,$query);
     
     $row=mysqli_fetch_array($Result);

    $Buyer=$row['UserName'];

    if($Buyer==$uname)
    {
    	echo"<script>alert('This Is Your Product, You Can Not Bid Your Own Product');</script>";

    }
    else
    {
      echo '<a href="Bidding.php"> <img src="Image/back.jpg"  width="80px" height="80px"  alt="Bid" /> </a>';
      
    $qry="select * from Product where ProductID ='$id'";

     $Result=mysqli_query($connection,$qry);

     $row=mysqli_fetch_array($Result);

    $Price=$row['Price'];

    $price1=$Price+100;
    $price2=$Price+300;
    $price3=$Price+500;
    $query="select * from product where ProductID='$id'";
    $Result=mysqli_query($connection,$query);
    $break=0;

    $row=mysqli_fetch_array($Result);
   echo'<table align="center">';
    echo'<td>';
     echo"<img src='".$row['Image']."' width='350px' height='250px'>";
    echo'</td>';
    echo'<td>';

    echo "<h3>";
    echo $row['ProductName'];
    echo "</h3>";

     echo $row['Description'];
     echo "<br>";
     echo "<b>";
      echo "Corrent Price: ";
    echo $row['Price'];
    echo "</b>";
     echo "<br><br>";
   echo'</table>';
   

    echo ' 
   <p id="heading">Choose Your Price</p>
<center>
<form method="POST" name="categoryForm"  onsubmit="return validform();">
<br><div align="center">

 <select name="category" id="category" onchange="fetch_select(this.value);">
 
  <option>'.$price1.'</option>
  <option>'.$price2.'</option>
  <option>'.$price3.'</option>
 </select><br>

</div>   
</center>
<p style=" margin: -2.7% 10% 10% 62%">
<button type="submit" class="btn btn-primary">Bid Now</button>
</form>
';

    }
    
}
?>

<!-- ============================ Footer Start ==== -->
      <?php include('includes/footer.php'); ?>
      <!-- ============================ Footer End === -->

      <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

      

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
    <script src="assets/js/auction.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->





  </body>

<!-- Mirrored from codeminifier.com/reveal-live/reveal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Jul 2021 10:35:29 GMT -->
</html>