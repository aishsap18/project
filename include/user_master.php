<?php
include("config.php");
session_start();

if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
}
else{
    header("location: ../index.php");
}

$query = "SELECT * FROM dms_profile WHERE user_id = '$userid'";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="../img/favicon.png">

    <title>Document Management System for Organization</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <link href="../css/image-picker.css" rel="stylesheet">
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
            <div class="icon-reorder tooltips" data-original-title="" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="../user/user_dashboard.php" class="logo">DMS <span class="lite">User</span></a>
        <!--logo end-->



        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="../img/<?php echo $row['picture']; ?>" height="30" width="30">
                            </span>
                        <span class="username"><?php echo $_SESSION['fullname']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li class="eborder-top">
                            <a href="../user/user_profile.php"><i class="icon_profile"></i> My Profile</a>
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
        <div id="sidebar"  class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="">
                    <a class="" href="../user/user_dashboard.php">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_documents_alt"></i>
                        <span>Events</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <?php
                        $sql1 = "SELECT event_id FROM dms_data_master WHERE user_id = '$userid' AND active = 0";
                        $result1 = mysqli_query($db,$sql1);

                        while($row1 = mysqli_fetch_assoc($result1)) {
                            $curr_event = $row1['event_id'];
                            $sql = "SELECT eventname FROM dms_event WHERE event_id = '$curr_event' AND parent_id = 0";
                            $result = mysqli_query($db, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $summary = implode($row);

                                echo "<li><a>
                                        <form action='../user/user_display_all.php' method='GET'>
                                            <input type='hidden' name='action' value='submit' id='temp'/>
                                            <input type='submit' name='submit' value='" . $summary . "' id='side'/>"
                                    . "</form>
                                  </a></li>";
                            }
                        }

                        ?>
                    </ul>
                </li>

                <li class="">
                    <a class="" href="../user/user_shared_with_me.php">
                        <i class="icon_book"></i>
                        <span>Shared with me</span>
                    </a>
                </li>

                <li class="">
                    <a class="" href="">
                        <i class="icon_archive"></i>
                        <span>My Profile</span>
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
    <script type="text/javascript" src="../js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="../js/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="../js/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="../js/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".various").fancybox({
                maxWidth	: 800,
                maxHeight	: 600,
                minHeight   : 300,
                minWidth    : 500,
                fitToView	: true,
                width		: '70%',
                height		: '70%',
                autoSize	: true,
                closeClick	: true,
                openEffect	: 'elastic',
                closeEffect	: 'elastic'
            });
        });
    </script>
    <script src="../js/image-picker.js"></script>
    <script src="../js/image-picker.min.js"></script>
    <script>
        $("select").imagepicker();
    </script>
</body>
</html>
