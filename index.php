<?php
/*
session_start();
if(empty($_SESSION['user_id']))
{
    header('Location: ');
}
else{
    if($_SESSION['role']=="staff")
        header('Location: user/home.php');
    else
        header('Location: admin/dashboard.php');
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login | Document Management System</title>
    <script src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/jquery.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function() {

            $('#login').click(function()
            {
                var username=$("#username").val();
                var password=$("#password").val();
                var dataString = 'username='+username+'&password='+password;
                if($.trim(username).length>0 && $.trim(password).length>0)
                {
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: dataString,
                        cache: false,
                        beforeSend: function(){ $("#login").val('Connecting...');},
                        success: function(data){
                            if(data)
                            {
                                if(data=="staff")
                                    window.location.href = "user/home.php";
                                else if(data=="hod")
                                    window.location.href = "admin/dashboard.php";
                            }
                            else
                            {
                                $('#box').shake();
                                $("#login").val('Login');
                                $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
                            }
                        }
                    });

                }
                return false;
            });


        });
    </script>
</head>

<body>

<div>

    <form class="login-form" action="" method="POST">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <input class="btn btn-primary btn-lg btn-block" type="submit" id="login" value="Login">
            <button class="btn btn-info btn-lg btn-block">Signup</button>

            <span class='msg'></span>

            <div id="error"></div>
        </div>
    </form>
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
</div>


</body>
</html>
