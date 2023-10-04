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
              <a href="index.html" class="js-logo-clone"><strong class="text-primary">Pharma</strong>ceutic</a>
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
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis ex perspiciatis non quibusdam vel quidem.</p>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem assumenda, delectus. Amet repellendus quidem, fugiat.</p>
            
          </div>
          <div class="col-lg-4">
            <h3 class="text-black h4">History</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda iste aut, ut similique nobis ab?</p>
            
          </div>
          <div class="col-lg-4">
            <h3 class="text-black h4">Awards</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae nisi magni in fugit, ad laudantium.</p>
            
          </div>
        </div>
      </div>
    </div>    

    
<!--     <div class="site-section bg-image overlay" style="background-image: url('../style/assets/images/hero_bg_2.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center">
         <div class="col-lg-7">
           <h3 class="text-white">Sign up for discount up to 55% OFF</h3>
           <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam.</p>
           <p class="mb-0"><a href="#" class="btn btn-outline-white">Sign up</a></p>
         </div>
        </div>
      </div>
    </div> -->

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck text-primary"></span>
            </div>
            <div class="text">
              <h2>Free Shipping</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan
                tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2 text-primary"></span>
            </div>
            <div class="text">
              <h2>Free Returns</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan
                tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help text-primary"></span>
            </div>
            <div class="text">
              <h2>Customer Support</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan
                tincidunt fringilla.</p>
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