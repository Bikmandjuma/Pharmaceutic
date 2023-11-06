<?php
	
	session_start();
    $customer_id=$_SESSION['c_id'];
    $product_id=$_GET['product_id'];
    include '../Connect/connection.php';

	if (isset($_POST['CancelOrder'])) {
	    $query=mysqli_query($con,"DELETE FROM bookings where c_fk_id=$customer_id and p_fk_id=$product_id and status='not' and cancel='not'");
	    if ($query == true) {
	                                        
	        ?>
	        <script>
	            window.location.href="cart.php";
	        </script>
	        <?php
	    }
	}

?>