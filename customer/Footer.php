<?php
  
  include '../Connect/connection.php';
  $customer_id=$_SESSION['c_id'];

  $query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id where  bookings.c_fk_id=$customer_id and bookings.status='not' and bookings.cancel='not'");
  $nums=mysqli_num_rows($query_product);

?>

<footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">Pharmative</strong></h3>
              <p>Welcome to pharmaceutic, we are trusted drug pills store in delivering pharmaceutical solutions to hospitals and pharmacies. We are dedicated to enhancing healthcare accessibility and efficiency, ensuring that essential medications reach those who need them most.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li class="active"><a href="#" onclick="window.location.href='index.php'"><i class="icon-home"></i>&nbsp;Home</a></li>
              <li><a href="#" onclick="window.location.href='about.php'"><i class="icon-list"></i>&nbsp;About</a></li>
              <li><a href="#" onclick="window.location.href='shop.php'"><i class="icon-calendar"></i>&nbsp;Store</a></li>
              <li><a href="#" onclick="window.location.href='cart.php'"><i class="icon-list-alt"></i>&nbsp;Bookings</a>&nbsp;<span class="badge badge-info"><?php echo $nums;?></span></li>
              <li><a href="#" onclick="window.location.href='contact.php'"><i class="icon-phone"></i>&nbsp;Contact</a></li>
              <!-- <li><a href="#" data-target="#ModalLogout" data-toggle="modal">Logout</a></li> -->
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">KG 567 ST. Kamatamu, Rwinzovu, Kacyiru, Gasabo, Kigali ,Rwanda</li>
                <li class="phone"><a href="tel://23923929210">+250780000000</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved by <span class="text-primary">Pharmaceutic</span>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>