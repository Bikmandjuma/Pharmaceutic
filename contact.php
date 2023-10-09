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
          <?php include 'ShoppingBag.php';?>
        </div>
      </div>
    </div>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Contact</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5 text-black">Get In Touch</h2>
          </div>
          <div class="col-md-12">

            <?php
                
                include_once('Connect/connection.php');
                $data_inserted=$data_not_inserted=null;
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    // Validate and sanitize user inputs (e.g., use mysqli_real_escape_string)
                    if (isset($_POST['Submit_Contact'])) {
                        $name=test_input(mysqli_real_escape_string($con,$_POST['c_name']));
                        $email=test_input(mysqli_real_escape_string($con,$_POST['c_email']));
                        $subject=test_input(mysqli_real_escape_string($con,$_POST['c_subject']));
                        $message=test_input(mysqli_real_escape_string($con,$_POST['c_message']));
                    
                        // Insert data into the database using prepared statements
                        $stmt = $con->prepare("INSERT INTO contact VALUES (NULL, ?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $name, $email, $subject, $message);
                        if ($stmt->execute()) {
                            ?>
                                <script>
                                  
                                  setTimeout(function(){
                                      var required=document.getElementById('data_inserted');
                                      required.style.display="block";
                                      required.style.display="none";
                                  },6000);

                                </script>
                            <?php
                            
                            $data_inserted ='<p style="color:white;padding:10px;border-radius:5px;text-align:center;font-style:italic;" id="data_inserted" class="bg-info"><i class="icon-check"></i>&nbsp;&nbsp;<b>Message sent , you will be replied soon !</b></p>';
                        
                        }else {
                            // Handle the case where the form was not submitted
                            ?>
                                <script>
                                  
                                  setTimeout(function(){
                                      var required=document.getElementById('data_not_inserted');
                                      required.style.display="block";
                                      required.style.display="none";
                                  },6000);

                                </script>
                            <?php
                            
                            $data_not_inserted='<p style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;" id="data_not_inserted">Message not sent !</p>'.mysqli_error();
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

            <div class="form-group row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <?php echo $data_inserted.$data_not_inserted;?> 
                  </div>
                  <div class="col-md-4"></div>
            </div>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_name" class="text-black">Names <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_name" placeholder="Enter names" required>

                     <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="Enter email" required>

                    <label for="c_subject" class="text-black">Subject </label>
                    <input type="text" class="form-control" id="c_subject" name="c_subject" placeholder="Enter subject" required>

                  </div>
                  <div class="col-md-6">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="c_message" placeholder="Typing message . . . . " id="c_message" cols="30" rows="5" class="form-control" required></textarea>
                    <div class="mt-4 text-center">
                      <button type="submit" class="btn btn-primary" name="Submit_Contact">Send Message&nbsp;<i class="icon-send"></i></button>
                    </div>
                  </div>

                </div>
               
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    
  <?php include 'footer.php';?>

  </div>

  <?php include 'bottom_script_links.php'; ?>

</body>

</html>