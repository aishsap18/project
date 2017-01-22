<?php
/**
 * Created by PhpStorm.
 * User: mayur
 * Date: 22-01-2017
 * Time: 09:26
 */
include("include/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $myfullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $myrole = "staff";
    $status = 0;

    $sql1 = "SELECT * FROM dms_users WHERE username = '$myusername'";
    $result1 = mysqli_query($db, $sql1);
    if (mysqli_num_rows($result1)>0){
        echo "present";
    }else {
        $sql = "INSERT INTO dms_users (status,fullname,username,password,role) VALUES ($status,'$myfullname','$myusername','$mypassword','$myrole')";
        $result = mysqli_query($db, $sql);
        $sql2 = "SELECT * FROM dms_users WHERE username='$myusername'";
        $result2 = mysqli_query($db, $sql2);
        $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $user_id = $row['user_id'];
        $sql3 = "INSERT INTO dms_profile (user_id,picture) VALUES ($user_id,'propic.png')";
        $result3 = mysqli_query($db, $sql3);
        if ($result) {
            if($result2){
                if($result3){
                    echo "success";
                }
            }
        } else {
            echo "failed";
        }
    }
 }

?>