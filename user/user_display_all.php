<?php
include("../include/user_master.php");
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
            <div class="col-lg-12">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="page-header"><?php echo $eventname;?></h3>
                </div>
                    <?php
                    if($count1==0){
                        echo "
                        <div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-4 \">
                        <div class='nav search-row page-header' id='top_menu'>
                        <!--  search form start -->
                        <ul class='nav top-menu'>
                            <li>
                                <form action='../include/user_search.php' method='get' class='navbar-form'>
                                    <input type='hidden' name='userid' value='". $user."'>
                                    <input type='hidden' name='event' value='". $event_id."'>
                                    <input class='form-control' placeholder='Search' name='search_text' type='text'>
                                </form>
                            </li>
                        </ul>
                        <!--  search form end -->
                    </div>
                    </div>";
                    }
                    ?>
                    <?php
                    if($count1==0){
                        echo "<div class=\"col-lg-2 col-md-2 col-sm-3 col-xs-3 page-header\">
                            <form action='../user/user_share_file.php' method='get'>
                            <input type='hidden' name='event' value='" . $event_id . "'>
                            <input type='submit' class='btn btn-default btn-md' value='Share File'>
                        </form>
                        </div>";
                    }
                    ?>
                    <?php
                    if($count1==0){
                        echo "<div class=\"col-lg-2 col-md-2 col-sm-3 col-xs-3 page-header\">
                                <form action='../user/user_delete_file.php' method='get'>
                            <input type='hidden' name='event' value='" . $event_id . "'>
                            <input type='submit' class='btn btn-default btn-md' value='Delete File'>
                        </form>
                        </div>";
                    }
                    ?>

                    <?php
                    if($count1!=0){
                        echo "
                            <div class=\"col-lg-2 col-md-2 col-sm-3 col-xs-3 page-header\">
                            <form action='../user/user_delete_sub_event.php' method='get'>
                            <input type='hidden' name='event' value='" . $event_id . "'>
                            <input type='submit' class='btn btn-default btn-md' value='Delete Event'>
                        </form>
                        </div>";
                    }
                    ?>
                    <?php
                        echo "<div class=\"col-lg-2 col-md-2 col-sm-3 col-xs-3 page-header\">
                        <form action='../user/user_add_event.php' method='post'>
                            <input type='hidden' name='event' value='" . $event_id . "'>
                            <input type='submit' class='btn btn-default btn-md' value='Create Folder'>
                        </form>
                        </div>";
                    ?>

            </div>
        </div>

        <div class="row">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="user_dashboard.php"> Home</a></li>
                    <li><i class="fa fa-bars"><a href="user_events.php"></i> Events</a></li>
                    <li><i class="fa fa-square"></i> <?php echo $eventname;?></li>
                </ol>
        </div>
        <!-- page start-->

        <?php

        if($count1!=0) {
            echo"<div class='row' id='container_disp'> ";
            while ($row = mysqli_fetch_assoc($result4)) {
                //$summary = implode($row);
                $temp = $row['event_id'];
                $sql2 = "SELECT * FROM dms_data_master WHERE event_id = '$temp' AND user_id='$user' AND active = 0";
                $result2 = mysqli_query($db,$sql2);

                while($row1 = mysqli_fetch_assoc($result2)) {
                    echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                <div class='text-center'>
                <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='get'>
                    <input type='hidden' name='action' value='submit' />
                    <input type='submit' name='submit' value='" . $row['eventname'] . "' id='folder_button' class='btn btn-default btn-lg' onclick='location.href='admin_display_all.php';'>"
                        . "</form>
                </div>
            </div>";
                }
            }
            echo "</div>";
        }
        else {
            echo"<div class='row'> ";
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
        }
        //echo "</div>";

        ?>


        <!-- page end-->
    </section>
</section>
<!--main content end-->
</body>