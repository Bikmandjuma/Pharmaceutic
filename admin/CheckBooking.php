        <?php
        include '../Connect/connection.php';
 
        $sql_check_booking_count="SELECT products.name as pro_name,customers.name as cus_name,description,image,b_id FROM ((bookings INNER JOIN products ON products.p_id=bookings.p_fk_id)INNER JOIN customers ON customers.c_id=bookings.c_fk_id) where bookings.checking is NULL";
        $query_check_booking_count=mysqli_query($con,$sql_check_booking_count);
        while ($row=mysqli_fetch_assoc($query_check_booking_count)) {

            $desc_count=strlen($row['description']);
            if ($desc_count >= 50) {
                $description=substr($row['description'],0,50);
                $descr=$description.". . . .";
            }else{
                $descr=$row_product['description'];
            }
            
            echo '
                <li>
                    <div class="media">
                        <a href="Bookings.php" class="d-flex"">
                            <img class="align-self-center" src="../style/assets/images/drug/'.$row["image"].'" alt="Generic placeholder image" height="50" width="30">
                            <i class="badge bg-c-pink"></i>
                            <div class="media-body">
                                <h3 class="notification-user">customer : <strong>'.$row["cus_name"].'</strong></h3>
                                <hr>
                                <p class="notification-msg"><b>'.$row["pro_name"].'</b> : '.$descr.'</p>
                            </div>

                        </a>
                    </div>
                </li>

            ';

                                        // UPDATE bookings SET checking='checked' WHERE b_id="$row['b_id']



            
        }

    ?>
