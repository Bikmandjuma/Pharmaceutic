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
  

    <div class="owl-carousel owl-single px-0">
      <div class="site-blocks-cover overlay" style="background-image: url('../style/images/hero_bg.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto align-self-center">
              <div class="site-block-cover-content text-center">
                <h1 class="mb-0"><strong class="text-primary">Pharmative</strong> Opens 24 Hours</h1>

                <div class="row justify-content-center mb-5">
                  <div class="col-lg-6 text-center">
                    <p>Welcome to pharmaceutic, we are trusted drug pills store in delivering pharmaceutical solutions to hospitals and pharmacies. We are dedicated to enhancing healthcare accessibility and efficiency, ensuring that essential medications reach those who need them most</p>
                  </div>
                </div>
                
                <p><a href="#" class="btn btn-primary px-5 py-3" onclick="window.location.href='shop.php'">Shop Now</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover overlay" style="background-image: url('../style/images/hero_bg_2.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto align-self-center">
              <div class="site-block-cover-content text-center">
                <h1 class="mb-0">New Medicine <strong class="text-primary">Everyday</strong></h1>
                <div class="row justify-content-center mb-5">
                  <div class="col-lg-6 text-center">
                    <p>We are committed to staying at the forefront of the pharmaceutical industry by continuously adding innovative and high-quality medicines to our product catalog. We are excited to introduce our latest additions to support healthcare professionals, hospitals, and pharmacies in providing the best care to patients</p>
                  </div>
                </div>
                <p><a href="#" class="btn btn-primary px-5 py-3">Shop Now</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <div class="site-section py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-24-hours-drugs-delivery"></span>
              <h3><a href="#">Free Delivery</a></h3>
              <p>we understand the importance of convenience and cost-effectiveness when it comes to pharmaceutical distribution. That's why we are pleased to offer our valued customers the benefit of free shipping on eligible orders.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-medicine"></span>
              <h3><a href="#">New Medicine Everyday</a></h3>
              <p>We are committed to staying at the forefront of the pharmaceutical industry by continuously adding innovative and high-quality medicines to our product catalog. We are excited to introduce our latest additions to support healthcare professionals, hospitals, and pharmacies in providing the best care to patient..</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-test-tubes"></span>
              <h3><a href="#">Medicines Guaranteed</a></h3>
              <p>we are dedicated to delivering pharmaceutical solutions that meet the highest standards of quality, safety, and efficacy. Our "Medicines Guaranteed" commitment ensures that you can have complete confidence in the products you receive from us.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2>Products in <strong class="text-primary">store</strong></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">

            <?php
            	include '../Connect/connection.php';
            // 	$query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id");
            // 	while ($row=mysqli_fetch_assoc($query_product)) {
            //   		$pro_count=$row['quantity'];
            //   		$book=$row['packs_count'];
            //       $product_id=$row['p_id'];
            //       $product_price=$row['price'];

            //   		$counts=$pro_count-$book;

            //   		if($counts == 0){
  			    //     	// echo "no products found";
    			  //       }else{

    			  //       	if ($counts == 1) {
    			  //       		$counts="Only ".$counts." pack left";
    			  //       	}else{
    			  //       		$counts="Only ".$counts." packs left";
    			  //       	}
    					       
    				//      	echo '
            //               <div class="text-center item mb-4 item-v2">
            //                     <span class="onsale">Sale</span>
            //                     <a href="shop_single.php?product_id='.$product_id.'" style="text-align:center;">
            //                     <div>
            //                       <img src="../style/assets/images/drug/'.$row["image"].'" alt="Image" style="padding:0px 50px 0px 50px;height:350px;" class="image-container">
            //                     </div>
            //                     </a>
            //                     <h3 class="text-dark"><a href="shop_single.php?product_sid='.$product_id.'">'.$row["name"].'</a></h3>
            //                     <p class="price">'.$product_price.'Frw/pack &nbsp;&nbsp;&nbsp; <span class="text-info"><b>'.$counts.'</b></span></p>

            //                   </div>
    				//             ';
    				//     }
		        // }

            include '../Connect/connection.php';

            // $query_product = mysqli_query($con, "SELECT DISTINCT products.*, bookings.packs_count 
            //     FROM products 
            //     LEFT JOIN bookings ON products.p_id = bookings.p_fk_id");

            // $selectedProducts = []; // Create an array to keep track of selected product IDs

            // while ($row = mysqli_fetch_assoc($query_product)) {
            //     $product_id = $row['p_id'];

            //     // Check if the product has already been displayed
            //     if (in_array($product_id, $selectedProducts)) {
            //         continue; // Skip this product as it's already displayed
            //     } else {
            //         $selectedProducts[] = $product_id; // Add the product ID to the selected array
            //     }

            //     $pro_count = $row['quantity'];
            //     $book = $row['packs_count'];
            //     $product_price = $row['price'];

            //     $remaining_count = $pro_count - $book;

            //     if ($remaining_count <= 0) {
            //         continue; // Skip products with no remaining count
            //     }

            //     $message = ($remaining_count == 1) ? "Only $remaining_count pack left" : "Only $remaining_count packs left";

            //     echo '
            //     <div class="text-center item mb-4 item-v2">
            //         <span class="onsale">Sale</span>
            //         <a href="shop_single.php?product_id='.$product_id.'" style="text-align:center;">
            //             <div>
            //                 <img src="../style/assets/images/drug/'.$row["image"].'" alt="Image" style="padding:0px 50px 0px 50px;height:350px;" class="image-container">
            //             </div>
            //         </a>
            //         <h3 class="text-dark"><a href="shop_single.php?product_sid='.$product_id.'">'.$row["name"].'</a></h3>
            //         <p class="price">'.$product_price.'Frw/pack &nbsp;&nbsp;&nbsp; <span class="text-info"><b>'.$message.'</b></span></p>
            //     </div>';
            // }

            include '../Connect/connection.php';

            // Specific product ID for which you want to update packs_count
            $specific_product_id = 1; // Replace this with your desired product ID

            // Query to update the packs_count for the specific product ID
            $update_query = "UPDATE bookings SET packs_count = 10 WHERE p_fk_id = $specific_product_id";

            // Execute the update query
            $updated = mysqli_query($con, $update_query);

            if ($updated) {
                echo "Packs count updated successfully for product ID: $specific_product_id";
            } else {
                echo "Failed to update packs count for product ID: $specific_product_id";
            }

            // Fetch and display products as before
            $query_product = mysqli_query($con, "SELECT DISTINCT products.*, bookings.packs_count FROM products LEFT JOIN bookings ON products.p_id = bookings.p_fk_id");

            $selectedProducts = [];

            while ($row = mysqli_fetch_assoc($query_product)) {
                $product_id = $row['p_id'];

                if (in_array($product_id, $selectedProducts)) {
                    continue;
                } else {
                    $selectedProducts[] = $product_id;
                }

                // Your existing display code remains here
                $pro_count = $row['quantity'];
                $book = $row['packs_count'];
                $product_price = $row['price'];
                $remaining_count = $pro_count - $book;

                if ($product_id === $specific_product_id) {
                    // Update packs_count specifically for the displayed product
                    $book = 10; // Change 10 to the desired value
                }

                if ($remaining_count <= 0) {
                    continue;
                }

                $message = ($remaining_count == 1) ? "Only $remaining_count pack left" : "Only $remaining_count packs left";

                echo '
                <div class="text-center item mb-4 item-v2">
                    <span class="onsale">Sale</span>
                    <a href="shop_single.php?product_id='.$product_id.'" style="text-align:center;">
                        <div>
                            <img src="../style/assets/images/drug/'.$row["image"].'" alt="Image" style="padding:0px 50px 0px 50px;height:350px;" class="image-container">
                        </div>
                    </a>
                    <h3 class="text-dark"><a href="shop_single.php?product_sid='.$product_id.'">'.$row["name"].'</a></h3>
                    <p class="price">'.number_format($product_price).'Frw/pack &nbsp;&nbsp;&nbsp; <span class="text-info"><b>'.$message.'</b></span></p>
                </div>';
            }
		        

            ?>

              
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