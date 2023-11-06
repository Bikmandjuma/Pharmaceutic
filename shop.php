<!DOCTYPE html>
<html lang="en">
<?php include 'header_links.php';?>
<body>

  <div class="site-wrap">

    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone"><strong class="text-primary">Pharma</strong>ceutic</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <?php include 'NavBar.php';?>
          </div>
          <?php include 'ShoppingBag.php'; ?>
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
          <div class="col-lg-12 text-center">
            <h2 style="font-family:sans-serif;font-style: italic;"><u>All product in store</u></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
    
        <div class="row">
          <?php
              include 'Connect/connection.php';
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
                      $counts=$counts." pack left";
                    }else{
                      $counts=$counts." packs";
                    }
                    

                    echo '
                        <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2" style="box-shadow:0px 4px 8px 0px rgba(0,0,0,0.2);">
                            <a href="shop_single.php?product_id='.$product_id.'"> <img src="style/assets/images/drug/'.$product_image.'" alt="Image" style="height:300px;" class="image-container"></a>
                            <h3 class="text-dark"><a href="shop_single.php">'.$product_name.'</a></h3>
                            <p class="price">'.number_format($product_price).'Frw/pack &nbsp;<span class="text-info">'.$counts.'</span></p>
                        </div>
                    ';
                  }
              }

          ?>

        </div>
        
      </div>
    </div>
    
  <?php include 'footer.php';?>

  </div>

  <?php include 'bottom_script_links.php'; ?>

</body>

</html>