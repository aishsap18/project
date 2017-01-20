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
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Userwise Events</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> Userwise Events</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <table class='table table-hover input-lg'>
                <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Full Name</th>
                    <th>Event Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM dms_users WHERE role = 'staff'";
                $result = mysqli_query($db,$sql);

                $count=0;
                while($row = mysqli_fetch_assoc($result)){
                    echo "<form action='admin_user_data.php' method='get'>";
                    echo "<input type='hidden' name='userid' value='".$row['user_id']."' />";
                    echo "<tr>
                            <td>".++$count."</td>
                            <td>".$row['fullname']."</td>";
                    $curr_user = $row['user_id'];
                    $sql1 = "SELECT event_id FROM dms_data_master WHERE user_id = '$curr_user'";
                    $result1 = mysqli_query($db,$sql1);
                    echo "<td>";
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        $curr_event = $row1['event_id'];
                        //echo $curr_event." curr-event <br>";
                        $sql2 = "SELECT eventname FROM dms_event WHERE event_id = '$curr_event' AND parent_id = 0";
                        $result2 = mysqli_query($db,$sql2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                            echo "<input type='hidden' name='action' value='submit' />
                                    <input type='submit' name='submit' value='". $row2['eventname'] ."'
                                        class='btn btn-default' onclick='location.href='admin_user_data.php';'>";
                        }
                    }
                    echo "</td>";
                    echo "</tr>";
                    echo "</form>";
                }
                ?>
                </tbody>
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

