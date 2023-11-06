
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
    <?php
        include '../Connect/connection.php';
        $pro_id=$_REQUEST['product_id'];
        // $product_id=openssl_decrypt(base64_decode($pro_id),"AES-128-ECB","pharmacy");
        $query_product=mysqli_query($con,"SELECT * FROM products where p_id=$pro_id");
        while ($row=mysqli_fetch_assoc($query_product)) {
            $product_name=$row['name'];
            $product_description=$row['description'];
            $product_image=$row['image'];
            $product_qty=$row['quantity'];
            $product_mg_bottle=$row['mg_bottle'];
            $product_bottle_pack=$row['bottle_pack'];
            $product_manu_date=$row['manu_date'];
            $product_exp_date=$row['exp_date'];
            $product_ndc=$row['ndc'];
            $product_price=number_format($row['price']);
        }

        // $query_product_xx=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id where bookings.p_fk_id=$pro_id and bookings.status='not'");

        // $count_query_product_xx=mysqli_num_rows($query_product_xx);
                            
        // while ($row_xx=mysqli_fetch_assoc($query_product_xx)) {
        //       $product_price_x=$row['price'];
        //       $booking=$row['packs_count'];
        // }


    ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $product_name.' , '.$product_mg_bottle.'mg';?>,<?php echo " ".$product_price." Frw";?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row"> 
          <div class="col-md-5 mr-auto">
            <div style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.4);">
              <div class="border text-center">
              <img src="../style/assets/images/drug/<?php echo $product_image;?>" alt="Image" class="img-fluid p-5 image-container">
            </div>
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $product_name.' , '.$product_mg_bottle.'mg';?></h2>
            <p><?php echo $product_description.' <br>'.$product_bottle_pack.'bottles/pack';?></p>
            

            <p><strong class="text-primary h4"><span id="output"><?php echo $product_price;?></span> <span style="font-weight: bold;">Frw</span></strong></p>
            <!-- <p><strong class="text-primary h4"><span id="output">20000</span>Frw</strong></p> -->
            
            <form method="POST">
            
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 220px;display: flex;">
                        
                       
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary" type="button" id="minusbtn">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder=""
                                aria-label="Example text with a button addon" aria-describedby="button-addon1" id="values" name="ValueName">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="plusbtn">&plus;</button>
                            </div>
                    
                    </div>
                </div>

                <!-- <p><a class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit" name="submitValue">Add To Cart</a></p> -->
                <button class="btn btn-primary" type="submit" name="submitValue"><i class="fa fa-shopping-cart"></i> add to cart</button>

            </form>
                <?php
                  $customer_id=$_SESSION['c_id'];
                  $value_input=null;
                  
                  if (isset($_POST['submitValue'])) {
                        $query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id where bookings.p_fk_id=$pro_id and bookings.status='not' and bookings.c_fk_id=$customer_id");

                        $count_query_product=mysqli_num_rows($query_product);

                        if ($count_query_product == 1) {
                            
                            while ($row=mysqli_fetch_assoc($query_product)) {
                                $product_price_x=$row['price'];
                                $pro_count=$row['quantity'];
                                $booking=$row['packs_count'];
                                $product_id=$row['p_id'];
                                $product_price=$row['price'];

                                $counts=$pro_count-$booking;

                                $valueInput=$_POST['ValueName'];
                                
                                if ($valueInput > $counts) {
                                    ?>
                                      <script>
                                        setTimeout(function(){
                                          var data=document.getElementById('HighValue');
                                          data.style.display="block";
                                          data.style.display="none";
                                        },8000);
                                      </script>
                                    <?php
                                    
                                    if ($counts == 1) {
                                        $count_x=$counts." quantity";
                                    }else{
                                        $count_x=$counts." quantities";
                                    }

                                    $value_input="<br/><p style='color:red;' id='HighValue'>Only ".$count_x." left in store ,you are entering more values <b>".$_POST['ValueName']."</b> !</p>";
                                    break;
                                }else{

                                    $new_qty=$booking+$valueInput;

                                    mysqli_query($con,"UPDATE bookings SET bookings.packs_count=$new_qty where bookings.p_fk_id=".$pro_id." and bookings.status='not' and bookings.c_fk_id=$customer_id");
                                    ?>
                                      <script type="text/javascript">
                                        setTimeout(function(){
                                          window.location.href="cart.php";
                                        });
                                      </script>
                                    <?php
                                    break;
                                }
                                //end of if

                            }
                            //end of while

                        }else{
                            
                            $valueInput=$_POST['ValueName'];

                             mysqli_query($con,"INSERT INTO bookings VALUES ('','$customer_id','$pro_id','$valueInput','not','not')");
                                    ?>
                                      <script type="text/javascript">
                                        setTimeout(function(){
                                          window.location.href="cart.php";
                                        });
                                      </script>
                                    <?php
                        }

                  }

                   echo $value_input;
                ?>
            <script>
                // Get the HTML elements
                var outputElement = document.getElementById("output");
                var valuesInput = document.getElementById("values");
                var plusButton = document.getElementById("plusbtn");
                var minusButton = document.getElementById("minusbtn");

                // Add click event listener to the plus button
                plusButton.addEventListener("click", function () {
                    var currentValue = parseInt(valuesInput.value);
                    valuesInput.value = currentValue + 1;
                    updateOutput();
                });

                // Add click event listener to the minus button
                minusButton.addEventListener("click", function () {
                    var currentValue = parseInt(valuesInput.value);
                    if (currentValue > 1) {
                        valuesInput.value = currentValue - 1;
                        updateOutput();
                    }
                });

                // Function to update the displayed value
                function updateOutput() {
                    var currentValue = parseInt(valuesInput.value);
                    var price = <?php echo $product_price;?>; // Price per item
                    var total = price * currentValue;
                    outputElement.textContent = total;
                }

                // Initial update
                updateOutput();
            </script>

            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Manuf &amp; exp date</a>
                </li>
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">
                    <thead>
                      <th>National_Drug_code</th>
                      <th>Description</th>
                      <th>Packaging</th>
                    </thead>
                    <tbody>
                      <?php
                        
                        $descr_pro_more=substr($product_description,0,150);
                        $descr_pro_less=substr($product_description,151,500);
                      ?>
                      <tr>
                        <th scope="row"><?php echo 'NDC : '.$product_ndc;?></th>
                        <td>
                          <?php echo '<p id="desc_more_id">'.
                                      $descr_pro_more.
                                      '</p><p id="desc_less_id" style="display:none;">'.
                                      $descr_pro_less.'</p> '.
                                      $product_mg_bottle.'mg'.
                                      ',<i onclick="more_description()" id="desc_more_id_btn">More</i>
                                        <i onclick="less_description()" id="desc_less_id_btn" style="display:none;">Less</i>';?>
                                        
                        </td>
                        <td><?php echo $product_bottle_pack.'bottles/pack';?></td>
                      </tr>

                      <script>
                          var desc_more_id=document.getElementById('desc_more_id');
                          var desc_less_id=document.getElementById('desc_less_id');
                          var more_id_btn=document.getElementById('desc_more_id_btn');
                          var less_id_btn=document.getElementById('desc_less_id_btn');
                          function more_description(){
                            desc_more_id.style.display="none";
                            desc_less_id.style.display="block";
                            less_id_btn.style.display="block";
                            more_id_btn.style.display="none";
                          }

                          function less_description(){
                            desc_more_id.style.display="block";
                            desc_less_id.style.display="none";
                            less_id_btn.style.display="none";
                            more_id_btn.style.display="block";
                          }
                      </script>
                      
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            
                  <table class="table custom-table">
            
                    <tbody>
                      <tr>
                        <td>Manufactured date</td>
                        <td class="bg-light"><?php echo $product_manu_date;?></td>
                      </tr>
                      <tr>
                        <td>Expired date</td>
                        <td class="bg-light"><?php echo $product_exp_date;?></td>
                      </tr>
                      
                    </tbody>
                  </table>
            
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
   <!-- Your script -->
    <!-- <script>
        function showToast() {
            toastr.options.timeOut = 3000;
            toastr.error('message.');
        }
    </script> -->
  <?php

  include 'LowerScriptLink.php';

  ?>

</body>

</html>