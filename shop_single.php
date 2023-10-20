<!DOCTYPE html>
<html lang="en">
<?php include 'header_links.php';?>
<style>
  #signs_id:hover{
    cursor: pointer;
    color: green;
    transform: scale(1.1);
  }


.cd-add-to-cart {
  display: inline-block;
  padding: 1.2em 1.8em;
  background: #2c97de;
  border-radius: 50em;
  text-transform: uppercase;
  color: #ffffff;
  font-weight: 700;
  letter-spacing: .1em;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  -webkit-transition: all .2s;
  transition: all .2s;
}
.cd-add-to-cart:hover {
  background: #42a2e1;
}
.cd-add-to-cart:active {
  -webkit-transform: scale(0.9);
      -ms-transform: scale(0.9);
          transform: scale(0.9);
}

/* -------------------------------- 

Main Components 

-------------------------------- */
.cd-cart-container::before {
  /* dark bg layer visible when the cart is open */
  content: '';
  position: fixed;
  z-index: 1;
  height: 100vh;
  width: 100vw;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity .4s, visibility .4s;
  transition: opacity .4s, visibility .4s;
}

.cd-cart-container.cart-open::before {
  opacity: 1;
  visibility: visible;
}

.cd-cart-trigger,
.cd-cart {
  position: fixed;
  bottom: 20px;
  right: 5%;
  -webkit-transition: -webkit-transform .2s;
  transition: -webkit-transform .2s;
  transition: transform .2s;
  transition: transform .2s, -webkit-transform .2s;
  /* Force Hardware Acceleration in WebKit */
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  -webkit-backface-visibility: hidden;
  will-change: transform;
  backface-visibility: hidden;
}
.empty .cd-cart-trigger, .empty
.cd-cart {
  /* hide cart */
  -webkit-transform: translateY(150px);
      -ms-transform: translateY(150px);
          transform: translateY(150px);
}
@media only screen and (min-width: 1170px) {
  .cd-cart-trigger,
  .cd-cart {
    bottom: 40px;
  }
}

.cd-cart-trigger {
  /* button that triggers the cart content */
  z-index: 3;
  height: 72px;
  width: 72px;
  /* replace text with image */
  text-indent: 100%;
  color: transparent;
  white-space: nowrap;
  background: #da7c34;
}
.cd-cart-trigger::after, .cd-cart-trigger::before {
  /* used to create the cart/'X' icon */
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  bottom: auto;
  right: auto;
  -webkit-transform: translateX(-50%) translateY(-50%);
      -ms-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
  height: 100%;
  width: 100%;
  background: url(https://cdn.onlinewebfonts.com/svg/img_333096.svg) no-repeat 0 0;
  -webkit-transition: opacity .2s, -webkit-transform .2s;
  transition: opacity .2s, -webkit-transform .2s;
  transition: opacity .2s, transform .2s;
  transition: opacity .2s, transform .2s, -webkit-transform .2s;
}
.cd-cart-trigger::after {
  /* 'X' icon */
  background-position: -72px 0;
  opacity: 0;
  -webkit-transform: translateX(-50%) translateY(-50%) rotate(90deg);
      -ms-transform: translateX(-50%) translateY(-50%) rotate(90deg);
          transform: translateX(-50%) translateY(-50%) rotate(90deg);
}
.cart-open .cd-cart-trigger::before {
  opacity: 0;
}
.cart-open .cd-cart-trigger::after {
  opacity: 1;
  -webkit-transform: translateX(-50%) translateY(-50%);
      -ms-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
}
.cd-cart-trigger .count {
  /* number of items indicator */
  position: absolute;
  top: -10px;
  right: -10px;
  height: 28px;
  width: 28px;
  background: #e94b35;
  color: #ffffff;
  font-size: 1.5rem;
  font-weight: bold;
  border-radius: 50%;
  text-indent: 0;
  -webkit-transition: -webkit-transform .2s .5s;
  transition: -webkit-transform .2s .5s;
  transition: transform .2s .5s;
  transition: transform .2s .5s, -webkit-transform .2s .5s;
}
.cd-cart-trigger .count li {
  /* this is the number of items in the cart */
  position: absolute;
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  left: 50%;
  top: 50%;
  bottom: auto;
  right: auto;
  -webkit-transform: translateX(-50%) translateY(-50%);
      -ms-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
}
.cd-cart-trigger .count li:last-of-type {
  visibility: hidden;
}
.cd-cart-trigger .count.update-count li:last-of-type {
  -webkit-animation: cd-qty-enter .15s;
          animation: cd-qty-enter .15s;
  -webkit-animation-direction: forwards;
          animation-direction: forwards;
}
.cd-cart-trigger .count.update-count li:first-of-type {
  -webkit-animation: cd-qty-leave .15s;
          animation: cd-qty-leave .15s;
  -webkit-animation-direction: forwards;
          animation-direction: forwards;
}
.cart-open .cd-cart-trigger .count {
  -webkit-transition: -webkit-transform .2s 0s;
  transition: -webkit-transform .2s 0s;
  transition: transform .2s 0s;
  transition: transform .2s 0s, -webkit-transform .2s 0s;
  -webkit-transform: scale(0);
      -ms-transform: scale(0);
          transform: scale(0);
}
.empty .cd-cart-trigger .count {
  /* fix bug - when cart is empty, do not animate count */
  -webkit-transform: scale(1);
      -ms-transform: scale(1);
          transform: scale(1);
}
.cd-cart-trigger:hover + div .wrapper {
  box-shadow: 0 6px 40px rgba(0, 0, 0, 0.3);
}
.cart-open .cd-cart-trigger:hover + div .wrapper {
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.17);
}

