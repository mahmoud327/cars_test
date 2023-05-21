<div class="listing_sidebar">
    <div class="siderbar_left_home pt20">
        <a class="sidebar_switch sidebar_close_btn float-end" href="#">X</a>
        <div class="footer_contact_widget mt100">
            <h3 class="title">Quick contact info</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur.</p>
        </div>
        <div class="footer_contact_widget">
            <h5 class="title">CONTACT</h5>
            <div class="footer_phone">+1 670 936 46 70</div>
            <p>hello@voiture.com</p>
        </div>
        <div class="footer_about_widget">
            <h5 class="title">OFFICE</h5>
            <p>Germany —<br>329 Queensberry Street,<br>North Melbourne VIC 3051</p>
        </div>
        <div class="footer_contact_widget">
            <h5 class="title">OPENING HOURS</h5>
            <p>Monday – Friday: 09:00AM – 09:00PM<br>Saturday: 09:00AM – 07:00PM<br>Sunday: Closed</p>
        </div>
    </div>
</div>
<header style="margin-top:-40px !important;  padding-bottom: 5px;" class="header-nav menu_style_home_one dashbord_style home3_style main-menu">
    <!-- Ace Responsive Menu -->
    <nav> 
      <div class="container posr"> 
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
          <button type="button" id="menu-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <a href="<?php echo base_url(); ?>" class="navbar_brand float-start dn-md">
          <!-- <h4>Ezcariq</h4> -->
          <img class="logo1 img-fluid" width="130" src="<?php echo base_url("public/logo/4.png") ?>" alt="header-logo2.png">
          <img class="logo2 img-fluid" width="130" src="<?php echo base_url("public/logo/4.png") ?>" alt="header-logo2.svg">
        </a>
        <!-- Responsive Menu Structure-->
        <div class="d-flex aligin-items-center justify-content-around">
        <ul id="respMenu" style="" class="ace-responsive-menu menu_list_custom_code wa text-end" data-menu-style="horizontal">
          <li> <a href="<?php echo base_url() ?>"><span class="title">Home</span></a>
           
          </li>
           <li> <a href="<?php echo base_url("Welcome/companies") ?>"><span class="title">Companies</span></a>
           
          </li>
           <li> <a href="<?php echo base_url("Welcome/cars") ?>"><span class="title">Cars</span></a> 
           
          </li>
             <li> <a href="#"><span class="title">Extras</span></a>
            <ul>
               <li> <a href="<?php echo base_url("Welcome/contact") ?>"><span class="title">Contact Us</span></a>
           
           </li>
           <li> <a href="<?php echo base_url("Welcome/about") ?>"><span class="title">About Us</span></a>
           
           </li>
           <li ><a href="<?php echo base_url("Welcome/faq") ?>"><span class="title">FAQ</span></a></li>
              <li ><a href="<?php echo base_url("Welcome/termcondition") ?>"><span class="title">Term & Condition</span></a></li>
            </ul>
          </li>
        
        
