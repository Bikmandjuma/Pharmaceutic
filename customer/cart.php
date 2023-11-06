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
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">Cart</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr class="bg-info" style="color:white;">
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
                    $subtotal=0;
                    $total=0;

                    // $query_product_count=mysqli_num_rows($query_product);

                    while ($row=mysqli_fetch_assoc($query_product)) {
                        $product_qty=$row['quantity'];
                        $bookings=$row['packs_count'];
                        $product_id=$row['p_id'];
                        $product_image=$row['image'];
                        $product_name=$row['name'];
                        $product_price=$row['price'];
                        $customer_id=$row['price'];
  
                        $total_price=$bookings*$product_price;
                      
                          echo '
                            <tr>
                                '?>
                                <form method="POST" action="cancelOrder.php?product_id=<?php echo $product_id;?>">
                                  <style>
                                    #not_found{display: none;}

                                  </style>
                                  <td class="product-thumbnail image-container">
                                    <img src="../style/assets/images/drug/<?php echo $product_image;?>" alt="Image" class="img-fluid"  style="width:100px;height:200px;">
                                  </td>
                                  <td class="product-name">
                                    <h2 class="h5 text-black"><?php echo $product_name;?></h2>
                                  </td>
                                  <td><?php echo number_format($product_price);?> Frw</td>
                                  <td>
                                    <div class="input-group mb-3" style="max-width: 120px;text-align:Center;">
                                      <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                      </div>
                                      <input type="text" class="form-control text-center" value="<?php echo $bookings;?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                      <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                      </div>

                                    </div>
                                    <br/>
                                    <!--button class="btn btn-info" type="button">Save changes</button-->
                                    
                                  </td>
                                  <td><span id="output"><?php echo number_format($total_price);?></span> Frw</td>
                                  <td>
                                   
                                    <button type="submit" name="CancelOrder" class="btn btn-danger" onclick='return confirm("are u sure u want to cancel this order !")'><i class="fa fa-times"></i>&nbsp;Cancel order</button>
                                    
                                  </td>
                                </form>

                                <?php
                                 //cancel order
                                  if (isset($_POST['CancelOrder'])) {
                                      $query=mysqli_query($con,"DELETE FROM bookings where c_fk_id=$customer_id and p_fk_id=$product_id and status='not' and cancel='not'");
                                      if ($query == true) {
                                        
                                          ?>
                                                <script>
                                                    window.location.href="cart.php";
                                                    toastr.options.timeOut = 3000;
                                                    toastr.error('Order cancelled !');
                                                </script>
                                          <?php
                                      }
                                  }

                                    '
                            </tr>';

                           
                            $subtotal+=$product_price;
                            $total+=$total_price;
                          

                    }

                    $bookings_product=mysqli_query($con,"SELECT * FROM bookings where c_fk_id=$customer_id and status='not' and cancel='status'");
                    $bookings_product_count=mysqli_num_rows($bookings_product);
                    if ($bookings_product_count == 0) {            
                                  
                        ?>
                            <tr id="not_found">
                                <td colspan="6">
                                    No cart's data found !      
                                </td>
                            </tr>
                            <style>
                              #update_btn{
                                  display: none;
                              }
                            </style>
                        <?php

                    }
 
                  ?>
    
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <!--start of Cancel order modal -->
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
        <!--end of cancel order modal-->
    
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-md btn-block" id="update_btn">Update Cart</button>
              <!-- </div>
              <div class="col-md-6"> -->
                <button class="btn btn-outline-primary btn-md btn-block" onclick="window.location.href='shop.php'">Continue Shopping</button>
              </div>
            </div>
            <!-- <div class="row">
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
            </div> -->
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
                  <div class="col-md-6 text-right" style="margin-top:-24px;">
                    <strong class="text-black"><?php  echo number_format($total);?> Frw</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black font-weight-bold">Total</span>
                  </div>
                  <div class="col-md-6 text-right" style="margin-top: -24px;">
                    <strong class="text-black font-weight-bold"><?php  echo number_format($total);?> Frw</strong>
                  </div>
                </div>

                <?php
                  if ( $total != 0) {
                    ?>

                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.php'">Proceed To
                              Checkout</button>
                          </div>
                        </div>

                    <?php
                  }
                ?>
    
                
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