.cd-cart {
  /* cart content */
  z-index: 2;
  width: 90%;
  max-width: 440px;
  height: 400px;
  max-height: 90%;
  pointer-events: none;
}
.cd-cart .wrapper {
  position: absolute;
  bottom: 0;
  right: 0;
  z-index: 2;
  overflow: hidden;
  height: 72px;
  width: 72px;
  border-radius: 6px;
  -webkit-transition: height .4s .1s, width  .4s .1s, box-shadow .3s;
  transition: height .4s .1s, width  .4s .1s, box-shadow .3s;
  -webkit-transition-timing-function: cubic-bezier(0.67, 0.17, 0.32, 0.95);
          transition-timing-function: cubic-bezier(0.67, 0.17, 0.32, 0.95);
  background: #ffffff;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.17);
  pointer-events: auto;
}
.cd-cart header, .cd-cart footer {
  position: absolute;
  z-index: 2;
  left: 0;
  width: 100%;
}
.cd-cart header, .cd-cart .body {
  opacity: 0;
}
.cd-cart header {
  top: 0;
  border-radius: 6px 6px 0 0;
  padding: 0 1.4em;
  height: 40px;
  line-height: 40px;
  background-color: #ffffff;
  -webkit-transition: opacity .2s 0s;
  transition: opacity .2s 0s;
  border-bottom: 1px solid #e6e6e6;
}
.cd-cart header::after {
  clear: both;
  content: "";
  display: block;
}
.cd-cart footer {
  bottom: 0;
  border-radius: 0 0 6px 6px;
  box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.15);
  background: #ffffff;
}
.cd-cart h2 {
  text-transform: uppercase;
  display: inline-block;
  font-size: 1.4rem;
  font-weight: 700;
  letter-spacing: .1em;
}
.cd-cart .undo {
  float: right;
  font-size: 1.2rem;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity .2s, visibility .2s;
  transition: opacity .2s, visibility .2s;
  color: #808b97;
}
.cd-cart .undo a {
  text-decoration: underline;
  color: #2b3e51;
}
.cd-cart .undo a:hover {
  color: #2c97de;
}
.cd-cart .undo.visible {
  opacity: 1;
  visibility: visible;
}
.cd-cart .checkout {
  display: block;
  height: 72px;
  line-height: 72px;
  margin-right: 72px;
  background: #2c97de;
  color: rgba(255, 255, 255, 0);
  text-align: center;
  font-size: 1.8rem;
  font-weight: 600;
  -webkit-transition: all .2s 0s;
  transition: all .2s 0s;
}
.cd-cart .checkout:hover {
  background: #399ee0;
}
.cd-cart .checkout em {
  position: relative;
  display: inline-block;
  -webkit-transform: translateX(40px);
      -ms-transform: translateX(40px);
          transform: translateX(40px);
  -webkit-transition: -webkit-transform 0s .2s;
  transition: -webkit-transform 0s .2s;
  transition: transform 0s .2s;
  transition: transform 0s .2s, -webkit-transform 0s .2s;
}
.cd-cart .checkout em::after {
  position: absolute;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
          transform: translateY(-50%);
  right: 0;
  content: '';
  height: 24px;
  width: 24px;
  background: url(../img/cd-icon-arrow-next.svg) no-repeat center center;
  opacity: 0;
  -webkit-transition: opacity .2s;
  transition: opacity .2s;
}
.cd-cart .body {
  position: relative;
  z-index: 1;
  height: calc(100% - 40px);
  padding: 20px 0 10px;
  margin: 40px 0 10px;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
  -webkit-transition: opacity .2s;
  transition: opacity .2s;
}
.cd-cart .body ul {
  overflow: hidden;
  padding: 0 1.4em;
  position: relative;
  padding-bottom: 90px;
}
.cd-cart .body li {
  position: relative;
  opacity: 0;
  -webkit-transform: translateX(80px);
      -ms-transform: translateX(80px);
          transform: translateX(80px);
  -webkit-transition: opacity 0s .2s, -webkit-transform 0s .2s;
  transition: opacity 0s .2s, -webkit-transform 0s .2s;
  transition: opacity 0s .2s, transform 0s .2s;
  transition: opacity 0s .2s, transform 0s .2s, -webkit-transform 0s .2s;
}
.cd-cart .body li::after {
  clear: both;
  content: "";
  display: block;
}
.cd-cart .body li:not(:last-of-type) {
  margin-bottom: 20px;
}
.cd-cart .body li.deleted {
  /* this class is added to an item when it is removed form the cart */
  position: absolute;
  left: 1.4em;
  width: calc(100% - 2.8em);
  opacity: 0;
  -webkit-animation: cd-item-slide-out .3s forwards;
          animation: cd-item-slide-out .3s forwards;
}
.cd-cart .body li.deleted.undo-deleted {
  /* used to reinsert an item deleted from the cart when user clicks 'Undo' */
  -webkit-animation: cd-item-slide-in .3s forwards;
          animation: cd-item-slide-in .3s forwards;
}
.cd-cart .body li.deleted + li {
  -webkit-animation: cd-item-move-up-mobile .3s;
          animation: cd-item-move-up-mobile .3s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}
