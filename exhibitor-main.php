<?php


include_once("functions.php");


$queryData = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$username'");


?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<?php include 'includes/header.php';?>
</head>


<body>
  
<?php include 'includes/mega-menu.php'; ?>

<div class="clearfix"></div>


<!-- Begin  Content -->
<?php while($data = mysqli_fetch_array($queryData))
{ ?>
<section class="container">
  <div class="layered-image">
    <img class="image-exhibitor" src="upload/<?php echo $data['profile_logo']; ?>" alt="<?php echo $data['name']; ?>" title="<?php echo $data['name']; ?>" />
    <img class="image-base" src="upload/<?php echo $data['profile_coverImg']; ?>" alt="<?php echo $data['name']; ?>" title="<?php echo $data['name']; ?>"/>
    <img class="image-overlay" src="images/booth-1.png" alt="<?php echo $data['name']; ?>" />
  </div>
</section>

<?php
} ?>

<!-- <?php mysqli_close($mysqli); // Close connection ?> -->

<style type="text/css">
  .layered-image {
    position: relative;
  }
  .layered-image img {
  /*height: 200px;
  width: 300px;*/
}
.image-overlay {
  position: absolute;
  top: 0px;
  height: 582px;
  left: 0px;
  opacity: 1
}
.image-base{
  background-repeat: no-repeat;
  padding: 8% 16% 0 15%;
  height: 515px;
  background-size: contain;
}
.image-exhibitor{
  top: 4%;
  left: 10em;
  position: absolute;
  height: 55px !important;
  z-index: 99;
}
</style>



<section class="about-cat-sec" style="position: relative; margin-top: 8%;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="cat-title text-center text-primary">Marsden Park Home </h1>
        <h3 class=" tmargin quotes_box text-center">
          Continuing To Provide Products and Services For our Local Community
        </h3>

        <p>At Marsden Park Home, we&rsquo;re responding to the changing environment and at this time we will be open 10 am to 5 pm daily. Some stores are operating alternate hours while others have temporarily closed.</p>

        <p>Please <a href="">check here</a> for details by retailer.</p>

        <p>The safety of our customers, retail partners, and team are our first priority and we want you to know that our retailers are practicing safe social distancing measures within their stores.</p>

        <p>We remain committed to keeping you informed through our website as further changes affect our Centre community.</p>

        <p>If you&rsquo;re looking for information about stores that remain open for walk-in trade, please <a href="https://marsdenparkhome.com.au/open/">click here</a>.</p>

        <p>If you&rsquo;re looking for information about stores that are trading via online direct delivery, click and collect, by appointment, or by phone order with either contactless pick-up or delivery, please <a href="https://marsdenparkhome.com.au/online/">click here</a>.</p>

        <p>In compliance with Government and Health Authority advice on social distancing, and in response to customer needs at this time &ndash; many services have changed. This includes the closure of gathering spaces like playgrounds, rest areas, and eating areas, and reducing access to public amenities during certain times.</p>

        
      </div>
    </div> 
  </div> 
</section>
<!-- End Content -->
<div class="clearfix clearfix-lg footer-clear-element"></div>



<div class="footer">
  <div class="container">
    <div class="row">
      <ul class="footer_menu sm-text-center">
        <li class='col-md-3'>
         <a href='' id='link479'  class='head'>About EXPOTV</a>
         <ul>
          <li class=''><a href='' id='link475'  class='head'>How It Works</a></li>
          <li class=''><a href='' id='link478'  class='head'>FAQ</a></li>
          <li class=''><a href='' id='link504'  class='head'>Blog</a></li>
          <li class=''><a href='' id='link480'  class='head'>Contact Us</a></li>
        </ul>
      </li>
      <li class='col-md-3'>
       <a href='' id='link503'  class='head'>Marketing Platform</a>
       <ul>
        <li class=''><a href='' id='link477'  class='head'>Be Discovered</a></li>
        <li class=''><a href='' id='link482'  class='head'>Why Exhibit Online</a></li>
        <li class=''><a href='' id='link476'  class='head'>How To Exhibit</a></li>
      </ul>
    </li>
    <li class='col-md-3'>
     <span id='link159'  class='head' title='Visit Category Listings'> Popular Categories</span>
     <ul>
      <li class=''><a href='' id='link160'>Home Entertainment</a></li>
      <li class=''><a href='' id='link232'>Home Builders</a></li>
      <li class=''><a href='' id='link243'>Furniture</a></li>
      <li class=''><a href='' id='link242'>Kitchen</a></li>
      <li class=''><a href='' id='link328'>Bathrooms</a></li>
      <li class=''><a href='' id='link342'>Doors and Windows</a></li>
      <li class=''><a href='' id='link469'>Sustainable Home</a></li>
      <li class=''><a href='' id='link471'>Home Security</a></li>
      <li class=''><a href='' id='link473'>Flooring</a></li>
      <li class=''><a href='' id='link470'>Outdoor Living</a></li>
    </ul>
  </li>
  <li class='col-md-3'>
   <span id='link165'  class='head'> Coming Soon</span>
   <ul>
    <li class=''><a href='' id='link240'>Holiday & Travel Expo</a></li>
    <li class=''><a href='' id='link256'>Business to Business Expo</a></li>
    <li class=''><a href='' id='link241'>Wedding Expo</a></li>
    <li class=''><a href='' id='link257'>Wealth Expo</a></li>
    <li class=''><a href='' id='link258'>Healthy Living Expo</a></li>
    <li class=''><a href='' id='link259'>Technology Expo</a></li>
    <li class=''><a href='' id='link260'>Car Buyers Expo</a></li>
    <li class=''><a href='' id='link261'>Parenting Expo</a></li>
    <li class=''><a href='' id='link262'>Food & Wine Expo</a></li>
    <li class=''><a href='' id='link263'>Fashion Expo</a></li>
  </ul>
