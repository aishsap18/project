<?php
include("../include/user_master.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.shake.js"></script>
</head>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Events</h3>
                <a class="btn btn-default btn-lg" href="user_share_event.php">Share Event</a>
                <a class="btn btn-default btn-lg" href="user_delete_event.php">Delete Event</a>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="user_dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> Events</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <?php
        $sql1 = "SELECT event_id FROM dms_data_master WHERE user_id = '$userid' AND active = 0";
        $result1 = mysqli_query($db,$sql1);

        while($row1 = mysqli_fetch_assoc($result1)) {
            $curr_event = $row1['event_id'];
            $sql = "SELECT eventname FROM dms_event WHERE event_id = '$curr_event' AND parent_id = 0";
            $result = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $summary = implode($row);

                echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                <div class='text-center'>
                <form action='user_display_all.php' method='GET'>
                    <input type='hidden' name='action' value='submit' id='temp'/>
                    <input type='submit' name='submit' value='" . $summary . "' class='btn btn-default btn-lg' id='folder_button'>"
                    . "</form>
                    </div>
                </div>";
            }
        }
        ?>

        <!-- page end-->
    </section>
</section>
<!--main content end-->
<div class="text-right">
    <div class="credits">
        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin

        <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        --> </div>
</div>
</section>
<!-- container section end -->
</html>
