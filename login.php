<?php
session_start();
include_once('Connect/connection.php');
include_once 'phpcode/codes.php';
$incorectcredential=$allfieldRequired=$user=$pass=$PostionOptionisEmpty=$message_account_is_blocked="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user=test_input($_POST['Username']);
    $pass=test_input($_POST['Password']);

    if (empty($user) || empty($pass)) {
        
        ?>
          <script>
            
            setTimeout(function(){
                var required=document.getElementById('login_fields_required');
                required.style.display="block";
                required.style.display="none";
            },4000);

          </script>
        <?php

        $allfieldRequired='<p style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;" id="login_fields_required">username & password fields are required !</p>';

    }else{
        $query_cutomers=mysqli_query($con,"SELECT c_id,name,email,phone,password FROM customers where email='$user' and password='".md5($pass)."'");
          $row_customers=mysqli_fetch_array($query_cutomers);

        $query_admin=mysqli_query($con,"SELECT id,firstname,lastname,gender,phone,email,dob,password,image FROM admin where email='$user' and password='".md5($pass)."'");
          $row_admin=mysqli_fetch_array($query_admin);

          if ($row_admin > 0) {
              $_SESSION['id']=$row_admin[0];
              $_SESSION['firstname']=$row_admin[1];
              $_SESSION['lastname']=$row_admin[2];
              $_SESSION['gender']=$row_admin[3];
              $_SESSION['phone']=$row_admin[4];
              $_SESSION['email']=$row_admin[5];
              $_SESSION['dob']=$row_admin[6];
              $_SESSION['password']=$row_admin[7];
              $_SESSION['image']=$row_admin[8];

              header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin/home.php");
          }elseif ($row_customers > 0) {
              $_SESSION['c_id']=$row_customers[0];
              $_SESSION['name']=$row_customers[1];
              $_SESSION['email']=$row_customers[2];
              $_SESSION['phone']=$row_customers[3];
              $_SESSION['password']=$row_customers[4];

              header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/customer/index.php");

          }
          else{
              ?>
                <script>
                  setTimeout(function(){
                      var wrong_cred=document.getElementById('Wrong_credentials');
                      wrong_cred.style.display="block";
                      wrong_cred.style.display="none";
                  },4000);
                      
                </script>
              <?php

              $incorectcredential='<p id="Wrong_credentials" style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;">Wrong credentials, try again !</p>';
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
  <!-- <meta http-equiv="refresh" content="5"> -->
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
              
                    <div class="login-card card-block auth-body mr-auto ml-auto" style="margin-top:-100px;">
                      <?php echo $allfieldRequired.$incorectcredential;?>
                        <form class="md-float-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12 text-center">
                                        <h3 class="text-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr/>
                                   
                                <div class="input-group mb-3">
                                    <span class="input-group-addon" id="email"><i class="icofont icofont-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter your email" title="Enter your email" data-toggle="tooltip" name="Username" autofocus>
                                </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon" id="password"><i class="icofont icofont-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Enter your password" title="Enter your password" data-toggle="tooltip" name="Password" id="pswdid1">
                                        <span class="input-group-addon">
                                            <i class="fa fa-eye-slash" id="ShowPswd1" onclick="ShowPswdFn1()"></i>
                                            <i class="fa fa-eye" id="ShowPswdSlash1" onclick="ShowPswdFn11()" style="display:none;"></i>
                                        </span>

                                        
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" style="width: 120px; border-radius:30px; background-color: steelblue;color: white;" class="btn bg-primary btn-md btn-block waves-effect text-center m-b-20 mx-auto"> Login <i class="fa fa-lock-open"></i> </button>
                                        </div>
                                    </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="forgot-password.php" class="waves-effect text-primary m-b-20 mx-auto"><i class="icofont icofont-key"></i> Forgot Password</a>
                                        <hr>
                                        Don't have an account<a href="register.php" class="waves-effect text-primary m-b-20 mx-auto">&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;Create account</a>
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