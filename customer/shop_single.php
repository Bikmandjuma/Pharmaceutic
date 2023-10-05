
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
            $product_price=$row['price'];
        }

    ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.html">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $product_name.' , '.$product_mg_bottle.'mg';?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="../style/assets/images/drug/<?php echo $product_image;?>" alt="Image" class="img-fluid p-5" style="height:500px;">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $product_name.' , '.$product_mg_bottle.'mg';?></h2>
            <p><?php echo $product_description.' <br>'.$product_bottle_pack.'bottles/pack';?></p>
            

            <p><strong class="text-primary h4"><span id="output"><?php echo $product_price;?></span>Frw</strong></p>

            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button" id="minusbtn">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1" id="values">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button" id="plusbtn">&plus;</button>
                </div>
              </div>
            </div>

            <script>
                const plusbtn = document.getElementById('plusbtn');
                const minusbtn = document.getElementById('minusbtn');
                const output = document.getElementById('output');
                const valuesInput = document.getElementById('values');

                let counter = parseInt(output.textContent);

                plusbtn.addEventListener("click", function () {
                  const inputValue = parseInt(valuesInput.value);
                  if (!isNaN(inputValue) && inputValue >= 1) {
                    counter *= inputValue;
                    output.textContent = counter;
                  }
                });

                minusbtn.addEventListener("click", function () {
                  const inputValue = parseInt(valuesInput.value);
                  if (!isNaN(inputValue) && inputValue >= 1) {
                    counter /= inputValue;
                    output.textContent = counter;
                  }
                });

                // Listen for changes in the input field
                valuesInput.addEventListener("input", function () {
                  const newValue = parseInt(valuesInput.value);
                  if (!isNaN(newValue) && newValue >= 1) {
                    counter = newValue;
                    output.textContent = counter;
                  }
                });
            </script>

            <p><a href="cart.php" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>

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
                      <tr>
                        <th scope="row"><?php echo 'NDC : '.$product_ndc;?></th>
                        <td><?php echo $product_description.' ,'.$product_mg_bottle.'mg'?></td>
                        <td><?php echo $product_bottle_pack.'bottles/pack';?></td>
                      </tr>
                      
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

  <?php

  include 'LowerScriptLink.php';

  ?>

</body>

</html>