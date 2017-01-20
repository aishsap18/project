<?php
include("../include/admin_master.php");
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
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> Event List</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-striped input-lg">
                <th>Sr. No.</th>
                <th>Event Name</th>
                <th>Description</th>

                <?php

                $sql = "SELECT * FROM dms_event WHERE parent_id = 0";
                $result = mysqli_query($db,$sql);
                $count=0;
                while($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>
            <td>".++$count."</td>
            <td>".$row['eventname']."</td>
            <td>".$row['description']."</td>
        </tr>";
                }

                ?>
            </table>
        </div>

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

