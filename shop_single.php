<!DOCTYPE html>
<html lang="en">
<?php include 'header_links.php';?>
<style>
  #signs_id:hover{
    cursor: pointer;
    color: green;
    transform: scale(1.1);
  }
</style>
<body>

  <div class="site-wrap">

    <div class="site-navbar py-2">

     <!--  <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div> -->

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone"><strong class="text-primary">Pharma</strong>ceutic</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <?php include 'NavBar.php';?>
          </div>
          <?php include 'ShoppingBag.php'; ?>
        </div>
      </div>
    </div>

    <?php
        include 'Connect/connection.php';
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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $product_name.' , '.$product_mg_bottle.'mg';?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row"> 
          <div class="col-md-5 mr-auto">
            <div style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.4);">
              <!-- <img src="../style/assets/images/drug/<?php echo $product_image;?>" alt="Image" class="img-fluid" style="padding: 20px 80px 20px 80px; height:600px;"> -->
              <div class="border text-center">
              <img src="style/assets/images/drug/<?php echo $product_image;?>" alt="Image" class="img-fluid image-container p-5">
            </div>
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
                
            </script>

            <p><a href="#" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" data-target="#ModalSignUpFirst" data-toggle="modal">Add To Cart</a></p>

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
                        $strlen=strlen($product_description);
                        if ($strlen % 2 == 0) {
                            $strlen=$strlen;
                        }else{
                            $strlen=$strlen+1;
                        }

                        $descr_pro_more=$descr_pro_less=$description=null;
                        if ($strlen < 120) {
                          ?>
                            <style>
                              #desc_more_id_btn{
                                display: none;
                              }
                            </style>
                          <?php

                          $description=$product_description;
                            
                        }else{
                            $strlen_half=$strlen / 2;
                            $descr_pro_more=substr($product_description,0,$strlen_half);
                            $descr_pro_less=substr($product_description,$strlen_half,$strlen);
                        }

                        

                      ?>
                      <tr>
                        <th scope="row"><?php echo 'NDC : '.$product_ndc;?></th>
                        <td>
                          <?php echo '<p id="desc_more_id">'.
                                      $descr_pro_more.$description.
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

    <!--start of Search drug modal -->
    <div class="modal" style="margin-top:200px;" id="ModalSignUpFirst" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-body text-center">
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4>Notification&nbsp;&nbsp;<i class="fa fa-bell"></i></h4>
          </div>
          <div class="modal-body">
            <div class="actionsBtns">
              
              <p><span style="color:black;"><b>N.B : </b></span>Adding product on cart , you have to get an account first!<br /></p>
              <ul>
                <li>If already have an account ,<span style="color:blue;" onclick="window.location.href='login.php'" id="signs_id"><strong>Sign in</strong></span><br /></li><br />
                <li>If don't have an account ,<span style="color:blue;" onclick="window.location.href='register.php'" id="signs_id"><strong>Sign up</strong></span><br /></li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--end of Search drug modal-->
    
  <?php include 'footer.php';?>

  </div>

  <?php include 'bottom_script_links.php'; ?>

</body>

</html>