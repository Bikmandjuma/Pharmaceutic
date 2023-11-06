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
            <strong class="text-black">Checkout</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">Province <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control" name="c_province">
                  <option value="">Select a province</option>
                  <option value="Kigali">Kigali</option>
                  <option value="Northern">Northern</option>
                  <option value="Southern">Southern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Western">Western</option>
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" placeholder="Enter firstname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname" placeholder="Enter lastname">
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Company Name Ex: Girubuzima_pharmacy </label>
                  <input type="text" class="form-control" id="c_companyname" placeholder="Hospital or Pharmacy" name="c_companyname">
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="KG 514 st">
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">District<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_district" placeholder="Ex : Gasabo">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Sector<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_sector" placeholder="Ex : Kacyiru">
                </div>
              </div>

               <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Cell<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_cell" placeholder="Ex : Rwinzovu">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Village<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_village" placeholder="Ex : Kamatamu">
                </div>
              </div>
    
              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address" placeholder="Enter email">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                </div>
              </div>
    
            </div>
          </div>
          <div class="col-md-6">

            <?php
                include '../Connect/connection.php';
                $customer_id=$_SESSION['c_id'];
                $query_product=mysqli_query($con,"SELECT * FROM products inner join bookings on products.p_id=bookings.p_fk_id where bookings.c_fk_id=$customer_id");
                $subtotal=0;
                $total=0;
            ?>

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php
                       
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
                                <td>'.$product_name.' <strong class="mx-2">x</strong> '.$bookings.'</td>
                                <td>'.number_format($total_price).' Frw</td>
                              </tr>                              

                            ';

                            $subtotal+=$total_price;
                        }

                        $total=$subtotal;

                      ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black"><?php echo number_format($total);?> Frw</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong><?php echo number_format($total);?> Frw</strong></td>
                      </tr>
                    </tbody>
                  </table>
    
                  <div class="border mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                        aria-expanded="false" aria-controls="collapsebank">Direct Cash Payment</a></h3>
    
                    <div class="collapse" id="collapsebank">
                      <div class="py-2 px-4">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          <input type="text" name="c_amount" value="<?php echo number_format($total);?>&nbsp;Frw" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
    
                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" name="SubmitConfirmOrder" type="submit">Confirm
                      payment order</button>
                  </div>
    
                </div>
              </div>
            </div>
    
          </div>
        </div>
        </form>
      </div>
    </div>

    <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if (isset($_POST['SubmitConfirmOrder'])) {

                $fname=test_input($_POST['c_fname']);
                $lname=test_input($_POST['c_lname']);
                $province=test_input($_POST['c_province']);
                $company=test_input($_POST['c_company_name']);
                $phone=test_input($_POST['c_phone']);
                $email=test_input($_POST['c_email']);
                $address=test_input($_POST['c_address']);
                $district=test_input($_POST['c_district']);
                $sector=test_input($_POST['c_sector']);
                $cell=test_input($_POST['c_cell']);
                $village=test_input($_POST['c_village']);
                $amount=test_input($_POST['c_amount']);

               // onclick="window.location='ThankYou.php'"

            }

        }


        function test_input($data){
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

    ?>
    
  <?php include 'CustomerModalLogout.php';?>
    
    <?php include 'Footer.php';?>

  </div>

  <?php

  include 'LowerScriptLink.php';

  ?>

</body>

</html>