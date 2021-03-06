<?php
include("../include/admin_master.php");
if (isset($_POST['event'])) {
    $eventid = $_POST['event'];
}
else{
    $eventid = 0;
}
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
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Add Event</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> Add Event</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form action="admin_add_event_action.php" method="post">
                <label class="control-label input-lg"> Event Name : </label>
                <input class="form-control input-lg m-bot15" type="text" name="event_name">
                <label class="control-label input-lg"> Description : </label>
                <input class="form-control input-lg m-bot15" type="text" name="description">
                <?php echo "<input type='hidden' name='event' value='".$eventid."'>"; ?>
                <input type="submit" class="btn btn-default btn-lg" value="Add Event" id="add_button" class="btn">
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

