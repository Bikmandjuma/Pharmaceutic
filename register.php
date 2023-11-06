<?php
    
    session_start();
    include_once('Connect/connection.php');
    include_once 'phpcode/codes.php';

    $name_required=$name_validate=$email_required=$email_validate=$phone_required=$phone_validate=$phone_validate_counts1=$phone_validate_counts2=$re_password_str_len=$password_confirmation=$password_str_len=$password_required=$re_password_required=null;
    $name=$email=$phone=$password=$re_password=$email_already_taken=$phone_already_taken=null;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['submit_register'])) {
            $name=test_input($_POST['name']);
            $email=test_input($_POST['email']);
            $phone=test_input($_POST['phone']);
            $password=test_input($_POST['password']);
            $re_password=test_input($_POST['re_password']);

            //email already exist
            $sql_email="SELECT email FROM customers where email='".$email."'";
            $query_email=mysqli_query($con,$sql_email);
            $validate_nums_email=mysqli_num_rows($query_email);

            //email already exist
            $sql_phone="SELECT * FROM customers where phone='".$phone."'";
            $query_phone=mysqli_query($con,$sql_phone);
            $validate_nums_phone=mysqli_num_rows($query_phone);

            $pattern_name = '/^[A-Za-z]+$/';
            $phone_pattern = '/^[0-9]+$/';
            $email_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

            if (empty($name)) {
                $name_required='<p id="error_field">Name field is required !</p>';
            }elseif(!preg_match($pattern_name, $name)){
                $name_validate='<p id="error_field">Name contains only characters !</p>';
            }elseif (empty($email)) {
                $email_required='<p id="error_field">Email field is required !</p>';
            }elseif(!preg_match($email_pattern, $email)) {
                $email_validate='<p id="error_field">Enter valid email !</p>';
            }elseif ($validate_nums_email == 1) {
                $email_already_taken='<p id="error_field">Email address already taken !</p>';
            }elseif(empty($phone)) {
                $phone_required='<p id="error_field">phone field is required !</p>';
            }elseif(!preg_match($phone_pattern, $phone)) {
                $phone_validate='<p id="error_field">phone contains only numbers !</p>';
            }elseif(strlen($phone) < 10) {
                $phone_validate_counts1='<p id="error_field">phone contains 10 numerics !</p>';
            }elseif(strlen($phone) > 10) {
                $phone_validate_counts2='<p id="error_field">phone contains 10 numerics !</p>';
            }elseif ($validate_nums_phone == 1) {
                    $phone_already_taken='<p id="error_field">Phone number already taken !</p>';
            }elseif (empty($password)) {
                $password_required='<p id="error_field">Password field is required !</p>';
            }elseif (strlen($password) < 8) {
                $password_str_len='<p id="error_field">Password must be at least 8 characters !</p>';
            }elseif (empty($re_password)) {
                $re_password_required='<p id="error_fields">Re_enter password field is required !</p>';
            }elseif (strlen($re_password) < 8) {
                $re_password_str_len='<p id="error_fields">Re_enter password must be at least 8 characters !</p>';
            }elseif ($password != $re_password) {
                $password_confirmation="<p id='error_fields'>Password do not much !</p>";
            }else{

                    $pswd=md5($password);
                    $sql="INSERT INTO customers values ('','$name','$email','$phone','$pswd')";
                    $query=mysqli_query($con,$sql);
                    if ($query == true) {
                        header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");  
                    }else{
                         ?>
                            <script>
                                alert('fail to register');
                            </script>
                          <?php
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
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pharmaceutic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/fonts/icomoon/style.css">
  <link rel="stylesheet" href="style/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="style/css/magnific-popup.css">
  <link rel="stylesheet" href="style/css/jquery-ui.css">
  <link rel="stylesheet" href="style/css/owl.carousel.min.css">
  <link rel="stylesheet" href="style/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="style/css/aos.css">
  <link rel="stylesheet" href="style/css/style.css">
  <!-- Favicon icon -->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css" href="style/assets/css/bootstrap/css/bootstrap.min.css">
  <!-- themify-icons line icon -->
  <link rel="stylesheet" type="text/css" href="style/assets/icon/themify-icons/themify-icons.css">
  <!-- ico font -->
  <link rel="stylesheet" type="text/css" href="style/assets/icon/icofont/css/icofont.css">
  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="style/assets/css/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    #error_field{
      color:red;
      margin-top:-15px;
      text-align:center;
    }

    #error_fields{
      color:red;
      text-align:center;
    }
  </style>
</head>

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
              <a href="#" class="js-logo-clone"><strong class="text-success">Pharma</strong>ceutic</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <?php include 'NavBar.php';?>
          </div>
            <?php include 'ShoppingBag.php';?>
        </div>
      </div>
    </div>

    <div class="#">
      <div class="site-blocks-cover overlay" style="background-image: url('style/images/pills.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto align-self-center">
              
                    <div class="login-card card-block auth-body mr-auto ml-auto" style="margin-top:-120px;">
                        <form class="md-float-material" action="#" method="POST">
                            
                              <div class="auth-box">
                                    <div class="row m-b-20">
                                        <div class="col-md-12 text-center">
                                            <h3 class="text-primary">Sign Up</h3>
                                        </div>
                                    </div>
                                    <hr/>
                                
                                    <div class="input-group">
                                        <span class="input-group-addon" id="name"><i class="icofont icofont-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter your names" title="Enter your email" data-toggle="tooltip" name="name" value="<?php echo $name;?>">
                                        
                                    </div>
                                    <?php echo $name_required.$name_validate;?>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon" id="email"><i class="icofont icofont-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter your email" title="Enter your email" data-toggle="tooltip" name="email" value="<?php echo $email;?>">
                                      
                                    </div>
                                    <?php echo $email_required.$email_validate.$email_already_taken;?>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon" id="phone"><i class="icofont icofont-phone"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter your phone" title="Enter your email" data-toggle="tooltip" name="phone" value="<?php echo $phone;?>">
                                       
                                    </div>
                                    <?php echo $phone_required.$phone_validate.$phone_validate_counts1.$phone_validate_counts2.$phone_already_taken;?>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon" id="password"><i class="icofont icofont-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Enter your password" title="Enter your email" data-toggle="tooltip" name="password" id="pswdid1" value="<?php echo $password;?>">
                                        <span class="input-group-addon">
                                            <i class="fa fa-eye-slash" id="ShowPswd1" onclick="ShowPswdFn1()"></i>
                                            <i class="fa fa-eye" id="ShowPswdSlash1" onclick="ShowPswdFn11()" style="display:none;"></i>
                                        </span>
                                       
                                    </div>
                                    <?php echo $password_required.$password_str_len.$password_confirmation;?>

                                     <div class="input-group mb-3">
                                        <span class="input-group-addon" id="password"><i class="icofont icofont-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Re-Enter your password" title="Enter your email" data-toggle="tooltip" name="re_password" id="pswdid2" value="<?php echo $re_password;?>">
                                        <span class="input-group-addon">
                                            <i class="fa fa-eye-slash" id="ShowPswd2" onclick="ShowPswdFn2()"></i>
                                            <i class="fa fa-eye" id="ShowPswdSlash2" onclick="ShowPswdFn22()" style="display:none;"></i>
                                        </span>
                                        <?php echo $re_password_required.$re_password_str_len;?>
                                    </div>

                                    <div class="row m-t-30">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" style="width: 150px; border-radius:30px; background-color: steelblue;color: white;" class="btn bg-primary btn-md btn-block waves-effect text-center m-b-20 mx-auto" name="submit_register"> Register <i class="fa fa-save"></i> </button>
                                        </div>
                                    </div>
                                <hr/s>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        Already have an account &nbsp;<a href="login.php" class="waves-effect text-primary m-b-20 mx-auto"> Login <i class="fa fa-lock-open"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- Authentication card end -->

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

   <script>
        function ShowPswdFn1(){
          var x=document.getElementById('pswdid1');

          if (x.type === "password") {
            x.type = "text";
            document.getElementById('ShowPswdSlash1').style.display="block";
            document.getElementById('ShowPswd1').style.display="none";
          }else{
            x.type="password";
          }

        }

        function ShowPswdFn11(){
          var x=document.getElementById('pswdid1');

          if (x.type === "text") {
            x.type = "password";
            document.getElementById('ShowPswdSlash1').style.display="none";
            document.getElementById('ShowPswd1').style.display="block";
          }else{
            x.type="password";
          }

        }


        //second field
         function ShowPswdFn2(){
          var x=document.getElementById('pswdid2');

          if (x.type === "password") {
            x.type = "text";
            document.getElementById('ShowPswdSlash2').style.display="block";
            document.getElementById('ShowPswd2').style.display="none";
          }else{
            x.type="password";
          }

        }

        function ShowPswdFn22(){
          var x=document.getElementById('pswdid2');

          if (x.type === "text") {
            x.type = "password";
            document.getElementById('ShowPswdSlash2').style.display="none";
            document.getElementById('ShowPswd2').style.display="block";
          }else{
            x.type="password";
          }

        }

    </script>

  <script src="style/js/jquery-3.3.1.min.js"></script>
  <script src="style/js/jquery-ui.js"></script>
  <script src="style/js/popper.min.js"></script>
  <script src="style/js/bootstrap.min.js"></script>
  <script src="style/js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="style/js/aos.js"></script>
  <script src="style/js/main.js"></script>
  <script type="text/javascript" src="style/assets/js/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="style/assets/js/jquery-ui/jquery-ui.min.js"></script>
  <script type="text/javascript" src="style/assets/js/popper.js/popper.min.js"></script>
  <script type="text/javascript" src="style/assets/js/bootstrap/js/bootstrap.min.js"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="style/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="style/assets/js/modernizr/modernizr.js"></script>
  <script type="text/javascript" src="style/assets/js/modernizr/css-scrollbars.js"></script>
  <script type="text/javascript" src="style/assets/js/common-pages.js"></script>
</body>

</html>