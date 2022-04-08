<?php session_start() ?>


<?php 

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "auctionbid";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

?>



<!DOCTYPE html>
<html>

<head>

<title>Bidding System</title> 

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="CSS/Contact.css">
<style>
  div.Parallel {
      display:inline-block;
    }

    p {
      text-align:center;
    }


table 
{

 
    border-radius:20px;
  
   
}

h2
{
  
  margin:0% auto auto 15%;

   
}


 body {
 
font-family: Agency FB;
  background-image: url("Background/Contact.jpeg");

}
input {
    width: 150%;
    height:100%;
}

.modal-header
 {
     padding:9px 15px;
     border-bottom:1px solid #eee;
     background-color: #A9A9A9;
 }
.modal-footer
{
background-color: #A9A9A9;
}
.modal-body
{
 background-color: lightgray;
}
</style>

<script type="text/javascript">
  

  function validmessage()
  {
    var name=UserMessage.name;
    var email=UserMessage.email;
    var message=UserMessage.message;

    if(name.value=="")
    {
      alert("Need Your Name");
      name.focus();
    }
    if(email.value=="")
    {
      alert("Need Your Email");
      email.focus();
    }

  }

</script>
</head>
<div class="container-fluid">



<body>

<?php
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {


$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$seen="No";

$query="insert into ANotification values('$name','$email','$message','$seen')";

mysqli_query($connection,$query);



}
?>


<nav class="navbar navbar-inverse" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BiddingSystem.Com</a>
    </div>
    <ul class="nav navbar-nav" style="none">
      <li><a href="Home.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&nbsp&nbspProducts</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="Car.php"><b>Car</b></a></li>
          <li><a href="Bike.php"><b>Bike</b></a></li>
          <li><a href="Truck.php"><b>Truck</b></a></li>
        </ul>
		
      </li>
    
   

      <form class="navbar-form navbar-left" action="Search.php" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search" size="40">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
	
	  <ul class="nav navbar-nav navbar-right">
   <li><a href="About Project.php"><b>About site</b></a></li>
    <li class="active"><a href="Contact Us.php"><b>Contact Us</b></a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Login</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="UserLogin.php"><b>User Login</b></a></li>
          <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
        </ul>
      </li>
      <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>
     
    </ul>
  </div>
  
  
</nav>


<div class="container-fluid" style="height:1000px">
<div>

</h3>
</div>

<h3> If You have any question,comment or if you would like to contact with me please use the form , alternatively you can use one of the links below:</h3>
<br><br>







<div><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-success center-block">Click Here To Text Message</button></div>


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3  style="text-align: center;" class="modal-title" id="lineModalLabel">Send Your Message</h3>
    </div>
    <div class="modal-body">
      
            <!-- content goes here -->
      <form method="POST" name="UserMessage" onsubmit=" return  validmessage();">
             <div class="form-group">
                <label for="Name">Your Name</label>
                <input type="text" class="form-control" id="Name" name="name" placeholder="Enter Your Name">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Your Email">
              </div>
              <div class="form-group">
                <label for="Meggase">Text</label><br>
                <textarea rows="3" cols="68" name="message" placeholder="Enter Your Comment"></textarea><br />
              </div>
              
             <button type="submit" class="btn btn-info">Submit</button>
      </form>

    </div>
  
  </div>
  </div>
</div>

</body>
</html>

