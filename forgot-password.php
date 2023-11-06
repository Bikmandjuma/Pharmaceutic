<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
include_once 'Connect/connection.php';
$Email_Sent=$Email_Not_Found=$MailerError=$email_required=null;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['submit_forgot_pswd'])){
          $email_input= test_input($_POST['email']);
          $sql="SELECT email FROM customers UNION SELECT email FROM admin UNION SELECT email FROM admin";
          $res=mysqli_query($con,$sql);
          while ($rows=mysqli_fetch_array($res)) {
              if (empty($email_input)) {
                  ?>
                    <script>
                      setTimeout(function(){
                          var required=document.getElementById('email_field_required');
                          required.style.display="block";
                          required.style.display="none";
                      },4000);
                    </script>
                  <?php
                  $email_required='<p style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;" id="email_field_required">Email field is required ! </p>';
                  break;
              }elseif($rows[0] === $email_input) {
                    $email=$rows[0];
                    require_once 'PHPMailer\PHPMailer.php';
                    require_once 'PHPMailer\SMTP.php';
                    require_once 'PHPMailer\Exception.php';
                    $link="<a href='ResetPassword.php'>Reset password</a>";

                    //Encrypting email
                    $email_string=$email;

                    // Store the cipher method
                    $ciphering = "AES-128-CTR";

                    // Use OpenSSl Encryption method
                    $iv_length = openssl_cipher_iv_length($ciphering);
                    $options = 0;

                    $encryption_iv = '1234567891011121';

                    // Store the encryption key
                    $encryption_key = "TMIS";

                    // Use openssl_encrypt() function to encrypt the data
                    $encrypted_email = openssl_encrypt($email_string, $ciphering,$encryption_key, $options, $encryption_iv);

                    try {

                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                        $mail=new PHPMailer();                     //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'bikmangeek@gmail.com';                     //SMTP username
                        $mail->Password   = 'hpvrdqffxfmpsgku';                         //SMTP password
                        $mail->SMTPSecure = 'tls' ; //tls;            //Enable implicit TLS encryption
                        $mail->Port       = 587; //587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Content
                        $mail->isHTML(true); 
                        $mail->setFrom($email,'Tmis');
                        $mail->addAddress($email);               //Set email format to HTML
                        $mail->Subject = "Password reset link";
                    
                        // $mail->Body='no user found !';

                        // Check if the user is an admin
                        if (true) {
                            $user_is_admin = true;
                        } else {
                            $user_is_admin = false;
                        }

                        // Check if the user is a customer
                        if (true) {
                            $user_is_customer = true;
                        } else {
                            $user_is_customer = false;
                        }

                        $new_password = rand(0,1000000); // Retrieve the new password from the form

                        // Hash the password
                        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                        // Update the password in the respective table based on the user type
                        if ($user_is_admin) {
                            $update_query = "UPDATE admin SET password = '$hashed_password' WHERE email = '$email_string'";
                            // Execute the update query for the admin table
                            
                            // $email->Body="Username : ".$email_string;
                            // echo "<br/>";
                            // $email->Body="Password : ".$new_password;
                            $mail->Body='new credentials :<br/>Username :'.$email_string.'<br/>Password :'.$new_password.'';

                        } elseif ($user_is_customer) {
                            $update_query = "UPDATE customers SET password = '$hashed_password' WHERE email = '$email_string'";
                            // Execute the update query for the customers table

                            // $email->Body="Username : ".$email_string;
                            // echo "<br/>";
                            // $email->Body="Password : ".$new_password;
                            $mail->Body='new credentials :<br/>Username :'.$email_string.'<br/>Password :'.$new_password.'';

                        }
                       
                        $mail->send();
                        ?>
                          <script>
                            setTimeout(function(){
                                var required=document.getElementById('Email_Sent');
                                required.style.display="block";
                                required.style.display="none";
                            },5000);
                          </script>
                        <?php

                        $Email_Sent='<p style="background-color:green;color:white;padding:10px;border-radius:5px;text-align:center;" id="Email_Sent">Check your email ,we mailed you a reset link !</p>';

                    } catch (Exception $e) {

                        ?>
                          <script>
                            
                            setTimeout(function(){
                                var required=document.getElementById('MailerError');
                                required.style.display="block";
                                required.style.display="none";
                            },5000);

                          </script>
                        <?php

                        $MailerError='<p style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;" id="MailerError">Message could not be sent. Mailer Error: {$mail->ErrorInfo} !</p>';            
                    }

              }else{
                  ?>
                    <script>
                      setTimeout(function(){
                          var required=document.getElementById('email_not_found');
                          required.style.display="block";
                          required.style.display="none";
                      },5000);
                    </script>
                  <?php

                  $Email_Not_Found='<p style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;" id="email_not_found">Email not found in our database !</p>';  
              }
              //end of else
          
          }
          //end of while loop
    }
    //end of if of submit

}
//end of if request

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
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
                      <?php echo $email_required.$MailerError;
                          if ($Email_Sent == true) {
                              echo $Email_Sent;
                          }else{
                            echo $Email_Not_Found;
                          }
                      ?>
                        <form class="md-float-material" action="#" method="POST">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12 text-center">
                                        <h3 class="text-primary">Forgot password</h3>
                                    </div>
                                    
                                </div>
                                <hr/>
                                   
                                <div class="input-group mb-3">
                                    <span class="input-group-addon" id="email"><i class="icofont icofont-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter your email" title="Enter your email" data-toggle="tooltip" name="email">
                                </div>
                                   
                                    <div class="row m-t-30">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" style="width: 220px; border-radius:30px;color: white;" class="btn bg-primary btn-md btn-block waves-effect text-center m-b-20 mx-auto" name="submit_forgot_pswd">Send reset link <i class="fa fa-paper-plane"></i> </button>
                                        </div>
                                    </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="login.php" class="waves-effect text-primary m-b-20 mx-auto"><i class="icofont icofont-arrow-left"></i> Back to login</a></a>
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