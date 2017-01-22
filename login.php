<?php
include("include/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT * FROM dms_users WHERE username = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    //echo $_SESSION['user_id'];
    //echo $_SESSION['username'];
    if($count == 1) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $myusername;
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['role'] = $row['role'];

        if($row['status'] == 0) {
            echo "deactive";
        }else {
            echo $row['role'];
        }
       // echo $row['user_id'];
    }

}
?>