<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    ?>
      <script>
        window.location.href="../login.php";
      </script>
    <?php
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
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
    <style>
    div#online-indicator_header {
/*       display: inline-block;*/
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

    .order-card:hover{
        cursor: pointer;
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
<!--                            <li>
                               <a href="#!" onclick="javascript:toggleFullScreen()">
                                   <i class="ti-fullscreen"></i>
                               </a>
                           </li> -->
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
                                               <img class="align-self-center img-radius" src="../assets/images/avatar-2.jpg" alt="Generic placeholder image">
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
                                               <img class="align-self-center img-radius" src="../assets/images/avatar-3.jpg" alt="Generic placeholder image">
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
                                   <img src="../style/assets/images/user.png" class="img-radius" alt="User-Profile-Image" style="width:45px;height:45px;">
                                    <div id='online-indicator_header' title='Online'>
                                        <span class='blink_header'></span>
                                    </div>
                                   <span><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li>
                                        <a href="#" data-toggle="modal" data-target="#ModalLogout">
                                            <i class="fa fa-lock"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{route('Logout')}}" method="POST" class="d-none">@csrf</form>
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
                                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                    <a href="#" onclick="window.location.href='{{route("AdminDashboard")}}'">
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
                                
                                <li class="pcoded-hasmenu {{ request()->is('admin/add_properties') ? 'active' : '' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fas fa-car"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage cars</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="#" onclick="window.location.href='{{route("Add_Properties")}}'">
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
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">View bookings</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="#">
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
                                <li class="pcoded-hasmenu">
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
                                            <a href="#profile" onclick="window.location.href='{{route("Profile")}}'">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Profiles</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#apssword" onclick="window.location.href='{{route("Password")}}'">
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
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-blue order-card">
                                                    <div class="card-block" onclick="window.location.href='#card1'">
                                                        <h6 class="m-b-20">Cars in store</h6>
                                                        <h2 class="text-right"><i class="fa fa-car f-left"></i><span>0</span></h2>
                                                        <p class="m-b-0">All cars<span class="f-right">0</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-green order-card" onclick="window.location.href='#card2'">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">All bookings</h6>
                                                        <h2 class="text-right"><i class="ti-list f-left"></i><span>0</span></h2>

                                                        <p class="m-b-0">This Month<span class="f-right">0</span></p>
                                                    </div>
                                                    <!-- <span class="btn btn-info m-b-5">test</span> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-yellow order-card" onclick="window.location.href='#card3'">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Today's booking</h6>
                                                        <h2 class="text-right"><i class="ti-reload f-left"></i><span>0</span></h2>
                                                        <p class="m-b-0">This day<span class="f-right">0</span></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-pink order-card" onclick="window.location.href='#card4'">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Comments</h6>
                                                        <h2 class="text-right"><i class="fa fa-comment f-left"></i><span>0</span></h2>
                                                        <p class="m-b-0">all comments<span class="f-right">0</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- order-card end -->
                                            <!-- statustic and process start -->
                                            <div class="col-lg-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">

                                                        <h5>Statistics</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-chevron-left"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-times close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <canvas id="Statistics-chart" height="200"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Customer Feedback</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <span class="d-block text-c-blue f-24 f-w-600 text-center">0</span>
                                                        <canvas id="feedback-chart" height="100"></canvas>
                                                        <div class="row justify-content-center m-t-15">
                                                            <div class="col-auto b-r-default m-t-5 m-b-5">
                                                                <h4>0%</h4>
                                                                <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Positive</p>
                                                            </div>
                                                            <div class="col-auto m-t-5 m-b-5">
                                                                <h4>0%</h4>
                                                                <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Negative</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- statustic and process end -->
                                            
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
