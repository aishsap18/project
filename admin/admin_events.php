<?php
include("../include/admin_master.php");
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
                <h3 class="page-header"><i class="fa fa fa-cube"></i> Events</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <a class="btn btn-default btn-md" href="admin_share_event.php">Share Event</a>
                <a class="btn btn-default btn-md" href="admin_delete_event.php">Delete Event</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> Events</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <?php
        $sql = "SELECT eventname FROM dms_event WHERE parent_id = 0 AND active=0";
        $result = mysqli_query($db,$sql);
        $count = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $summary = implode($row);

            echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                <div class='text-center'>
                <form action='admin_display_all.php' method='GET'>
                    <input type='hidden' name='action' value='submit' id='temp'/>
                    <input type='submit' name='submit' value='".$summary."' class='btn btn-default btn-lg' id='folder_button'>"
                ."</form>
                </div>
            </div>";
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
