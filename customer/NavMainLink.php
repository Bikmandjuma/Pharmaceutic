<?php
  session_start();
  include '../Connect/connection.php';
  $customer_id=$_SESSION['c_id'];

  $query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id where  bookings.c_fk_id=$customer_id and bookings.status='not' and bookings.cancel='not'");
  $nums=mysqli_num_rows($query_product);

?>
  <nav class="site-navigation text-right text-md-center" role="navigation">
      <ul class="site-menu js-clone-nav d-none d-lg-block">
          <li><a href="#" onclick="window.location.href='index.php'"><i class="icon-home"></i>&nbsp;Home</a></li>
          <li><a href="#" onclick="window.location.href='about.php'"><i class="icon-list"></i>&nbsp;About</a></li>
          <li><a href="#" onclick="window.location.href='shop.php'"><i class="icon-shopping-bag"></i>&nbsp;Store</a></li>
          <li><a href="#" onclick="window.location.href='cart.php'"><i class="fa fa-calendar-alt"></i>&nbsp;Bookings&nbsp;<span class="badge badge-info"><?php echo $nums;?></span> </a></li>
          <li><a href="#" onclick="window.location.href='contact.php'"><i class="icon-phone"></i>&nbsp;Contact</a></li>
          <li><a href="#" data-toggle="modal" data-target="#ModalLogout"><i class="icon-lock"></i>&nbsp;Logout</a></li>
      </ul>
  </nav>