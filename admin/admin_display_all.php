<?php
include("../include/admin_master.php");

$user = $_SESSION['user_id'];

if (!empty($_GET['action'])) {
    //echo $_GET['submit'];
    $eventname = mysqli_real_escape_string($db, $_GET['submit']);
    $sql = "SELECT * FROM dms_event WHERE eventname='$eventname' AND active=0";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['event_id'] = $row['event_id'];
    //$event_id = $_SESSION['event_id'];
    $parent_id = $row['parent_id'];
    //echo $parent_id;
    $event_id = $row['event_id'];
}
else{

    $event_id = $_SESSION['event_id'];
    $sql5 = "SELECT * FROM dms_event WHERE event_id='$event_id' AND active=0";
    $result5 = mysqli_query($db, $sql5);
    $row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
    $eventname = $row5['eventname'];
    //$_SESSION['event_id'] = $row['event_id'];
    //$event_id = $_SESSION['event_id'];
    $parent_id = $row5['parent_id'];
    //echo $parent_id;
}

$sql4 = "SELECT * FROM dms_event WHERE parent_id = '$event_id' AND active=0";
$result4 = mysqli_query($db, $sql4);

$count1 = mysqli_num_rows($result4);

?>
<body>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-4">
                    <h3 class="page-header"><i class="fa fa fa-cube"></i><?php echo $eventname;?></h3>
                </div>
                    <?php
                        echo " <div class=\"col-lg-4 col-md-4 col-sm-2 col-xs-6 \">
                                <div class='nav search-row page-header' id='top_menu'>
                        <!--  search form start -->
                        <ul class='nav top-menu'>
                            <li>
                                <form action='../include/admin_search.php' method='get' class='navbar-form'>
                                    <input type='hidden' name='userid' value='". $user."'>
                                    <input type='hidden' name='event' value='". $event_id."'>
                                    <input class='form-control' placeholder='Search' name='search_text' type='text'>
                                </form>
                            </li>
                        </ul>
                        <!--  search form end -->
                    </div>
                    </div> ";
                    ?>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                        <li><i class="fa fa-bars"><a href="admin_events.php"></i> Events</a></li>
                        <li><i class="fa fa-square"></i> <?php echo $eventname;?></li>
                    </ol>
                 </div>
            </div>
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-info">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#profile">
                                    <i class="icon-user"></i>
                                    Folders
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#edit-profile">
                                    <i class="icon-envelope"></i>
                                    Files
                                </a>
                            </li>
                        </ul>
                    </header>

                    <div class="">
                        <div class="tab-content">
                            <!-- profile -->
                            <div id="profile" class="tab-pane active">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <header class="row">
                                            <?php
                                                echo "<div class=\"col-lg-1 col-md-2 col-sm-2 col-xs-4\">
                                                        <form action='../admin/admin_delete_sub_event.php' method='get'>
                                                        <input type='hidden' name='event' value='" . $event_id . "'>
                                                        <input type='submit' class='btn btn-default btn-sm' value='Delete Folder'>
                                                        </form>
                                                      </div>";

                                                echo "<div class=\"col-lg-1 col-md-2 col-sm-2 col-xs-4\">
                                                        <form action='../admin/admin_add_event.php' method='post'>
                                                        <input type='hidden' name='event' value='" . $event_id . "'>
                                                        <input type='submit' class='btn btn-default btn-sm' value='Create Folder'>
                                                        </form>
                                                        </div>";
                                            ?>
                                        </header>
                                        <br>
                                        <div class="">
                                            <?php
                                            //if($count1!=0) {
                                            echo"<div class='row' id='container_disp'> ";
                                            while ($row = mysqli_fetch_assoc($result4)) {
                                                //$summary = implode($row);
                                                echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                                      <div class='text-center'>
                                                         <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='get'>
                                                         <input type='hidden' name='action' value='submit' />
                                                         <input type='submit' name='submit' value='" . $row['eventname'] . "' id='folder_button' class='btn btn-default btn-lg' onclick='location.href='admin_display_all.php';'>" . "</form>
                                                       </div>
                                                       </div>";
                                            }
                                            echo "</div>";
                                            ?>
                                        </div>
                                    </section>
                                </div>
                            <!-- edit-profile -->
                            <div id="edit-profile" class="tab-pane">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <?php
                                            echo"<section class=\"\">
                                                <header class=\"row\">
                                                  <div class=\"col-lg-1 col-md-2 col-sm-2 col-xs-4\">
                                                        <form action='../admin/admin_share_file.php' method='get'>
                                                        <input type='hidden' name='event' value='\" . $event_id . \"'>
                                                        <input type='submit' class='btn btn-default btn-sm' value='Share File'>
                                                    </form>
                                                    </div>
                                                <div class=\"col-lg-1 col-md-2 col-sm-2 col-xs-4\">
                                                    <form action='../admin/admin_delete_file.php' method='get'>
                                                        <input type='hidden' name='event' value='\" . $event_id . \"'>
                                                        <input type='submit' class='btn btn-default btn-sm' value='Delete File'>
                                                    </form>
                                                     </div>
                                                </header>
                                                <br>
                                                
                                                <div class='row'> ";
                                                    include("../include/admin_upload.php");
                                                    echo "</div>";
                                                    echo"<div class='row'> ";
                                                    //echo "<br>";
                                                    //echo"<div class='container'> <div class='row'> ";
                                                    $sql1 = "SELECT dm_id FROM dms_data_master WHERE event_id='$event_id' AND user_id='$user' AND active=0";
                                                    $result1 = mysqli_query($db, $sql1);
                                                    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                                    $dm_id = $row1['dm_id'];
                                                    $sql3 = "SELECT * FROM dms_data WHERE dm_id='$dm_id' AND active=0";
                                                    $retval3 = mysqli_query($db, $sql3);
                                                    $count = 0;
                                                    $extensions= array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG','GIF','BMP');
                                                    while ($row = mysqli_fetch_assoc($retval3)) {

                                                        $ext = pathinfo($row['filename'] , PATHINFO_EXTENSION);

                                                        $str = $row['displayname'];
                                                        if (strlen($str) > 20) {
                                                            $cut = substr($str, 0, 20);
                                                            $cut = $cut . "...";
                                                        } else
                                                            $cut = $str;

                                                        if(in_array($ext,$extensions)) {
                                                            echo "<div id='data' class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                                        <a rel='gallery1' class='various img-responsive' href='http://localhost:60/finalproject/uploads/" . $row['filename'] . "'>
                                                            <img  src='../uploads/" . $row['filename'] . "' height='150px' width='200px' />
                                                        </a><br>
                                                        <label>" . $cut . "</label>
                                                      </div>";
                                                        }
                                                        else{
                                                            echo "<div id='data' class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                                            <a class='txtEditor' href='http://localhost:60/finalproject/uploads/" . $row['filename'] . "'>
                                                                <img src='../img/docimg.png' height='150px' width='150px' />
                                                            </a>
                                                            <label>" . $cut . "</label>
                                                        </div>";
                                                            }
                                                        }
                                                        echo "</div>";
                                                        ?>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </section>
            </body>