<?php
include("../include/admin_master.php");

$user = $_SESSION['user_id'];

if(isset($_GET['userid'])){
    $curuser = $_GET['userid'];
    $_SESSION['curuser'] = $curuser;
}else{
    $curuser = $_SESSION['curuser'];
}

if (!empty($_GET['action'])) {

    $eventname = mysqli_real_escape_string($db, $_GET['submit']);
    $sql = "SELECT * FROM dms_event WHERE eventname='$eventname'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$_SESSION['event_id'] = $row['event_id'];
    //$event_id = $_SESSION['event_id'];
    $parent_id = $row['parent_id'];
    //echo $parent_id;
    $event_id = $row['event_id'];
}
else{

    $curuser = $_SESSION['curuser'];
    $event_id = $_SESSION['event_id'];
    $sql5 = "SELECT * FROM dms_event WHERE event_id='$event_id'";
    $result5 = mysqli_query($db, $sql5);
    $row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
    //$_SESSION['event_id'] = $row['event_id'];
    //$event_id = $_SESSION['event_id'];
    $parent_id = $row5['parent_id'];
    //echo $parent_id;
}

    $sql7 = "SELECT * FROM dms_users WHERE user_id='$curuser'";
    $result7 = mysqli_query($db, $sql7);
    $row7 = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $fullname = $row7['fullname'];

    $sql6 = "SELECT * FROM dms_event WHERE event_id='$event_id'";
    $result6 = mysqli_query($db, $sql6);
    $row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC);
    $event = $row6['eventname'];

?>

    <body>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Userwise Events</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
                        <li><i class="fa fa-bars"><a href="admin_userwise_events.php"> Userwise Events</a></i>
                        <li> <?php echo $fullname; ?></li>
                        <li> <?php echo $event; ?></li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

<?php
/*
echo "<div class='main'>
     <div class='container'>
    <div class='row'>
     <div class='col-sm-4 col-sm-offset-3'>
    <form action='../admin/add_event.php' method='post'>
        <input type='hidden' name='event' value='".$event_id."'>
        <input type='submit' class='btn' id='sample_button' value='Add Sub-event'>
    </form>
    </div>
    </div>
    </div>";
echo "<br>";
*/
$sql4 = "SELECT * FROM dms_event WHERE parent_id = '$event_id'";
$result4 = mysqli_query($db, $sql4);

$count1 = mysqli_num_rows($result4);

if($count1!=0) {
   // echo"<div class='container'> <div class='row' id='container_disp'> ";
    while ($row = mysqli_fetch_assoc($result4)) {
        //$summary = implode($row);
        echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                <div class='text-center'>
                <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='get'>
                    <input type='hidden' name='action' value='submit' />
                    <input type='submit' name='submit' value='" . $row['eventname'] . "' id='folder_button' class='btn btn-default btn-lg' onclick='location.href='display_all.php';'>"
            . "</form>
                </div>
            </div>";
    }
  //  echo "</div></div>";
}
else {
   /* echo"<div class='container'> <div class='row'> ";
    include("../include/admin_upload.php");
    echo "</div></div>";
    echo "<br>"; */
    // echo"<div class='container'> <div class='row'> ";
    $sql1 = "SELECT dm_id FROM dms_data_master WHERE event_id='$event_id' AND user_id='$curuser'";
    $result1 = mysqli_query($db, $sql1);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $dm_id = $row1['dm_id'];
    $sql3 = "SELECT * FROM dms_data WHERE dm_id='$dm_id'";
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
                        <a rel='gallery1' class='various' href='http://localhost:8081/finalproject/uploads/" . $row['filename'] . "'>
                            <img  src='../uploads/" . $row['filename'] . "' height='150px' width='200px' />
                        </a><br>
                        <label>" . $cut . "</label>
                      </div>";
        }else{

            echo "<div id='data' class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                        <a class='txtEditor' href='http://localhost:8081/finalproject/uploads/" . $row['filename'] . "'>
                            <img src='../img/docimg.png' height='150px' width='150px' />
                        </a><br>
                        <label>" . $cut . "</label>
                    </div>";
        }
    }
    echo "</div>";
    //echo "</div></div>";
   // echo "</div></div>";
}
//echo "</div>";

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
    </body>

