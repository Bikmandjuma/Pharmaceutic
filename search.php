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

    <?php
        
        include 'Connect/connection.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (isset($_POST['SubmitSearch'])) {
                        $searchTerm = $_POST['search'];

                        // Perform the database query
                        $sql="SELECT * FROM products left join bookings on products.p_id=bookings.p_fk_id WHERE products.name LIKE '%$searchTerm%'";
                        $result = mysqli_query($con, $sql);
                        $num=mysqli_num_rows($result);

                        if ($num == 0) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2 style="font-family:sans-serif;font-style: italic;">No result of <span class="text-danger"><b><?php echo $searchTerm;?></b></span> found !</h2>
                                        <img src='style/assets/images/NoSearch.jpg'>
                                    </div>
                                </div>
                            <?php
                        }else{

                            if ($result) {
                                // Display search results
                                    ?>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h3 style="font-family:sans-serif;font-style: italic;">Searching : <span class="text-danger"><b><?php echo $num;?></b></span> results found !</h3>
                                            </div>
                                        </div>
                                    <?php                                    
                                
                                echo '<table class="table table-bordered table-striped text-center" style="padding:20px;">';
                                echo "<tr>
                                        <th>N<sup>o</sup></th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Left_in_store</th>
                                        <th>Action</th>
                                      </tr>";
                                $count=1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $pro_count=$row['quantity'];
                                    $book=$row['packs_count'];
                                    $counts=$pro_count-$book;

                                    if ($counts == 1) {
                                      $counts=$counts." package";
                                    }else{
                                      $counts=$counts." packages";
                                    }

                                    echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td><img src='style/assets/images/drug/".$row['image']."' style='width:30px;height:50px;'></td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td>".$counts."</td>";
                                        echo "<td><a href='shop_single.php?product_id=".$row['p_id']."'><i class='fa fa-eye'></i></a></td>";
                                    echo "</tr>";
                                }
                                echo '</table>';
                            } else {
                                echo "Error: " . mysqli_error($conn) ;
                            }

                        }

                }

        }

        function test_input($data){
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
              
            return $data;
        }
    ?>
    
  <!--?php include 'footer.php';?-->

  </div>

  <?php include 'bottom_script_links.php'; ?>

</body>

</html>