.cd-cart .body li.undo-deleted + li {
  -webkit-animation: cd-item-move-down-mobile .3s;
          animation: cd-item-move-down-mobile .3s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}
.cd-cart .product-image {
  display: inline-block;
  float: left;
  /* the image height determines the height of the list item - in this case height = width */
  width: 50px;
}
.cd-cart .product-image img {
  display: block;
}
.cd-cart .product-details {
  position: relative;
  display: inline-block;
  float: right;
  width: calc( 100% - 50px);
  padding: 0.3em 0 0 0.5em;
}
.cd-cart .product-details::after {
  clear: both;
  content: "";
  display: block;
}
.cd-cart h3, .cd-cart .price {
  font-weight: bold;
}
.cd-cart h3 {
  width: 70%;
  float: left;
  /* truncate title with dots if too long */
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.cd-cart h3 a {
  color: #2b3e51;
}
.cd-cart h3 a:hover {
  color: #2c97de;
}
.cd-cart .price {
  float: right;
  width: 30%;
  text-align: right;
}
.cd-cart .actions {
  font-size: 1.4rem;
  height: 1.6em;
  line-height: 1.6em;
}
.cd-cart .actions::after {
  clear: both;
  content: "";
  display: block;
}
.cd-cart .delete-item, .cd-cart .quantity {
  float: left;
  color: #808b97;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.cd-cart .delete-item {
  margin-right: 1em;
}
.cd-cart .delete-item:hover {
  color: #e94b35;
}
.cd-cart .quantity label {
  display: inline-block;
  margin-right: .3em;
}
.cd-cart .select {
  position: relative;
}
.cd-cart .select::after {
  /* switcher arrow for select element */
  content: '';
  position: absolute;
  z-index: 1;
  right: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
          transform: translateY(-50%);
  display: block;
  width: 12px;
  height: 12px;
  background: url(../img/cd-icon-select.svg) no-repeat center center;
  pointer-events: none;
}
.cd-cart select {
  position: relative;
  padding: 0 1em 0 0;
  cursor: pointer;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background: transparent;
  border: none;
  border-radius: 0;
  font-size: 1.4rem;
  margin: 0;
  color: #808b97;
}
.cd-cart select:focus {
  outline: none;
  color: #2b3e51;
  box-shadow: 0 1px 0 currentColor;
}
.cd-cart select::-ms-expand {
  /* hide default select arrow on IE */
  display: none;
}
.cart-open .cd-cart .wrapper {
  height: 100%;
  width: 100%;
  -webkit-transition-delay: 0s;
          transition-delay: 0s;
}
.cart-open .cd-cart header, .cart-open .cd-cart .body {
  opacity: 1;
}
.cart-open .cd-cart header {
  -webkit-transition: opacity .2s .2s;
  transition: opacity .2s .2s;
}
.cart-open .cd-cart .body {
  -webkit-transition: opacity 0s;
  transition: opacity 0s;
}
.cart-open .cd-cart .body li {
  -webkit-transition: opacity .3s .2s, -webkit-transform .3s .2s;
  transition: opacity .3s .2s, -webkit-transform .3s .2s;
  transition: transform .3s .2s, opacity .3s .2s;
  transition: transform .3s .2s, opacity .3s .2s, -webkit-transform .3s .2s;
  opacity: 1;
  -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
          transform: translateX(0);
}
.cart-open .cd-cart .body li:nth-of-type(2) {
  -webkit-transition-duration: .4s;
          transition-duration: .4s;
}
.cart-open .cd-cart .body li:nth-of-type(3) {
  -webkit-transition-duration: .5s;
          transition-duration: .5s;
}
.cart-open .cd-cart .body li:nth-of-type(4), .cart-open .cd-cart .body li:nth-of-type(5) {
  -webkit-transition-duration: .55s;
          transition-duration: .55s;
}
.cart-open .cd-cart .checkout {
  color: #ffffff;
  -webkit-transition: color .2s .3s;
  transition: color .2s .3s;
}
.cart-open .cd-cart .checkout em {
  -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
          transform: translateX(0);
  -webkit-transition: padding .2s 0s, -webkit-transform .2s .3s;
  transition: padding .2s 0s, -webkit-transform .2s .3s;
  transition: transform .2s .3s, padding .2s 0s;
  transition: transform .2s .3s, padding .2s 0s, -webkit-transform .2s .3s;
}
.cart-open .cd-cart .checkout:hover em {
  padding-right: 30px;
}
.cart-open .cd-cart .checkout:hover em::after {
  opacity: 1;
}
@media only screen and (min-width: 768px) {
  .cd-cart .body li:not(:last-of-type) {
    margin-bottom: 14px;
  }
  .cd-cart .body li.deleted + li {
    -webkit-animation: cd-item-move-up .3s;
            animation: cd-item-move-up .3s;
  }
  .cd-cart .body li.undo-deleted + li {
    -webkit-animation: cd-item-move-down .3s;
            animation: cd-item-move-down .3s;
  }
  .cd-cart .checkout {
    font-size: 2.4rem;
  }
  .cd-cart .product-image {
    width: 90px;
  }
  .cd-cart .product-details {
    padding: 1.4em 0 0 1em;
    width: calc( 100% - 90px);
  }
  .cd-cart h3, .cd-cart .price {
    font-size: 1.8rem;
  }
}

@-webkit-keyframes cd-qty-enter {
  0% {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translateX(-50%) translateY(0);
            transform: translateX(-50%) translateY(0);
  }
  100% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
  }
}

