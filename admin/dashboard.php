<?php
include("../include/admin_master.php");
$query  = "SELECT * FROM dms_users";
$query1 = "SELECT * FROM dms_data";
$query2 = "SELECT * FROM dms_event WHERE parent_id=0";
$query3 = "SELECT * FROM dms_event WHERE parent_id NOT IN (0)";
$result = mysqli_query($db, $query);
$result1 = mysqli_query($db, $query1);
$result2 = mysqli_query($db, $query2);
$result3 = mysqli_query($db, $query3);
$users=mysqli_num_rows($result);
$events=mysqli_num_rows($result2);
$files=mysqli_num_rows($result1);
$folders=mysqli_num_rows($result3);

?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <span class="label label-success">YOUR SYSTEM STATISTICS</span>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box linkedin-bg">
                    <i class="fa fa-cube"></i>
                    <div class="count"><?php echo $events?></div>
                    <div>Events Added</div>
                </div><!--/.info-box-->
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box brown-bg">
                    <i class="fa fa-users"></i>
                    <div class="count"><?php echo $users?></div>
                    <div >Users Using</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                    <i class="fa fa-file"></i>
                    <div class="count"><?php echo $files?></div>
                    <div>Files Uploaded</div>
                </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg">
                    <i class="fa fa-folder"></i>
                    <div class="count"><?php echo $folders?></div>
                    <div>Folders Created</div>
                </div><!--/.info-box-->
            </div><!--/.col-->
        </div>
        <div class="row">
            <span class="label label-success">SELECT YOUR OPERATION</span>
        </div>
        <br>
        <div class="row">
            <a href="admin_events.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box-2 yellow-bg">
                        <div><h3><b>Events</b></h3></div>
                    </div><!--/.info-box-->
                </div><!--/.col--></a>

            <a href="admin_event_list.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box-2 brown-bg">
                        <div><h3><b>Event List</b></h3></div>
                    </div><!--/.info-box-->
                </div><!--/.col--></a>

            <a href="admin_user_list.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box-2 dark-bg">
                        <div><h3><b>User List</b></h3></div>
                    </div><!--/.info-box-->
                </div><!--/.col--></a>

            <a href="admin_assign_event.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box-2 green-bg">
                        <div><h3><b>Assign Event</b></h3></div>
                    </div><!--/.info-box-->
                </div><!--/.col--></a>

        </div><!--/.row-->

        <div class="row">
            <a href="admin_userwise_events.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box-2 red-bg">
                        <div><h3><b>Userwise Events</b></h3></div>
                    </div><!--/.info-box-->
                </div><!--/.col--></a>

            <a href="admin_add_event.php">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box-2 pink-bg">
                        <div><h3><b>Add Event</b></h3></div>
                    </div><!--/.info-box-->
                </div><!--/.col--></a>

        </div><!--/.row-->

        <!-- page end-->
    </section>
</section>
<!-- container section end -->
