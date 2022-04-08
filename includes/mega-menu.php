<div class="header">
    <div class="container">
      <div class="row vmargin">
        <div id="website_logo" class="col-md-5 tpad sm-text-center">
          <a href="" title="">
            <img src="../images/logo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-7 text-right sm-text-center header-right-container nolpad xs-hpad">
          <div class="col-md-12 vmargin sm-nomargin pull-right nohpad sm-text-center logged-in-member-header">
              <?php if (! empty($_SESSION['logged_in'])) { ?>
              
              <form method="POST" action="functions.php">
                <p> Welcome <?php echo $_SESSION["email"]; ?></p>
              <a href="exhibitor-main.php" class="btn btn-md btn-primary">
                <i class="fa fa-eye"></i> View Exhibitor's Stand
              </a>
              <a href="account-profile.php" class="btn btn-md btn-warning">Dashboard</a>
               <input type="submit" value="LOG OUT" name="logout_user_btn" id="logout_user_btn" class="btn btn-md btn-info">
              </form>
              
              <?php } else { ?>
                <a href="register.php" class="btn btn-md btn-warning">Register as Exhibitor</a>
              <a href="login-main.php" class="btn btn-md btn-warning">Login</a>
              <?php } ?>

          </div>
          <div class="clearfix"></div>

          <div class="clearfix"></div>
          <form action="/search_results" name="frm1" class="form-inline website-search">
            <div class="input-group input-group-sm bmargin sm-autosuggest">
              <span class="input-group-addon hidden-md"><i class="fa fa-search"></i></span>
              <input type="text" placeholder="Name or Keyword" value="" name="q"
                class=" member_search form-control input-sm" autocomplete="off">
            </div>
            <input type="submit" value="Search" class="btn btn-sm btn_search bmargin xs-btn-block bold">
          </form>
        </div>
      </div>
    </div>
    <div class="mobile-main-menu">
      <ul class="sidebar-nav">
        <li class='col-md-4'><span id='link487'> </span></li>
        <li class='col-md-2' style="floatright" style="floatright">
          <span id='link231' target='_blank'> Home Show Categories ▾</span>
          <ul>
            <li class=''>
              <a href='/home-appliances' id='link234' title='Sydney Home and Garden Ex'>Home Appliances</a>
              <ul>
                <li class=''><a href='/home-appliances/whitegoods' id='link439'>Whitegoods</a></li>
                <li class=''><a href='/home-appliances/cooktops' id='link440'>Cooktops</a></li>
                <li class=''><a href='/home-appliances/ovens' id='link441'>Ovens</a></li>
              </ul>
            </li>
            <li class=''><a href='/kitchen' id='link276'>Kitchen</a></li>
            <li class=''><a href='/heating-cooling' id='link434' title='Sydney Home and Garden Ex'>Heating & Cooling</a>
            </li>
            <li class=''><a href='/gardening' id='link435' title='Sydney Home and Garden Ex'>Gardening</a></li>
            <li class=''><a href='/dining-room' id='link436'>Dining Room</a></li>
            <li class=''><a href='/bathroom' id='link244'>Bathroom</a></li>
            <li class=''><a href='/bedroom' id='link236' title='Family Events'>Bedroom</a></li>
            <li class=''><a href='/building-materials' id='link245'>Building Materials</a></li>
            <li class=''>
              <a href='/design-services' id='link237'>Design Services</a>
              <ul>
                <li class=''><a href='/architects' id='link304'>Architects</a></li>
              </ul>
            </li>
            <li class=''><a href='/doors-windows' id='link246'>Doors & Windows</a></li>
            <li class=''><a href='/finance-legal-services' id='link239' title='Sports Events'>Finance & Legal
                Services</a></li>
            <li class=''><a href='/flooring' id='link247'>Flooring</a></li>
            <li class=''><a href='/furniture' id='link248'>Furniture</a></li>
            <li class=''><a href='/home-builders' id='link264'>Home Builders</a></li>
            <li class=''><a href='/home-entertainment' id='link265'>Home Entertainment</a></li>
            <li class=''><a href='/home-security' id='link266'>Home Security</a></li>
            <li class=''><a href='/homemaker-centres' id='link424'>Homemaker Centres</a></li>
            <li class=''><a href='/lighting' id='link277'>Lighting</a></li>
            <li class=''><a href='/outdoor-living' id='link278'>Outdoor Living</a></li>
            <li class=''><a href='/sustainable-homes' id='link309'>Sustainable Homes</a></li>
          </ul>
        </li>
        <li class='col-md-4'><a href='/blog' id='link488'>Blog</a></li>
        <li class='col-md-2'><a href='/join' id='link227' title='Choose a Plan' target='_blank'>Exhibit Now</a></li>
      </ul>
    </div>
    <nav class="navbar navbar-default ">
      <div class="container container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed main_menu" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse nopad" id="bs-main_menu">
          <ul class="nav navbar-nav nav-justified">
            <li class='col-md-4'><span id='link487'> </span></li>
            <li class='col-md-2' style="floatright" style="floatright">
              <span id='link231' target='_blank'> Home Show Categories ▾</span>
              <ul>
                <li class=''>
                  <a href='/home-appliances' id='link234' title='Sydney Home and Garden Ex'>Home Appliances</a>
                  <ul>
                    <li class=''><a href='/home-appliances/whitegoods' id='link439'>Whitegoods</a></li>
                    <li class=''><a href='/home-appliances/cooktops' id='link440'>Cooktops</a></li>
                    <li class=''><a href='/home-appliances/ovens' id='link441'>Ovens</a></li>
                  </ul>
                </li>
                <li class=''><a href='/kitchen' id='link276'>Kitchen</a></li>
                <li class=''><a href='/heating-cooling' id='link434' title='Sydney Home and Garden Ex'>Heating &
                    Cooling</a></li>
                <li class=''><a href='/gardening' id='link435' title='Sydney Home and Garden Ex'>Gardening</a></li>
                <li class=''><a href='/dining-room' id='link436'>Dining Room</a></li>
                <li class=''><a href='/bathroom' id='link244'>Bathroom</a></li>
                <li class=''><a href='/bedroom' id='link236' title='Family Events'>Bedroom</a></li>
                <li class=''><a href='/building-materials' id='link245'>Building Materials</a></li>
                <li class=''>
                  <a href='/design-services' id='link237'>Design Services</a>
                  <ul>
                    <li class=''><a href='/architects' id='link304'>Architects</a></li>
                  </ul>
                </li>
                <li class=''><a href='/doors-windows' id='link246'>Doors & Windows</a></li>
                <li class=''><a href='/finance-legal-services' id='link239' title='Sports Events'>Finance & Legal
                    Services</a></li>
                <li class=''><a href='/flooring' id='link247'>Flooring</a></li>
                <li class=''><a href='/furniture' id='link248'>Furniture</a></li>
                <li class=''><a href='/home-builders' id='link264'>Home Builders</a></li>
                <li class=''><a href='/home-entertainment' id='link265'>Home Entertainment</a></li>
                <li class=''><a href='/home-security' id='link266'>Home Security</a></li>
                <li class=''><a href='/homemaker-centres' id='link424'>Homemaker Centres</a></li>
                <li class=''><a href='/lighting' id='link277'>Lighting</a></li>
                <li class=''><a href='/outdoor-living' id='link278'>Outdoor Living</a></li>
                <li class=''><a href='/sustainable-homes' id='link309'>Sustainable Homes</a></li>
              </ul>
            </li>
            <li class='col-md-4'><a href='/blog' id='link488'>Blog</a></li>
            <li class='col-md-2'><a href='/join' id='link227' title='Choose a Plan' target='_blank'>Exhibit Now</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--CSS IF MENU IS FIXED TOP-->
  </div>
  <div class="clearfix"></div>