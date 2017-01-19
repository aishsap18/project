<?php
include("config.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
}
else{
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="../img/favicon.png">

    <title>Document Management System for Organization</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--Custom CSS-->
    <link href="../css/mystyle.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <script src="../js/lte-ie7.js"></script>
    <![endif]-->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->

    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="index.html" class="logo">DMS <span class="lite">Admin</span></a>
        <!--logo end-->

        <div class="nav search-row" id="top_menu">
            <!--  search form start -->
            <ul class="nav top-menu">
                <li>
                    <form class="navbar-form">
                        <input class="form-control" placeholder="Search" type="text">
                    </form>
                </li>
            </ul>
            <!--  search form end -->
        </div>

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="../img/VSP-2.jpg" height="30" width="30">
                            </span>
                        <span class="username"><?php echo $_SESSION['fullname']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="../logout.php"><i class="icon_clock_alt"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="">
                    <a class="" href="../admin/dashboard.php">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="" href="../admin/admin_events.php">
                        <i class="icon_genius"></i>
                        <span>Events</span>
                    </a>
                </li>

                <li>
                    <a class="" href="../admin/admin_event_list.php">
                        <i class="icon_piechart"></i>
                        <span>Event List</span>
                    </a>
                </li>

                <li>
                    <a class="" href="../admin/admin_user_list.php">
                        <i class="icon_document_alt"></i>
                        <span>User List</span>
                    </a>
                </li>

                <li>
                    <a class="" href="../admin/admin_assign_event.php">
                        <i class="icon_desktop"></i>
                        <span>Assign Event</span>
                    </a>
                </li>

                <li>
                    <a class="" href="../admin/admin_userwise_events.php">
                        <i class="icon_table"></i>
                        <span>Userwise Events</span>
                    </a>
                </li>

                <li>
                    <a class="" href="../admin/admin_add_event.php">
                        <i class="icon_documents_alt"></i>
                        <span>Add Event</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

<!-- javascripts -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>
</body>
</html>
