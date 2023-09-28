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
$dataUpdatedWell=null;
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


                                            $allfieldRequired=$dataUpdatedWell=null;
                                              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                  
                                                  if (isset($_POST['edit_info'])) {
                                                        $firstname=test_input($_POST['fname']);
                                                        $lastname=test_input($_POST['lname']);
                                                        $sex=test_input($_POST['gender']);
                                                        $email=test_input($_POST['email']);
                                                        $tel=test_input($_POST['phone']);
                                                        $birthdate=test_input($_POST['dob']);

                                                    
                                                    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($sex) || empty($birthdate)) {
                                                        $allfieldRequired='<script type="text/javascript">toastr.error("All fields required !")</script>';
                                                    }else{
                                                        
                                                        $sql="UPDATE admin SET firstname='$firstname',lastname='$lastname',gender='$sex',phone='$tel',dob='$birthdate',email='$email' ";

                                                        $query=mysqli_query($con,$sql);

                                                        if ($query == 1) {
                                                            ?>
                                                                <script>
                                                                  setTimeout(function(){
                                                                      var wrong_cred=document.getElementById('Data_Update');
                                                                      wrong_cred.style.display="block";
                                                                      wrong_cred.style.display="none";
                                                                      window.location.href="information.php";
                                                                  },3000);
                                                                      
                                                                </script>
                                                            <?php

                                                            $dataUpdatedWell='<p id="Data_Update" style="background-color:green;color:white;padding:10px;border-radius:5px;text-align:center;">Data updated successfully !</p>';
                                                          
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

                                              echo $allfieldRequired;
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
                                
                            </ul>

                            <!--Adding Properties like cars -->
                            <ul class="pcoded-item pcoded-left-item">
                                
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-pills"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Products</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="#" onclick="window.location.href='AddProducts.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add products</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#" onclick="window.location.href='ViewProducts.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">View products</span>
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
                                            <a href="#" onclick="window.location.href='ViewCustomers.php'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">View customers</span>
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
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                    
                                            <div class="row">
                                                <!-- order-card start -->
                                                <div class="col-md-2 col-xl-2"></div>

                                                <div class="col-md-8 col-xl-8">
                                                    <?php echo $dataUpdatedWell;?>
                                                    <div class="card" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                                      <div class="card-header text-center" style="box-shadow:0 4px 8px 0 rgb(0, 0, 0, 0.2);"><h4><i class="fa fa-address-card"></i>&nbsp;My information</h4></div>
                                                      <div class="card-body" style="overflow: auto;">

                                                        <div class="row">
                                                            <div class="col-md-6 text-center">
                                                                <img src="../style/assets/images/<?php echo $user_img;?>" class="img-circle elevation-2" alt="User Image" style="width:100px;height:100px;border-radius:50%;border:1px solid skyblue;z-index: 1;display: relative;margin-top:5px; " onclick="window.location.href='profile.php'">
                                                                <!-- <div id='online-indicator_attendant' title='Online'>
                                                                    <span class='blink_attendant'></span>
                                                                </div> -->
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <hr>

                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <span id="my_data"><p><b>Firstname :&nbsp;</b></p><p class="text-info"><b><?php echo $fname;?></b></p></span>
                                                                  </div>
                                                                </div>

                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <span id="my_data"><p><b>Lastname :&nbsp;</b></p><p class="text-info"><b><?php echo $lname;?></b></p></span>
                                                                   </div>
                                                                </div>
                                                          
                                                            </div>
                                                        </div>
                                                        
                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                              <span id="my_data"><p><b>Gender :&nbsp;</b></p><p class="text-info"><b><?php echo $gender;?></b></p></span>
                                                            </div>

                                                            <div class="col-md-6">
                                                              <span id="my_data"><p><b>Phone :&nbsp;</b></p><p class="text-info"><b><?php echo $phone;?></b></p></span>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <span id="my_data"><p><b>Email :&nbsp;</b></p><p class="text-info"><b><?php echo $email;?></b></p></span>
                                                          </div>

                                                          <div class="col-md-6">
                                                            <span id="my_data"><p><b>Birth date :&nbsp;</b></p><p class="text-info"><b><?php echo $dob;?></b></p></span>
                                                          </div>

                                                        </div>

                                                        <hr>

                                                         <div class="row">
                                                          

                                                          <div class="col-md-6">
                                                            <span id="my_data"><p><b>Role :&nbsp;</b></p><p class="text-info"><b><?php echo "Admin";?></b></p></span>
                                                          </div>

                                                          <div class="col-md-6">
                                                             <button class="btn btn-info" data-toggle="modal" data-target="#EditInfoModal" style="border-radius: 10px;"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                          </div>
                                                        </div>
                                                      
                                                      </div>
                                                    </div>
                                                    <!--end of card-->

                                                    <!--start of edit modal -->
                                                        <div class="modal" id="EditInfoModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                          <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                              <div class="modal-body text-center">
                                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <h4><u>Edit information&nbsp;<i class="fa fa-edit"></i></u></h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <div class="actionsBtns">
                                                                   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                                                    
                                                                      <div class="row">
                                                                        <div class="col-md-6">

                                                                          <label>Firstname</label>
                                                                          <input type="text" name="fname" value="<?php echo $fname;?>" class="form-control" required>

                                                                          <label>Lastname</label>
                                                                          <input type="text" name="lname" value="<?php echo $lname;?>" class="form-control" required>

                                                                          <label>Gender</label>
                                                                          <select name="gender" class="form-control" required>
                                                                            <?php
                                                                              if ($gender == 'male') {
                                                                                ?>
                                                                                    <option value='male' selected>Male</option>
                                                                                    <option value='female'>Female</option>
                                                                                <?php
                                                                              }else{
                                                                                ?>
                                                                                    <option value='female' selected>Female</option>
                                                                                    <option value='male'>Male</option>
                                                                                <?php
                                                                              }
                                                                            ?>
                                                                          </select>

                                                                        </div>
                                                                        <div class="col-md-6" id="div_btn">

                                                                          <label>Phone</label>
                                                                          <input type="text" name="phone" value="<?php echo $phone;?>" class="form-control" required>
                                                                              
                                                                          <label>Email</label>
                                                                          <input type="text" name="email" value="<?php echo $email;?>" class="form-control" required>

                                                                          <label>Birth date</label>
                                                                          <input type="text" name="dob" value="<?php echo $dob;?>" class="form-control" required>
                                                                          

                                                                        </div>

                                                                         <div class="col-md-12 text-center" id="div_btn">

                                                                          <button class="btn btn-primary" type="submit" name="edit_info"><i class="fa fa-save"></i>&nbsp;&nbsp;Save change</button>

                                                                        </div>

                                                                      </div>
                                                                    </form>

                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      <!--end of edit modal-->
                                                </div>
                                                <div class="col-md-2 col-xl-2"></div>
                                                
                                            </div>
                                        </div>


                                    <!-- <div id="styleSelector"></div> -->
                                	
                                	<?php include_once ('AdminModalLogout.php');?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function main_linkfn(){
            var textElement = document.getElementById("main_link");
            textElement.style.display = textElement.style.display === "block" ? "none" : "block";
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
