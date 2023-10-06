<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    ?>
      <script>
        window.location.href="../index.php";
      </script>
    <?php
  }

$name=$_SESSION['name'];
$customer_id=$_SESSION['c_id'];

if (strlen($name) > 7) {
    $customer_name = substr($name, 0, 6);
    $customer_names =$customer_name."....";
} else {
    $customer_names = $name;
}


include '../Connect/connection.php';
$query_product=mysqli_query($con,"SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id where  bookings.c_fk_id=$customer_id and bookings.status='not' and cancel='not'");
$nums=mysqli_num_rows($query_product);
?>

<a href="#" title="<?php echo $name;?>" ><span class="icon-user"><?php echo $customer_names;?></span></a>
<a href="cart.php" class="icons-btn d-inline-block bag">
    <span class="icon-shopping-bag"></span>
    <span class="number"><?php echo $nums;?></span>
</a>
<a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
  <span class="icon-menu"></span>
</a>