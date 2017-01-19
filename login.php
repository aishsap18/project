<?php
include("include/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT * FROM dms_users WHERE username = '$myusername' and password = '$mypassword'";
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
        echo $row['role'];
       // echo $row['user_id'];
    }
    /*
    else {
        echo "<html>
                <head>
                <title>Error</title>
                <link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
                <link href='css/bootstrap.min.css' rel='stylesheet'>
                <link rel= 'stylesheet' href='css/style.css'>
                <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
                <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
                <script>
                $( function() {
                    $( '#dialog' ).dialog();
                } );
                </script>
                </head>
                <body>

                <div id='dialog' title='Login Failed'>
                <div class='row'>
                <p>Invalid Username or password</p>
                </div>
                <div class='row'>
                <div class='col-xs-2 col-xs-offset-4'>
                <a href='index.html'type='button' class='btn btn-primary'>Re-Login</a>
                </div>
                </div>
                </div>
                </body>
                </html>";
    }
    */
}
?>