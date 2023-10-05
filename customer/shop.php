
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

    
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
        </div>
      </div>
    </div>
    
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div>
          <div class="col-lg-6 text-lg-right">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Bookings</h3>
            <button type="button" class="btn btn-primary" onclick="window.location.href='cart.php'">Check them out</button>
           
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
    
        <div class="row">
          <?php

              include '../Connect/connection.php';
              $query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id");
              while ($row=mysqli_fetch_assoc($query_product)) {
                  $pro_count=$row['quantity'];
                  $book=$row['packs_count'];
                  $product_id=$row['p_id'];
                  $product_price=$row['price'];
                  $product_image=$row['image'];
                  $product_name=$row['name'];

                  
                  $counts=$pro_count-$book;

                  if($counts == 0){
                  // echo "no products found";
                  }else{

                    if ($counts == 1) {
                      $counts="Only ".$counts." pack left";
                    }else{
                      $counts="Only ".$counts." packs left";
                    }
                     
                    echo '      
                      <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2" style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);border-radius:10px;"">
                        <span class="onsale">Sale</span>
                        <a href="shop_single.php?product_id='.$product_id.'"> <img src="../style/assets/images/drug/'.$product_image.'" alt="Image" style="padding:0px 50px 0px 50px;height:300px;" ></a>
                        <h3 class="text-dark"><a href="shop-single.html">'.$product_name.'</a></h3>
                        <p class="price">'.$product_price.'Frw/pack &nbsp;&nbsp;&nbsp; <span class="text-info"><b>'.$counts.'</b></span></p>
                      </div>&nbsp;&nbsp;&nbsp;';
                  }
              }

          ?>

        </div>
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
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