@keyframes cd-qty-enter {
  0% {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translateX(-50%) translateY(0);
            transform: translateX(-50%) translateY(0);
  }
  100% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
  }
}
@-webkit-keyframes cd-qty-leave {
  0% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
  }
  100% {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translateX(-50%) translateY(-100%);
            transform: translateX(-50%) translateY(-100%);
  }
}
@keyframes cd-qty-leave {
  0% {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
  }
  100% {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translateX(-50%) translateY(-100%);
            transform: translateX(-50%) translateY(-100%);
  }
}
@-webkit-keyframes cd-item-move-up-mobile {
  0% {
    padding-top: 70px;
  }
  100% {
    padding-top: 0px;
  }
}
@keyframes cd-item-move-up-mobile {
  0% {
    padding-top: 70px;
  }
  100% {
    padding-top: 0px;
  }
}
@-webkit-keyframes cd-item-move-up {
  0% {
    padding-top: 104px;
  }
  100% {
    padding-top: 0px;
  }
}
@keyframes cd-item-move-up {
  0% {
    padding-top: 104px;
  }
  100% {
    padding-top: 0px;
  }
}
@-webkit-keyframes cd-item-move-down-mobile {
  0% {
    padding-top: 0px;
  }
  100% {
    padding-top: 70px;
  }
}
@keyframes cd-item-move-down-mobile {
  0% {
    padding-top: 0px;
  }
  100% {
    padding-top: 70px;
  }
}
@-webkit-keyframes cd-item-move-down {
  0% {
    padding-top: 0px;
  }
  100% {
    padding-top: 104px;
  }
}
@keyframes cd-item-move-down {
  0% {
    padding-top: 0px;
  }
  100% {
    padding-top: 104px;
  }
}
@-webkit-keyframes cd-item-slide-out {
  0% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
  100% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
    opacity: 0;
  }
}
@keyframes cd-item-slide-out {
  0% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
  100% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
    opacity: 0;
  }
}
@-webkit-keyframes cd-item-slide-in {
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
  0% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
    opacity: 0;
  }
}
@keyframes cd-item-slide-in {
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1;
  }
  0% {
    -webkit-transform: translateX(80px);
            transform: translateX(80px);
    opacity: 0;
  }
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
              href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $product_name.' , '.$product_mg_bottle.'mg';?>&nbsp;&nbsp;,&nbsp;&nbsp;<?php echo $product_price;?>Frw</strong></div>
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
            

            <!-- <p><strong class="text-primary h4"><span id="output"></span>Frw</strong></p> -->

            <!-- https://codyhouse.co/gem/add-to-cart-interaction/ -->
            <main>
                <a href="#0" class="cd-add-to-cart"  id="plusbtn" data-price="<?php echo $product_price;?>"><i class="fa fa-plus"></i>&nbsp;Add To Cart&nbsp;<i class="fas fa-shopping-cart"></i></a>
            </main>

            <div class="cd-cart-container empty">
              <a href="#0" class="cd-cart-trigger">
                Cart
                <ul class="count"> <!-- cart items count -->
                  <li>0</li>
                  <li>0</li>
                </ul> <!-- .count -->
              </a>

              <div class="cd-cart">
                <div class="wrapper">
                  <header>
                    <h2>Cart</h2>
                    <span class="undo">Item removed. <a href="#0">Undo</a></span>
                  </header>
                  
                  <div class="body">
                    <ul>
                      <!-- products added to the cart will be inserted here using JavaScript -->
                    </ul>
                  </div>

                  <footer>
                    <a href="#0" class="checkout btn"><em>Total:<span>0</span>Frw</em></a>
                  </footer>
                </div>
              </div> <!-- .cd-cart -->
            </div> <!-- cd-cart-container -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    jQuery(document).ready(function($){
  var cartWrapper = $('.cd-cart-container');
  //product id - you don't need a counter in your real project but you can use your real product id
  var productId = 0;

  if( cartWrapper.length > 0 ) {
    //store jQuery objects
    var cartBody = cartWrapper.find('.body')
    var cartList = cartBody.find('ul').eq(0);
    var cartTotal = cartWrapper.find('.checkout').find('span');
    var cartTrigger = cartWrapper.children('.cd-cart-trigger');
    var cartCount = cartTrigger.children('.count')
    var addToCartBtn = $('.cd-add-to-cart');
    var undo = cartWrapper.find('.undo');
    var undoTimeoutId;

    //add product to cart
    addToCartBtn.on('click', function(event){
      event.preventDefault();
      addToCart($(this));
    });

    //open/close cart
    cartTrigger.on('click', function(event){
      event.preventDefault();
      toggleCart();
    });

    //close cart when clicking on the .cd-cart-container::before (bg layer)
    cartWrapper.on('click', function(event){
      if( $(event.target).is($(this)) ) toggleCart(true);
    });

    //delete an item from the cart
    cartList.on('click', '.delete-item', function(event){
      event.preventDefault();
      removeProduct($(event.target).parents('.product'));
    });

    //update item quantity
    cartList.on('change', 'select', function(event){
      quickUpdateCart();
    });

    //reinsert item deleted from the cart
    undo.on('click', 'a', function(event){
      clearInterval(undoTimeoutId);
      event.preventDefault();
      cartList.find('.deleted').addClass('undo-deleted').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
        $(this).off('webkitAnimationEnd oanimationend msAnimationEnd animationend').removeClass('deleted undo-deleted').removeAttr('style');
        quickUpdateCart();
      });
      undo.removeClass('visible');
    });
  }

  function toggleCart(bool) {
    var cartIsOpen = ( typeof bool === 'undefined' ) ? cartWrapper.hasClass('cart-open') : bool;
    
    if( cartIsOpen ) {
      cartWrapper.removeClass('cart-open');
      //reset undo
      clearInterval(undoTimeoutId);
      undo.removeClass('visible');
      cartList.find('.deleted').remove();

      setTimeout(function(){
        cartBody.scrollTop(0);
        //check if cart empty to hide it
        if( Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
      }, 500);
    } else {
      cartWrapper.addClass('cart-open');
    }
  }

  function addToCart(trigger) {
    var cartIsEmpty = cartWrapper.hasClass('empty');
    //update cart product list
    addProduct();
    //update number of items 
    updateCartCount(cartIsEmpty);
    //update total price
    updateCartTotal(trigger.data('price'), true);
    //show cart
    cartWrapper.removeClass('empty');
  }

  function addProduct() {
    productId = productId + 1;
    var productAdded = $('<li class="product"><div class="product-image"><a href="#0"><img src="style/assets/images/drug/<?php echo $product_image;?>" width="40" height="60"></a></div><div class="product-details"><h3><a href="#0"><?php echo $product_name;?></a></h3><span class="price"><?php echo $product_price;?></span><div class="actions"><a href="#0" class="delete-item">Delete</a><div class="quantity"><label for="cd-product-'+ productId +'">Qty</label><span class="select"><select id="cd-product-'+ productId +'" name="quantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div></div></li>');
    cartList.prepend(productAdded);
  }

  function removeProduct(product) {
    clearInterval(undoTimeoutId);
    cartList.find('.deleted').remove();
    
    var topPosition = product.offset().top - cartBody.children('ul').offset().top ,
      productQuantity = Number(product.find('.quantity').find('select').val()),
      productTotPrice = Number(product.find('.price').text().replace('$', '')) * productQuantity;
    
    product.css('top', topPosition+'px').addClass('deleted');

    //update items count + total price
    updateCartTotal(productTotPrice, false);
    updateCartCount(true, -productQuantity);
    undo.addClass('visible');

    //wait 8sec before completely remove the item
    undoTimeoutId = setTimeout(function(){
      undo.removeClass('visible');
      cartList.find('.deleted').remove();
    }, 8000);
  }

  function quickUpdateCart() {
    var quantity = 0;
    var price = 0;
    
    cartList.children('li:not(.deleted)').each(function(){
      var singleQuantity = Number($(this).find('select').val());
      quantity = quantity + singleQuantity;
      price = price + singleQuantity*Number($(this).find('.price').text().replace('$', ''));
    });

    cartTotal.text(price.toFixed(2));
    cartCount.find('li').eq(0).text(quantity);
    cartCount.find('li').eq(1).text(quantity+1);
  }

  function updateCartCount(emptyCart, quantity) {
    if( typeof quantity === 'undefined' ) {
      var actual = Number(cartCount.find('li').eq(0).text()) + 1;
      var next = actual + 1;
      
      if( emptyCart ) {
        cartCount.find('li').eq(0).text(actual);
        cartCount.find('li').eq(1).text(next);
      } else {
        cartCount.addClass('update-count');

        setTimeout(function() {
          cartCount.find('li').eq(0).text(actual);
        }, 150);

        setTimeout(function() {
          cartCount.removeClass('update-count');
        }, 200);

        setTimeout(function() {
          cartCount.find('li').eq(1).text(next);
        }, 230);
      }
    } else {
      var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
      var next = actual + 1;
      
      cartCount.find('li').eq(0).text(actual);
      cartCount.find('li').eq(1).text(next);
    }
  }

  function updateCartTotal(price, bool) {
    bool ? cartTotal.text( (Number(cartTotal.text()) + Number(price)).toFixed(2) )  : cartTotal.text( (Number(cartTotal.text()) - Number(price)).toFixed(2) );
  }
});
  </script>

  <?php include 'bottom_script_links.php'; ?>

</body>

</html>