<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    ?>
      <script>
        window.location.href="../login.php";
      </script>
    <?php
  }

include_once '..\Connect\connection.php';

$admin_id=$_SESSION['id'];

$sql_user_info="SELECT * FROM admin where id=".$admin_id."";
$query_user_info=mysqli_query($con,$sql_user_info);
while ($row_user_info=mysqli_fetch_assoc($query_user_info)) {
  $fname=$row_user_info['firstname'];
  $lname=$row_user_info['lastname'];
  $user_img=$row_user_info['image'];
  $phone=$row_user_info['phone'];
  $email=$row_user_info['email'];
  $gender=$row_user_info['gender'];
  $dob=$row_user_info['dob'];
}

require '..\phpcode\codes.php';
$admin=new pharmaceutic;

$image_uploaded=$image_size=$image_type=$image_not_uploaded=$Error_to_uploaded=$File_not_image=null;
if (isset($_POST['SubmitProfilePicture'])) {
    $target_dir = "../style/assets/images/";
    $file_name=date('YmdHi').basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir .$file_name;
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($uploadOk = 1) {
        
        if($check !== false) {
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 5000000) {
                  $image_size='<script type="text/javascript">toastr.error("Sorry, your file is too large ,add 5MB at least.")</script>';
                  $uploadOk = 0;
              }

              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                 $image_type='<script type="text/javascript">toastr.error("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
                  $uploadOk = 0;
              }

              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  $u_sql="UPDATE admin set image='$file_name' where id='$admin_id' ";
                  $u_query=mysqli_query($con,$u_sql);
                  ?>    
                    <script>
                        setTimeout(function(){
                            window.location.href="profile.php";
                        });
                    </script>
                  <?php
                  $image_uploaded='<script type="text/javascript">toastr.success("Image added well !")</script>';
              } else {
                 $image_not_uploaded='<script type="text/javascript">toastr.error("Sorry, there was an error uploading your file !")</script>';
              }
        }

      }elseif ($uploadOk = 0) {
          $Error_to_uploaded='<script type="text/javascript">toastr.error("Sorry, your file was not uploaded")</script>';
      }
      

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-info</title>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
      <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes">
      <!-- <meta http-equiv="refresh" content="5"> -->
      <!-- Favicon icon -->
      <link rel="icon" href="../style/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../style/assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../style/assets/icon/themify-icons/themify-icons.css">
	  <link rel="stylesheet" type="text/css" href="../style/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../style/assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../style/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../style/assets/css/jquery.mCustomScrollbar.css">
      <!-- Notification.css -->
      <link rel="stylesheet" type="text/css" href="../style/assets/pages/notification/notification.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

      <style>
        div#online-indicator_header {
            position: absolute;
            z-index:20;
            width: 12px;
            height: 12px;
            margin-right:10px;
            margin-left: 4fv8px;
            background-color:skyblue;
            border-radius: 50%;
            position: absolute;
            margin-top: -25px;
          }

          div#online-indicator_header:hover{
            cursor:alias;
          }
          span.blink_header {
            display: block;
            width: 12px;
            height: 12px;
            background-color:white;
            opacity: 0.7;
            border-radius: 50%;
            animation: blink 1s linear infinite;
          }

          /*Animations*/
          @keyframes blink {
            100% { transform: scale(2, 2); 
                    opacity: 0;
                  }
          }
        
                                        
        #my_data{
            display: flex;
        }

        img:hover{
            cursor: pointer;
        }

        #div_btn button{
            display:absolute;margin-top:25px;border-radius:10px;align-items: center;justify-content: center;justify-items: center;
        }

        div#online-indicator_attendant {
            position: absolute;
            z-index:20;
            width: 17px;
            height: 17px;
            margin-left:210px;
            background-color:skyblue;
            border-radius: 50%;
            margin-top: -20px;
        }

        div#online-indicator_attendant:hover{
            cursor:alias;
        }
                                          
        span.blink_attendant {
            display: block;
            width: 17px;
            height: 17px;
            background-color:blue;
            opacity: 0.7;
            border-radius: 50%;
            animation: blink 1s linear infinite;
        }

        /*Animations*/
        @keyframes blink {
            100% { transform: scale(2, 2); 
                opacity: 0;
                }
        }

        .card_profile{
        justify-content: center;
        display: flex;
        align-items: center;
      }

      .card_title{
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          transition: 0.3s;
  /*        width: 70%; */
          text-align: center;
          background-color: white;
          border-radius:10px;
          font-family: sans-serif;
          font-weight: bold;
      }

      .card_title h3{
          font-family: serif;
      }

      .containers {
          padding: 2px 16px;
          text-align: center;
          font-family: serif;
      }

      #ShowPswd1:hover,#ShowPswd2:hover,#ShowPswd3:hover,#ShowPswdSlash1:hover,#ShowPswdSlash2:hover,#ShowPswdSlash3:hover{
      	cursor: pointer;
      	color: green;

      }

      #ShowPswd1,#ShowPswd2,#ShowPswd3,#ShowPswdSlash1,#ShowPswdSlash2,#ShowPswdSlash3{
      	position:relative;
      	margin-left: -20px;
      	margin-top:10px;
      	color: blue;
      }

      #pswdid1,#pswdid2,#pswdid3{
      	border-radius: 10px;
      }