</ul>
        <ul id="respMenu"  class="ace-responsive-menu menu_list_custom_code wa text-end" data-menu-style="horizontal">
        
          
 
          <?php 
          $profile=profile($this->session->userdata("userId"),$this->session->userdata("userTypeId"));
          if($this->session->userdata("userId")!="" && $this->session->userdata("userTypeId")==2 ){
               
            ?>
          <li class="add_listing"><a href="<?php echo (isset($profile['isPaid'])&&($profile['isPaid']==1))?base_url("Company/addListing"):base_url("Welcome/plan"); ?>">+ Add Car</a></li>
          <?php }else{ ?>
            <li class="add_listing"><a href="<?php echo ($this->session->userdata("userId")!="")?base_url("Company/addListing"):base_url("Welcome/login"); ?>">+ Add Car</a></li>
          <?php }
           if($this->session->userdata("userId")!=""){ ?>
            <!-- <li class="list-inline-item"><a href="<?php echo base_url("Welcome/logout") ?>" >Logout</a></li> -->

            <?php }else{ ?>
          <li class="list-inline-item"><a href="#" data-bs-toggle="modal" data-bs-target="#logInModal"><i class="fa-light fa-right-to-bracket"></i></a></li>
          <!-- <li class="list-inline-item"><a href="#" data-bs-toggle="modal" data-bs-target="#logInModal">Register</a></li> -->
          <?php } 
          if($this->session->userdata("userId")!=""){?>
          <!-- <li><a class="favorite" href="#"><span class="body-color flaticon-heart-1 fz18"><sup class="badge">2</sup></span></a></li> -->
          <li><a class="notification" href="#"><span class="body-color flaticon-bell fz16"></span></a></li>
          <li class="user_setting">
            <div class="dropdown">
              <a class="btn dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <img class="rounded-circle mr10" width="33" height="33" src="<?php echo (isset($profile['companyLogo']) && $profile['companyLogo']!="" )?base_url($profile['companyLogo']):base_url("public/site/images/team/e1.png")  ?>" alt="e1.png"> 
                <span class="dn-1366"><?php echo  $profile['firstName']." ".$profile['lastName'] ; ?> <span class="fas fa-angle-down ml5"></span></span>
              </a>
              <div class="dropdown-menu">
                <div class="user_set_header">
                  <img class="float-start" width="33" height="33" src="<?php echo (isset($profile['companyLogo'])&& $profile['companyLogo']!="" )?base_url($profile['companyLogo']):base_url("public/site/images/team/e1.png") ?>" alt="e1.png">
                  <p><?php echo  isset($profile['firstName'])?$profile['firstName']." ".$profile['lastName']:"" ; ?> <br><span class="address"></span></p>
                </div>
                <div class="user_setting_content">
                <?php if($this->session->userdata("userTypeId")==2){?> 
                  <a class="dropdown-item" href="<?php echo base_url("Company/") ?>"><i class="flaticon-dashboard"></i>Dashboard</a>
                  <?php } ?>
                  <a class="dropdown-item active" href="<?php echo base_url("Company/profile") ?>"><i class="flaticon-user"></i>My Profile</a>
                  <a class="dropdown-item" href="#"><i class="flaticon-chat"></i>Messages</a>
                  <?php if($this->session->userdata("userTypeId")==2){?> 
                  <a class="dropdown-item" href="<?php echo base_url("Company/listing") ?>"><i class="flaticon-list"></i>My Listing</a>
                  <?php } ?>
                  <a class="dropdown-item" href="<?php echo base_url("Welcome/contact") ?>"><i class="flaticon-plus"></i>Help</a>
                  <a class="dropdown-item" href="<?php echo base_url("Welcome/logout") ?>"><i class="flaticon-logout"></i>Log out</a>
                  <div id="google_translate_element"></div>
                </div>
              </div>
            </div>
          </li>
          <?php } ?>
          <li class="sidebar_panel"><a class="sidebar_switch pt0" href="#"><span></span></a></li>
        </ul>
        </div>
        
      </div>
    </nav>
  </header>
  <!-- Modal -->
  <div class="sign_up_modal modal fade" id="logInModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body container p60">
          <div class="row">
            <div class="col-lg-12">
              <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Signup</a>
                </li>
                <li class="nav-item" style="margin-left: 10px;">
                  <a class="nav-link" id="company-tab" data-bs-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false"   href="<?php echo base_url("Welcome/companySignup"); ?>" >Company Signup</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content container p0" id="myTabContent">
            <div class="row mt30 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="col-lg-12">
                <div class="login_form">
                  <p>New to Ezcariq.com? <a href="<?php echo base_url('Welcome/signup') ?>">Sign up.</a> Are you a dealer?</p>
                  <form action="<?php echo base_url('Welcome/login') ?>" method="POST">
                    <div class="mb-2 mr-sm-2">
                      <label class="form-label">Username or email address  *</label>
                      <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group mb5">
                      <label class="form-label">Password  *</label>
                      <input type="password" name="password"  class="form-control">
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="exampleCheck3">
                      <label class="custom-control-label" for="exampleCheck3">Remember me</label>
                      <a class="btn-fpswd float-end" href="<?php echo base_url("Welcome/forgot") ?>">Lost your password?</a>
                    </div>
                    <button type="submit" class="btn btn-log btn-thm mt5">Sign in</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row mt30 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="col-lg-12">
                <div class="sign_up_form">
                  <p>Already have a profile? <a href="<?php echo base_url('Welcome/login') ?>">Sign in.</a></p>
                  <form action="<?php echo base_url("Welcome/signup") ?>" method="post" >
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">First Name</label>
                          <input type="text" required name="firstName" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Last Name</label>
                          <input type="text" required name="lastName" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-label">Email</label>
                          <input type="email" required name="email" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb20">
                          <label class="form-label">Password</label>
                          <input type="password" required name="password"  class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb20">
                          <label class="form-label">Confirm Password</label>
                          <input type="password" required name="cPassword" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-signup btn-thm mb0">Sign Up</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row mt30 tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
              <div class="col-lg-12">
                <div class="sign_up_form">
                  <p>Already have a profile? <a href="<?php echo base_url('Welcome/login') ?>">Sign in.</a></p>
                  <form action="<?php echo base_url("Welcome/companySignup") ?>" enctype="multipart/form-data" method="post" >
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">First Name</label>
                          <input type="text" required name="firstName" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Last Name</label>
                          <input type="text" required name="lastName" class="form-control">
                        </div>
                      </div>
                    
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Company Logo</label>
                          <input type="file" required name="companyLogo" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Feature Image</label>
                          <input type="file" required name="featureImage" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Company Name</label>
                          <input type="text" required name="companyName" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Phone Number</label>
                          <input type="text" required name="phoneNumber" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Appointment date</label>
                          <input type="date" required name="appointmentDate" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-label">Email</label>
                          <input type="email" required name="email" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb20">
                          <label class="form-label">Password</label>
                          <input type="password" required name="password"  class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mb20">
                          <label class="form-label">Confirm Password</label>
                          <input type="password" required name="cPassword" class="form-control">
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group mb20">
                          <label class="form-label">Address</label>
                          <input type="text" required name="address" i="address" class="form-control">
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="hidden" name="city" id="city">
                        <input type="hidden" name="countary" id="countary">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-signup btn-thm mb0">Sign Up</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
      <div class="header stylehome1">
        <div class="mobile_menu_bar">
          <a class="menubar" href="#menu"><small>Menu</small><span></span></a>
        </div>
        <div class="mobile_menu_main_logo"><img width="100" class="nav_logo_img img-fluid" src="<?php echo base_url("public/logo/4.png") ?>" alt="images/header-logo2.png"></div>
      </div>
    </div>
    <!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
      <ul>
        <li><a href="<?php echo base_url() ?>"><span>Home</span></a>
       
        </li>
          <li> <a href="<?php echo base_url("Welcome/companies") ?>"><span class="title">Companies</span></a>
           
          </li>
           <li> <a href="<?php echo base_url("Welcome/cars") ?>"><span class="title">Cars</span></a> 
           
          </li>
        <!--<li><a href="<?php echo base_url("Welcome/plan") ?>"><span>Pricing</span></a>-->
        
        <!--</li>-->
        <li><a href="<?php echo base_url("Welcome/contact") ?>"><span>Contact Us</span></a>
        
        </li>
        <li><a href="<?php echo base_url("Welcome/about") ?>"><span>about Us</span></a>
        
        </li>
        <?php 
          $profile=profile($this->session->userdata("userId"),$this->session->userdata("userTypeId"));
          if($this->session->userdata("userId")!="" && $this->session->userdata("userTypeId")==2 ){
               
            ?>
          <li class="add_listing"><a href="<?php echo (isset($profile['isPaid'])&&($profile['isPaid']==1))?base_url("Company/addListing"):base_url("Welcome/plan"); ?>">+ Add Car</a></li>
          <?php }else{ ?>
            <li class="add_listing"><a href="<?php echo ($this->session->userdata("userId")!="")?base_url("Company/addListing"):base_url("Welcome/login"); ?>">+ Add Car</a></li>
          <?php }
           if($this->session->userdata("userId")!=""){ ?>
            <!-- <li class="list-inline-item"><a href="<?php echo base_url("Welcome/logout") ?>" >Logout</a></li> -->

            <?php }else{ ?>
          <li class="list-inline-item"><a href="#" data-bs-toggle="modal" data-bs-target="#logInModal"><i class="fa fa-sign-in"></i>Login</a></li>
        
          <!-- <li class="list-inline-item"><a href="#" data-bs-toggle="modal" data-bs-target="#logInModal">Register</a></li> -->
          <?php } ?>
           <?php 
           if($this->session->userdata("userId")!=""){
           if($this->session->userdata("userTypeId")==2){?> 
             <li> <a class="" href="<?php echo base_url("Company/") ?>">Dashboard</a></a>
        
        </li>
                 
                  <?php } ?>
                    <li> <a class="" href="<?php echo base_url("Company/profile") ?>">My Profile</a>
        
        </li>
                 
                  
           <li><a class="" href="#">Messages</a>
        
        </li> 
                 
                <li> <a class="" href="<?php echo base_url("Company/listing") ?>">My Listing</a>
        
        </li>
                  <li><a class="" href="#">Help</a></li>
                    <li><a class="" href="<?php echo base_url("Welcome/logout") ?>">Log out</a>
        
        </li>
          <li>
             
          </li>
        <?php } ?>
                  
    
       
    
        <!-- Only for Mobile View -->
        <li class="mm-add-listing">
          <span class="border-none">
            <span class="mmenu-contact-info">
              <span class="phone-num"><i class="flaticon-map"></i> <a href="#">47 Bakery Street, London, UK</a></span>
              <span class="phone-num"><i class="flaticon-phone-call"></i> <a href="#">1-800-458-56987</a></span>
              <span class="phone-num"><i class="flaticon-clock"></i> <a href="#">Mon - Fri 8:00 - 18:00</a></span>
            </span>
              <div id="google_translate_element_2"></div>
            <span class="social-links">
              <a href="https://www.facebook.com/ezcariq/about/" ><span class="fab fa-facebook-f"></span></a>
              <!--<a href="#"><span class="fab fa-twitter"></span></a>-->
              <a href="https://www.instagram.com/ezcariq/?hl=en"><span class="fab fa-instagram"></span></a>
              <a href="https://www.youtube.com/@ezcariq/featured"><span class="fab fa-youtube"></span></a>
              <a href="https://www.tiktok.com/@ezcariq?_t=8a4HfUi5Tb3&_r=1"><span class="fab fa-tiktok"></span></a>
            </span>
          </span>
        </li>
      </ul>
    </nav>
  </div>