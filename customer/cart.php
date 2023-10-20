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

    
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">Cart</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include '../Connect/connection.php';
                    $customer_id=$_SESSION['c_id'];
                    $query_product=mysqli_query($con,"SELECT * FROM products inner join bookings on products.p_id=bookings.p_fk_id where bookings.c_fk_id=$customer_id");
                    $count_product=mysqli_num_rows($query_product);

                    while ($row=mysqli_fetch_assoc($query_product)) {
                        $product_qty=$row['quantity'];
                        $bookings=$row['packs_count'];
                        $product_id=$row['p_id'];
                        $product_image=$row['image'];
                        $product_name=$row['name'];
                        $product_price=$row['price'];
                        $total_price=$bookings*$product_price;
                      
                        
                          if ($product_name != null && $product_qty != null) {
                          
                                echo '
                                  <tr>
                                    <td class="product-thumbnail image-container">
                                      <img src="../style/assets/images/drug/'.$product_image.'" alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                      <h2 class="h5 text-black">'.$product_name.'</h2>
                                    </td>
                                    <td>'.$product_price.'Frw</td>
                                    <td>
                                      <div class="input-group mb-3" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center" value="'.$bookings.'" placeholder=""
                                          aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                      </div>
                    
                                    </td>
                                    <td>'.$total_price.'Frw</td>
                                    <td><a href="#" class="btn btn-primary height-auto btn-sm" data-target="#ModalCancelOrder" data-toggle="modal">X</a></td>
                                  </tr>';

                                  //cancel order
                                  if (isset($_POST['CancelOrder'])) {
                                      $query=mysqli_query($con,"DELETE FROM bookings where p_fk_id=$product_id and c_fk_id=$customer_id and status='not'");
                                      if ($query == true) {
                                        
                                          ?>
                                                <script>
                                                    window.loction.href="cart.php";
                                                    toastr.options.timeOut = 3000;
                                                    toastr.error('Order cancelled !');

                                                </script>
                                          <?php
                                      }
                                  }
                          }else{

                                  ?>
                                    <style>
                                        #cart_contents{
                                          display: none;
                                        }
                                    </style>
                                  <?php

                         }
                }
 
                  ?>
    
                </tbody>
              </table>
            </div>
          </form>
        </div>


      <!--start of Logout modal -->
          <div class="modal" style="margin-top:150px;" id="ModalCancelOrder" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm text-center">
              <div class="modal-content">
                <div class="modal-body bg-danger text-white">
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4>Notification&nbsp;<i class="fa fa-bell"></i></h4>
                </div>
                <div class="modal-body">
                  <p><i class="fa fa-question-circle"></i>Are you sure , do u want to cancel this order ? <br /></p>
                  <div class="actionsBtns">
                    <form method="POST">
                      <button type="submit" name="CancelOrder" class="btn btn-primary"  style="border-radius:10px;color:white;"><i class="fa fa-check"></i> Yes</button> &nbsp;&nbsp;&nbsp;
                      <button class="btn btn-danger" data-dismiss="modal" style="border-radius:10px;"><i class="fa fa-times"></i> Not now</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--end of logout modal-->
    
        <div class="row" id="cart_contents">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-md btn-block">Update Cart</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-md btn-block" onclick="window.location.href='shop.php'">Continue Shopping</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Proceed To
                      Checkout</button>
                  </div>
                </div>
              </div>
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