<?php
include("../include/admin_master.php");

if (!empty($_GET['action'])) {

    if($_GET['submit']=="Activate") {
        $userid = $_GET['userid'];
        $sql = "UPDATE dms_users SET status=1 WHERE user_id='$userid'";
        $result = mysqli_query($db, $sql);
    }
    else{
        $userid = $_GET['userid'];
        $sql = "UPDATE dms_users SET status=0 WHERE user_id='$userid'";
        $result = mysqli_query($db, $sql);
    }
}

?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Users</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"></i> User List</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table">
                <th>Sr. No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Status</th>
                <?php

                $sql = "SELECT * FROM dms_users WHERE role='staff'";
                $result = mysqli_query($db,$sql);
                $count=0;
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['status']==1) {
                        $summary = "Deactivate";
                        $class = "btn-danger";
                    }
                    else {
                        $summary = "Activate";
                        $class = "btn-info";
                    }
                        echo "<tr>
                                <td>" . ++$count . "</td>
                                <td>" . $row['fullname'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>
                                    <form action='' method='GET'>
                                        <input type='hidden' name='userid' value='".$row['user_id']."' />
                                        <input type='hidden' name='action' value='submit'/>
                                        <input type='submit' name='submit' value='".$summary."' class='btn ".$class."'>
                                    </form>
                                </td>
                            </tr>";
                }
                ?>
            </table>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->

</html>