</li>
<li class='col-md-5 vpad vmargin sm-text-center'>
 <span id='link211'>
  <div itemscope itemtype="http://schema.org/WebSite">
   <meta itemprop="name" content="EXPOTV Online Exhibitions" id="sitename">
   <link href="" itemprop="url" id="sitelink">
   <div class="list-social-links">
    <a class="network-icon contact" href="" title="Contact Us EXPOTV Online Exhibitions">
      <i class="fa fa-envelope"></i>
    </a> 
    <a class="network-icon facebook" itemprop="sameAs" href="" target="_blank" title="EXPOTV Online Exhibitions Facebook">
      <i class="fa fa-facebook"></i>
    </a>
    <a class="network-icon linkedin" itemprop="sameAs" href="" target="_blank" title="EXPOTV Online Exhibitions LinkedIn">
      <i class="fa fa-linkedin"></i>
    </a>
    <div class="clearfix"></div>
  </div>
</div>
</span>
</li>
<li class='col-md-6 col-md-offset-1 vpad vmargin'><a href='/join' id='link212'  class='btn btn_footer_get_listed btn-lg btn-block bold center sm-block' style='white-space:normal'>EVERY BUSINESS NEEDS AN ONLINE EXHIBITION STAND!   CREATE YOUR STAND NOW »</a></li>
</ul>
</div>
<div class="col-md-12 fpad fmargin small text-center footer_terms">
 &copy; 2021	<a title="EXPOTV Online Exhibitions" href="/">
 EXPOTV Online Exhibitions	</a> 
 All Rights Reserved.
 <div class="inline-block">
  <a title="Terms of Use - EXPOTV Online Exhibitions" href="/about/terms">
   Terms of Use
 </a> 
 |
 <a title="Privacy Policy - EXPOTV Online Exhibitions" href="/about/privacy">
   Privacy Policy
 </a>
</div>
</div>
</div>
</div>

<div class="myModal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="modal-title text-center">
          <button type="button" class="close center-block" data-dismiss="modal">&times;</button>Upgrade Required
        </h2>
        <br>
        <a href="/account/upgrade" target="_blank" class="btn btn-lg btn-success btn-block">Upgrade Membership Level to Use This Feature</a>
      </div>
    </div>
  </div>
</div>


<a href="#" class="scrollup"><i class="fa fa-caret-up"></i></a>



<script src="https://npmcdn.comimagesloaded@4.1imagesloaded.pkgd.min.js"></script>

<script src="directory/cdn/bootstrap/formvalidation/current/dist/js/framework/bootstrap.min.js"></script>



    <!--[if lt IE 9]>
    <script defer src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script defer src="/directory/cdn/bootstrap/select2/master/js/respond.min.js"></script> -->


    <div class="modal fade" id="newsletter_subscribe_modal" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="container-fluid">
        <div class="row">
         <div class="col-md-12">
          <br>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <h3 class="nomargin">
           Stay informed about new products and deals
         </h3>
         <hr>
         <div class="newsletter_modal_form_container">
           <form action="" id="newsletter" method="post" labelwidth="100" labelpaddingtop="0.5em" enctype="multipart/form-data" form_action_type="widget" form_action_div=".newsletter_modal_form_container" return_data_type="" name="newsletter_modal_signup" class=" ">
            <input type="hidden" name="sized" value="0" id="newsletter-element-0"/>
            <input type="hidden" name="form" value="myform" id="newsletter-element-1"/>
            <input type="hidden" name="formname" value="newsletter_modal_signup" id="newsletter-element-2"/>
            <input type="hidden" name="dowiz" value="1" id="newsletter-element-3"/>
            <input type="hidden" name="save" value="1" id="newsletter-element-4"/>
            <input type="hidden" name="action" autocomplete="off" value="subscribe" id="newsletter-element-5"/><div class="form-group">
              <input type="text" name="first_name" placeholder="Name" autocomplete="off" value class="form-control control-group  form-control " id="newsletter-element-6"/>
            </div>
            <div class="form-group">
              <input type="email" name="email" required placeholder="Enter email address" autocomplete="off" value class="form-control control-group form-control" id="newsletter-element-7"/>
            </div>
            <div class="form-group security_question_label">
              <div id="newsletter-captchaContainer" class="control-group">
                <div class="g-recaptcha"  id="newsletter-google-recaptcha">

                </div>
              </div>
              <small class="help-block" id="recaptcha_error" style="display:none;" data-fv-validator="notEmpty" data-fv-for="recaptcha" data-fv-result="INVALID" />The security check was not completed successfully.</small>
              <div class="clearfix bmargin">

              </div>
              <input type="hidden" name="recaptcha" id="newsletter-rcap">
            </div>

            <input type="text" id="bd_hpc" name="bd_hpc" value=""/>
            <div class="form-actions">
              <input type="submit" value="Subscribe Now" name class="btn btn-success btn-block btn-lg  bold " id="newsletter-element-11"/>
            </div>
          </form>
        </div>                      
        <br>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script defer src="directory/cdn/assets/bootstrap/js/websiteScripts.js"></script>
<!-- <script defer src="js/custom.js"></script> -->

<script>
// Get the video
var video = document.getElementById("myVideo");

// Get the button
var btn = document.getElementById("myBtn");

// Pause and play the video, and change the button text
function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>


</body>
</html>