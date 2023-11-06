
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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
        </div>
      </div>
    </div>
    
    <div class="py-5">
      <div class="container">
        <div class="row">
          <?php
            include '../Connect/connection.php';
            $customer_id=$_SESSION['c_id'];

            $query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id where  bookings.c_fk_id=$customer_id and bookings.status='not' and bookings.cancel='not'");
            $nums=mysqli_num_rows($query_product);

          ?>
          <div class="col-lg-12 text-lg-right">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Bookings / Cart &nbsp;<span class="badge badge-info"><?php echo $nums;?> </span> </h3>
            <button type="button" class="btn btn-primary" onclick="window.location.href='cart.php'"><i class="fa fa-shopping-cart"></i>&nbsp;Check them out</button>
           
          </div>
                 
              <div class="site-section">
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
                                <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2" style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);">
                                      <a href="shop_single.php?product_id='.$product_id.'"> <img src="../style/assets/images/drug/'.$product_image.'" alt="Image" style="height:300px;" class="image-container"></a>
                                      <h3 class="text-dark"><a href="shop_single.php?product_id='.$product_id.'">'.$product_name.'</a></h3>
                                      <p class="price">'.number_format($product_price).'Frw/pack &nbsp;<span class="text-info">'.$counts.'</span></p>
                                  </div>
                                ';

                            }
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