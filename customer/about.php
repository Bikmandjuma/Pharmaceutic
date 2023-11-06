<!DOCTYPE html>
<html lang="en">
<?php include 'HeadLink.php';?>

<body>

  <div class="site-wrap">

    <div class="site-navbar py-2">

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone"><strong class="text-primary">Pharma</strong>ceutic</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
           <?php include 'NavMainLink.php'; ?>
          
          </div>
          <div class="icons">
            <?php include 'UsernameBookingIcon.php'; ?>
          </div>
        </div>
      </div>
    </div>

     <div class="site-blocks-cover overlay" style="background-image: url('../style/assets/images/hero_bg_2.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto align-self-center">
            <div class="site-block-cover-content text-center">
              <h1 class="mb-0">About <strong class="text-primary">Pharmative</strong></h1>
              <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                  <p>Welcome to pharmaceutic, we are trusted drug pills store in delivering pharmaceutical solutions to hospitals and pharmacies. We are dedicated to enhancing healthcare accessibility and efficiency, ensuring that essential medications reach those who need them most</p>
                </div>
              </div>
              <p><a href="#" class="btn btn-primary px-5 py-3" onclick="window.location.href='shop.php'">Shop Now</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-section py-5" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h3 class="text-black h4">Why Us</h3>
            <p>At pharmaceutic, we understand that you have choices when it comes to pharmaceutical distribution. Here are some compelling reasons to consider us as your trusted partner: Experience and Expertise ,Commitment to Quality . Reliable Distribution Network ,Customer-Centric Approach,Innovation and Technology,Future-Oriented Vision etc.</p>
            
          </div>
          <div class="col-lg-4">
            <h3 class="text-black h4">History</h3>
            <p>Pharmaceutic was founded in 2000 with a vision to revolutionize pharmaceutical distribution and improve healthcare access. From our humble beginnings, we have embarked on a journey of growth and innovation, shaping the way medications reach hospitals and pharmacies</p>
            
          </div>
          <div class="col-lg-4">
            <h3 class="text-black h4">Awards</h3>
            <p>At Pharmaceutic, our commitment to excellence and dedication to improving healthcare access have been recognized by industry experts and organizations. We are proud to share some of the awards and accolades we have received over the years</p>
            
          </div>
        </div>
      </div>
    </div>    

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck text-primary"></span>
            </div>
            <div class="text">
              <h2>Free Shipping</h2>
              <p>At pharmaceutic, we understand the importance of convenience and cost-effectiveness when it comes to pharmaceutical distribution. That's why we are pleased to offer our valued customers the benefit of free shipping on eligible orders.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2 text-primary"></span>
            </div>
            <div class="text">
              <h2>Free Returns</h2>
              <p>At pharmaceutic, we are committed to your satisfaction and want to ensure that you have a positive experience when ordering pharmaceutical products from us. That's why we are proud to offer a hassle-free returns policy.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help text-primary"></span>
            </div>
            <div class="text">
              <h2>Customer Support</h2>
              <p>At pharmaceutic, we are committed to delivering exceptional customer support to meet your pharmaceutical distribution needs. Our dedicated team is here to assist you every step of the way.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <?php include 'CustomerModalLogout.php';?>
    
    <?php include 'Footer.php';?>

  </div>

  <?php

  include 'LowerScriptLink.php';

  ?>

</body>

</html>