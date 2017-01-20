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
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Assign Event</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> Assign Event</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form class="form-inline" action="assign_event_action.php" method="post">

                    <label>Select User :</label>
                    <?php

                    $sql = "SELECT * FROM dms_users WHERE role='staff'";
                    $result = mysqli_query($db,$sql);

                    ?>
                    <select class="selectpicker form-control input-lg m-bot15" title="Choose User" data-size="6" name="user_select">
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option>".$row['fullname']."</option>";
                        }
                        ?>
                    </select>

                    <label>Select Event :</label>
                    <?php

                    $sql = "SELECT * FROM dms_event WHERE parent_id=0 AND active=0";
                    $result = mysqli_query($db,$sql);

                    ?>
                    <select class="selectpicker form-control input-lg m-bot15" title="Choose Event" data-size="6" name="event_select">
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option>".$row['eventname']."</option>";
                        }
                        ?>
                    </select>




                    <input type="submit" class="btn btn-default btn-lg" value="Assign">


            </form>

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

