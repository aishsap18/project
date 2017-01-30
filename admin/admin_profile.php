<?php
/**
 * Created by PhpStorm.
 * User: mayur
 * Date: 21-01-2017
 * Time: 17:29
 */
include("../include/admin_master.php");
$user = $_SESSION['user_id'];
$query = "SELECT * FROM dms_profile WHERE user_id='$userid'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM dms_users WHERE user_id='$userid'";
$res = mysqli_query($db, $sql);
$row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                        <li><i class="fa fa-user-md"></i>Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                        <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                                <div class="follow-ava">
                                    <img src="../img/<?php echo $row['picture']; ?>" alt="">
                                </div>
                                <h4><?php echo $row['fname']." ".$row['lname'];?></h4>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p><?php echo $row['status']; ?></p>
                                <p>@<?php echo $row1['username']; ?></p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 follow-info weather-category">
                                <ul>
                                    <li class="active">

                                        <i class="fa fa-facebook fa-3x"> </i><br>
                                        <a href="https://facebook.com/<?php echo $row['facebook']?>" target="_blank"><?php echo $row['facebook']?></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 follow-info weather-category">
                                <ul>
                                    <li class="active">
                                        <i class="fa fa-twitter fa-3x"> </i><br>
                                        <a href="https://twitter.com/<?php echo $row['twitter']?>" target="_blank"><?php echo $row['twitter']?></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#profile">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#edit-profile">
                                        <i class="icon-envelope"></i>
                                        Edit Profile
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <!-- profile -->
                                <div id="profile" class="tab-pane active">
                                    <section class="panel">
                                        <div class="bio-graph-heading">
                                            <?php echo $row['abt_me']?>
                                        </div>
                                        <div class="panel-body bio-graph-info">
                                            <h1>Bio Graph</h1>
                                            <div class="row">
                                                <div class="bio-row">
                                                    <p><span>First Name </span>: <?php echo $row['fname']?> </p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Last Name </span>: <?php echo $row['lname']?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Birthday </span>: <?php echo $row['bday']?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Qualification </span>: <?php echo $row['degree']?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Email </span>: <?php echo $row['email']?></p>
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Mobile </span>: <?php echo $row['mobile']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                        </div>
                                    </section>
                                </div>
                                <!-- edit-profile -->
                                <div id="edit-profile" class="tab-pane">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Profile Info</h1>
                                            <form class="form-horizontal" role="form" action="admin_profile_submit.php" method="POST">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">First Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="fname" value="<?php echo $row['fname']; ?>" name="fname" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Last Name</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="lname" value="<?php echo $row['lname']; ?>" name="lname" placeholder=" ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">About Me</label>
                                                    <div class="col-lg-10">
                                                        <textarea  id="abt_me" name="abt_me" class="form-control" placeholder="Php specialist. You can fork me on github" cols="30" rows="5"><?php echo $row['abt_me']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="mayurdusane1@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Birthday</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="bday" name="bday" value="<?php echo $row['bday']; ?>" placeholder="19 August 1995">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Mobile</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Facebook Url</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $row['facebook']; ?>" placeholder="facebook.com/my_username">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Twitter Url</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $row['twitter']; ?>" placeholder="twitter.com/my_username">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Qualification</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="degree" name="degree" value="<?php echo $row['degree']; ?>" placeholder="BE/ME/PHD">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Status</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>" placeholder="Its Lonely Here">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!-- container section end -->
<!-- javascripts -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jquery knob -->
<script src="../assets/jquery-knob/js/jquery.knob.js"></script>
<!--custome script for all page-->
<script src="../js/scripts.js"></script>

<script>

    //knob
    $(".knob").knob();

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#OpenDialog").click(function () {
            $("#dialog").dialog({modal: true, height: 590, width: 1005 });
        });
    });
</script>


</body>
</html>