/*      .alert{padding: 15px;margin-bottom: 20px;border-radius: 4px;color: #fff;text-transform: uppercase;font-size: 12px}.alert_info{background-color: #4285f4;border: 2px solid #4285f4}button.close{-webkit-appearance: none;padding: 0;cursor: pointer;background: 0 0;border: 0}.close{font-size: 20px;color: #fff;opacity: 0.9;}.alert_success{background-color: #09c97f;border: 2px solid #09c97f}.alert_warning{background-color: #f8b15d;border: 2px solid #f8b15d}.alert_error{background-color: #f95668;border: 2px solid #f95668}.fade_info{background-color: #d9e6fb;border: 1px solid #4285f4}.fade_info .close{color: #4285f4}.fade_info strong{color: #4285f4}.fade_success{background-color: #c9ffe5;border: 1px solid #09c97f}.fade_success .close{color: #09c97f}.fade_success strong{color: #09c97f}.fade_warning{background-color: #fff0cc;border: 1px solid #f8b15d}.fade_warning .close{color: #f8b15d}.fade_warning strong{color: #f8b15d}.fade_error{background-color: #ffdbdb;border: 1px solid #f95668}.fade_error .close{color: #f95668}.fade_error strong{color: #f95668}*/
     </style>
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>
                       <div class="mobile-search">
                           <div class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="Enter Keyword">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a href="index.html">
                           <!-- <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" /> -->
                           <h5>Pharmaceutic</h5>
                       </a>
                       <a class="mobile-options">
                           <i class="ti-more"></i>
                       </a>
                   </div>

                   <div class="navbar-container container-fluid">
                       <ul class="nav-left">
                           <li>
                               <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                           </li>
                           <li class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="searching . . . . .">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </li>

                       </ul>
                       <ul class="nav-right">
                           <li class="header-notification">
                               <a href="#!" style="display:flex;">
                                   <p>New Bookings</p>&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-light">0</span>
                                   <!-- <i class="ti-bell"  class="badge bg-c-pink"></i> -->
                               </a>
                               <ul class="show-notification">
                                   <li>
                                       <h6>New bookings</h6>
                                       <label class="label label-danger">New</label>
                                   </li>
                                   <li>
                                       <div class="media">
                                            <a href="#customer1" class="d-flex">
                                               <img class="align-self-center" src="../style/images/pills.jpg" alt="Generic placeholder image">
                                               <i class="badge bg-c-pink"></i>
                                               <div class="media-body">
                                                   <h5 class="notification-user">customer name</h5>
                                                   <p class="notification-msg">booking description</p>
                                                   <span class="notification-time">time minutes ago</span>
                                               </div>
                                            </a>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="media">
                                            <a href="#customer2" class="d-flex">
                                               <img class="align-self-center" src="../style/images/pills.jpg" alt="Generic placeholder image">
                                               <i class="badge bg-c-pink"></i>
                                               <div class="media-body">
                                                   <h5 class="notification-user">customer name</h5>
                                                   <p class="notification-msg">booking description</p>
                                                   <span class="notification-time">time minutes ago</span>
                                               </div>
                                            </a>
                                       </div>
                                   </li>
                               </ul>
                           </li>
                           
                           <li class="user-profile header-notification">
                               <a href="#">
                                   <img src="../style/assets/images/<?php echo $user_img;?>" class="img-radius" alt="User-Profile-Image" style="width:45px;height:45px;">
                                    <div id='online-indicator_header' title='Online'>
                                        <span class='blink_header'></span>
                                    </div>
                                   <span><?php echo $fname." ".$lname;?></span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li>
                                        <a href="#" data-toggle="modal" data-target="#ModalLogout">
                                            <i class="fa fa-lock"></i> Logout
                                        </a>
                                        <!-- <form id="logout-form" action="{{route('Logou" method="POST" class="d-none">@csrf</form> -->
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Managment</div>

                            <!--Dashboard and manage pages-->
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="#" onclick="window.location.href='home.php'">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu {{ request()->is('#') ? 'active' : '' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage pages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Homepage</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">About us</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Services</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Contact us</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>

                            <!--Adding Properties like cars -->
                            <ul class="pcoded-item pcoded-left-item">
                                
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-car"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage cars</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="#" onclick="window.location.href='cars.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Cars</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Others</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                            </ul>
                           
                            <!--Customer's comments and booking-->
                            <ul class="pcoded-item pcoded-left-item">
                                
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-users"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Customers</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="#" onclick="window.location.href='ViewBookings.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">View bookings</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#" onclick="window.location.href='ViewComments.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View comments</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                            </ul>

                            <!--manu of settings-->
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-cogs"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Settings</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="#information" onclick="window.location.href='information.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">My information</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#profile" onclick="window.location.href='profile.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Profiles</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#password" onclick="window.location.href='password.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Password</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--start of pcoded-content-->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    
                                    <!--start of page-body-->
                                    <div class="page-body">
                                     
                                     <?php 
					                  require '../Connect/connection.php';

					                      $Username_changed=$Username_length=$username_data=$Username_not_changed=null;
					                      $admin_id=$_SESSION['id'];
					                      
					                      $all_fields_required=$current_password=$new_password=$confirm_new_password=$password_required=$current_password_incorrect=$password_mustbe_greaterthan_8=$new_password_do_not_match=$Password_changed_well=$user_new_pswd=$Password_not_changed=null;

					                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
					                          if (isset($_POST['submit_pswd'])) {
					                              $current_password=test_input($_POST['current_password']);
					                              $new_password=test_input($_POST['new_password']);
					                              $confirm_new_password=test_input($_POST['confirm_new_password']);

					                              $sql="SELECT password from admin where id='".$_SESSION['id']."'";
					                              $result=mysqli_query($con,$sql);
					                              while ($row=mysqli_fetch_assoc($result)) {
					                                  $user_password=$row['password'];
					                              }

					                              if (empty($current_password) || empty($new_password) || empty($new_password)) {
						                              	?>
											                <script>
											                  setTimeout(function(){
											                      var wrong_cred=document.getElementById('Wrong_credentials');
											                      wrong_cred.style.display="block";
											                      wrong_cred.style.display="none";
											                  },4000);
											                      
											                </script>
											            <?php

										              $all_fields_required='<p id="Wrong_credentials" style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;">All fields are required !</p>';
					                               
					                              }else{
					                                    if (md5($current_password) != $user_password) {
					                                    	?>
												                <script>
												                  setTimeout(function(){
												                      var wrong_cred=document.getElementById('Wrong_credentials');
												                      wrong_cred.style.display="block";
												                      wrong_cred.style.display="none";
												                  },4000);
												                      
												                </script>
												            <?php

											              $current_password_incorrect='<p id="Wrong_credentials" style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;">Incorrect current password !</p>';

					                                    }elseif (strlen($new_password) < 8) {
					                                    	?>
												                <script>
												                  setTimeout(function(){
												                      var wrong_cred=document.getElementById('Wrong_credentials');
												                      wrong_cred.style.display="block";
												                      wrong_cred.style.display="none";
												                  },4000);
												                      
												                </script>
												            <?php

											              	$password_mustbe_greaterthan_8='<p id="Wrong_credentials" style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;">New password must be at least 8 characters !</p>';

					                              
					                                    }elseif (md5($new_password) != md5($confirm_new_password)) {
					                                    	?>
												                <script>
												                  setTimeout(function(){
												                      var wrong_cred=document.getElementById('Wrong_credentials');
												                      wrong_cred.style.display="block";
												                      wrong_cred.style.display="none";
												                  },4000);
												                      
												                </script>
												            <?php

											              	$new_password_do_not_match='<p id="Wrong_credentials" style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;">New password do not match !</p>';

					                                    }else{ 
					                                        $user_new_pswd=md5($new_password);
					                                        if ($new_password == $confirm_new_password) {
					                                            $sql_password="UPDATE admin SET password='".$user_new_pswd."' where id='".$admin_id."'";
					                                            $result_password=mysqli_query($con,$sql_password);
					                                            if ($result_password == true) {
					                                            	?>
														                <script>
														                  setTimeout(function(){
														                      var wrong_cred=document.getElementById('Wrong_credentials');
														                      wrong_cred.style.display="block";
														                      wrong_cred.style.display="none";
														                  },4000);
														                      
														                </script>
														            <?php

													              	$Password_changed_well='<p id="Wrong_credentials" style="background-color:green;color:white;padding:10px;border-radius:5px;text-align:center;">Password changed successfully !</p>';
					                                            }

					                                        }else{
					                                        	?>
														                <script>
														                  setTimeout(function(){
														                      var wrong_cred=document.getElementById('Wrong_credentials');
														                      wrong_cred.style.display="block";
														                      wrong_cred.style.display="none";
														                  },4000);
														                      
														                </script>
														            <?php

													              	$Password_not_changed='<p id="Wrong_credentials" style="background-color:red;color:white;padding:10px;border-radius:5px;text-align:center;">password can not be changed !</p>';
					                                  
					                                        }

					                                    }


					                              }
					                        }     

					                      }

					                      function test_input($data){
					                          $data=trim($data);
					                          $data=stripslashes($data);
					                          $data=htmlspecialchars($data);
					                          return $data;
					                      }

					                      if (isset($_POST['SubmitUsernameChanges'])) {
					                          $pattern = '/^[A-Za-z0-9!@#$%^&*()_+,.-=;]+$/';
					                          $username=$_POST['username'];

					                          if (strlen($username) < 8 ) {
					                              $Username_length='<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
					                                    Enter atleast 8 characters !
					                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                                        <span aria-hidden="true" style="font-size:25px;">&times;</span>
					                                    </button>
					                                </div>';
					                          }else{

					                             if (preg_match($pattern, $username)) {
					                            
					                                  $query=mysqli_query($con,"UPDATE admin SET username='$username' where id='$admin_id' ");

					                                  if ($query == true) {
					                                    $Username_changed='<script>toastr.info("Username changed well !")</script>';
					                                  }else{
					                                    $Username_not_changed='<script>toastr.info("Username not changed !")</script>';
					                                  }

					                              }

					                          }

					                      }

					                      //select username
					                      $query_username=mysqli_query($con,"SELECT email from admin where id='$admin_id' ");
					                      while ($row=mysqli_fetch_assoc($query_username)) {
					                        $email_data=$row['email'];
					                      }

					                  ?>

                                    <!--start of page-body -->
                                    	<div class="row">
							                <div class="col-md-4"></div>
							                <div class="col-md-4">
							                    <?php echo $Password_changed_well;?>
							                    <?php echo $all_fields_required;?>
							                    <?php echo $current_password_incorrect;?>
							                    <?php echo $new_password_do_not_match;?>
							                    <?php echo $password_mustbe_greaterthan_8;?>
							                    <?php echo $Password_not_changed;?>
							                <div class="card" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2);">
							                  
							                  <div class="card-header text-center" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2);"><i class="fa fa-edit"></i>&nbsp;Modify password</div>
							                  <div class="card-body text-center" style="overflow: auto;">
							                    
							                    <form class="form-group" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							                          <br><!-- 
							                          <span class="btn-show-pass">
							                            <i class="fa fa-eye"></i>
							                          </span> -->
							                          <div class="d-flex">
							                            <input type="password" name="current_password" placeholder="Current Password" class="form-control" id="pswdid1">
							                            <i class="fas fa-eye-slash" id="ShowPswd1" onclick="ShowPswdFn1()"></i>
							                            <i class="fas fa-eye" id="ShowPswdSlash1" onclick="ShowPswdFn11()" style="display:none;"></i>
							                          </div>
							                          <br>
							                          <div class="d-flex">
							                            <input type="password" name="new_password" placeholder="New Password" class="form-control" id="pswdid2"><br>
							                            <i class="fas fa-eye-slash" id="ShowPswd2" onclick="ShowPswdFn2()"></i>
							                            <i class="fas fa-eye" id="ShowPswdSlash2" onclick="ShowPswdFn22()" style="display:none;"></i>

							                          </div>
							                          <br>
							                          <div class="d-flex">
							                            <input type="password" name="confirm_new_password" class="form-control" placeholder="confirm New Password" id="pswdid3">
							                            <i class="fas fa-eye-slash" id="ShowPswd3" onclick="ShowPswdFn3()"></i>
							                            <i class="fas fa-eye" id="ShowPswdSlash3" onclick="ShowPswdFn33()" style="display:none;"></i>

							                          </div>
							                            <br>
							                          <button class="btn btn-info" type="submit" name="submit_pswd" style="border-radius:10px;"><i class="fa fa-save fa-fw"></i> &nbsp;Save change</button>
							                        </form>

							                  </div>
							                </div>
							                
							                <!--end of card-->
							            </div>
							            <div class="col-md-4"></div>
							          </div>
                                    
                                    </div>
                                    <!--end of page body-->

                                    <?php include_once ('AdminModalLogout.php');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end of pcoded-content-->                           

                </div>
            </div>
        </div>
    </div>


  <script>
    function EditUsernamefn(){
      var defaultUsername=document.getElementById('defaultUsername');
      var formUsername=document.getElementById('formUsername');
      defaultUsername.style.display="none";
      formUsername.style.display="block";

    }

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
        x.type="text";
      }

    }

    function ShowPswdFn3(){
      var x=document.getElementById('pswdid3');

      if (x.type === "password") {
        x.type = "text";
        document.getElementById('ShowPswdSlash3').style.display="block";
        document.getElementById('ShowPswd3').style.display="none";
      }else{
        x.type="password";
      }

    }

    function ShowPswdFn33(){
      var x=document.getElementById('pswdid3');

      if (x.type === "text") {
        x.type = "password";
        document.getElementById('ShowPswdSlash3').style.display="none";
        document.getElementById('ShowPswd3').style.display="block";
      }else{
        x.type="text";
      }

    }
  </script>   


    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="../style/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../style/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../style/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="../style/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../style/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../style/assets/js/modernizr/modernizr.js"></script>
    <!-- am chart -->
    <script src="../style/assets/pages/widget/amchart/amcharts.min.js"></script>
    <script src="../style/assets/pages/widget/amchart/serial.min.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="../style/assets/js/chart.js/Chart.js"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="../style/assets/pages/todo/todo.js "></script>
    <!-- Custom js -->
    <script type="text/javascript" src=../style/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="../style/assets/js/script.js"></script>
    <script type="text/javascript " src="../style/assets/js/SmoothScroll.js"></script>
    <script src="../style/assets/js/pcoded.min.js"></script>
    <script src="../style/assets/js/vartical-demo.js"></script>
    <script src="../style/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
