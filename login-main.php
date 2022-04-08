<!-- Custom PHP Functions -->
<?php include_once("functions.php"); ?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
  <?php include 'includes/header.php'; ?>
</head>


<body>
  <?php include 'includes/mega-menu.php'; ?>

  
  <!-- Login Form -->
  <div id="first_container" class="content-container fr-view">
    <div class="container" id="new-width">
      <div class="clearfix body-content"></div>

      <div class="row">

        <div class="col-md-12">
          <link rel="stylesheet" href="/directory/cdn/bootstrap/validator/dist/css/bootstrapValidator.min.css">
          <style>
            .member-login-container:not(.modal .module) 
            {
              width: 555px;
              max-width: 100%;
              margin-left: auto;
              margin-right: auto;
              margin-bottom: 0;
              background-color: rgb(255, 255, 255) !important;
              border-color: rgb(247, 247, 247) !important;
              color: rgb(41, 41, 41) !important;
            }

            .login-register-tabs,
            .login-register-content {
              width: 555px !important;
              max-width: 100%;
              margin-left: auto !important;
              margin-right: auto !important;
              background-color: rgb(247, 247, 247);
            }

            .login-register-content {
              background: transparent;
              padding: 0;
              border: none;
            }

            .login-register-content h2,
            .login-register-content h2+hr,
            .login-register-content .account-menu-title {
              display: none !important;
            }

            .express_login_create_account_prefix hr {
              margin: 15px 0 10px;
            }

            .modal-content #containerFBLogin,
            .modal-content #containerGoogleLogin {
              margin: 15px 0;
            }

            /* CSS When Login Form and Express Registration Rendered in Sidebar */
            .col-md-3 .bd-chat-well-container,
            .col-md-4 .bd-chat-well-container {
              padding: 15px 10px;
            }

            .col-md-3 .bd-chat-center-text,
            .col-md-4 .bd-chat-center-text {
              margin: 0;
              font-size: 20px;
              padding: 0 15px;
            }

            .col-md-3 .member-login-page-container .login-register-tabs *,
            .col-md-4 .member-login-page-container .login-register-tabs * {
              font-size: 12px;
              line-height: 1.2em;
              vertical-align: bottom;
            }

            .col-md-3 .member-login-page-container .login-register-tabs a,
            .col-md-4 .member-login-page-container .login-register-tabs a {
              padding: 5px !important;
              height: 50px;
              vertical-align: middle;
              display: table-cell !important;
              width: 1%;
            }

            .col-md-3 .member-login-page-container .login-register-content,
            .col-md-4 .member-login-page-container .login-register-content {
              padding: 0;
            }

            .col-md-3 .member-login-container,
            .col-md-4 .member-login-container {
              padding: 15px !important;
              font-size: 13px;
            }

            .col-md-3 .member-login-page-container .input-lg,
            .col-md-4 .member-login-page-container .input-lg {
              height: 34px;
              padding: 6px 12px;
              font-size: 14px;
            }

            .col-md-3 .member-login-page-container .security_question_label,
            .col-md-4 .member-login-page-container .security_question_label {
              transform: scale(.85);
              margin: -1.15em -1.15em 0;
            }

            .col-md-3 #containerFBLogin,
            .col-md-4 #containerFBLogin,
            .col-md-3 #containerGoogleLogin,
            .col-md-4 #containerGoogleLogin,
            .col-md-3 .login-cta-buttons li,
            .col-md-4 .login-cta-buttons li {
              width: 100%;
              display: block;
              margin-top: 5px;
            }

            .col-md-3 .login-cta-buttons li,
            .col-md-4 .login-cta-buttons li {
              padding: 0
            }

            .col-md-3 .login-cta-buttons ul.nav,
            .col-md-4 .login-cta-buttons ul.nav {
              margin-top: -10px;
            }

            .col-md-3 #googleAction,
            .col-md-3 #facebookAction,
            .col-md-4 #googleAction,
            .col-md-4 #facebookAction {
              padding: 0;
              min-height: 0;
              font-size: 14px;
              margin: 0;
            }

            .col-md-3 #googleAction img,
            .col-md-3 #facebookAction img,
            .col-md-4 #googleAction img,
            .col-md-4 #facebookAction img {
              height: 36px !important;
              margin-right: 5px;
              position: relative !important;
              display: inline-block;
            }

            @media only screen and (max-width: 767px) {

              .col-md-3 .member-login-page-container .login-register-tabs a,
              .col-md-4 .member-login-page-container .login-register-tabs a {
                display: block !important;
                width: 100%;
                line-height: 40px;
              }
            }
          </style>
          <div class="row member-login-page-container">
            <div class="fpad-lg novpad">
              <div class="module fpad-xl member-login-container">
                <style type="text/css">
                  label span.required {
                    color: #B94A48;
                  }

                  span.help-inline,
                  span.help-block {
                    font-size: .9em;
                  }
                </style>
                <form action="login-main.php" id="member_login" method="POST">
                  <h2 class="nomargin">Exhibitor Login</h2>
                  <hr> <!-- Required Font-Family for Social Buttons -->
                  <a id="google-button" class="btn btn-block btn-social btn-google">
                    <i class="fa fa-google"></i> Sign in with Google
                  </a>
                  <link href="https://fonts.googleapis.com/css?family=Roboto:500&amp;display=swap" rel="stylesheet">
                  
                  <div class="clearfix"></div>
                  <hr class="social-login-hr">
                  <div class="form-group has-success">
                    <label class="vertical-label bd-email" for="email">
                      <span class="required">* </span>Email Address</label>
                      <input type="email" name="email" required="" placeholder="name@yoursite.com" class="form-control input-lg" id="email">
                    </div>
                    <div class="form-group has-success">
                      <label class="vertical-label bd-password" for="password">
                        <span class="required">* </span>Password
                      </label>
                      <input type="password" name="password" required="" placeholder="Enter Password"
                      class="form-control input-lg" id="password">
                    </div>
                    <span class="help-block bpad bmargin notmargin">Forgot your password? 
                      <a href="/login/retrieval">Click Here</a>
                    </span>
                    <div class="form-actions">
                      <input type="submit" value="Login Now" name="member_login_submit"
                      class="btn btn-primary btn-lg btn-block" id="member_login_submit">
                    </div>
                  </form>
                  
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>


        </div> <!-- Closes Row -->


        <div class="clearfix"></div>
      </div>
    </div>
    <!--  ./Login Form-->
    














    <div class="footer-bar">
      <a href="" class="btn btn-info center-any">
        <div class="row">
          <div class="col-md-6">
            <h4>
              Stay informed about <br />
              new products and deals
            </h4>
          </div>

          <div class="col-md-6">
            <h4>Click to Subscribe</h4>
          </div>
        </div>
      </a>
    </div>

  <!-- ./Login Page Section 
  
    <!-- Include includes/footer.php -->
    <?php include 'includes/footer.php';?>

    
  </body>

  </html>