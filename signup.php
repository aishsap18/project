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

                $('#signup').click(function()
                {
                    var username=$("#username").val();
                    var password=$("#password").val();
                    var fullname=$("#fullname").val();
                    var dataString = 'username='+username+'&password='+password+'&fullname='+fullname;
                    if($.trim(username).length>0 && $.trim(password).length>0 && $.trim(fullname).length>0)
                    {
                        $.ajax({
                            type: "POST",
                            url: "register.php",
                            data: dataString,
                            cache: false,
                            beforeSend: function(){ $("#signup").val('Connecting...');},
                            success: function(data){
                                if(data)
                                {
                                    $("#signup").val('Signup');
                                    if(data=="success") {
                                        $("#success").html("<span style='color:#00ff00'>Warning:</span> Signup Successful. Your account is not activated yet . You get notified when your account is activated");
                                    } else if(data=="failed") {
                                        $("#error").html("<span style='color:#cc0000'>Error:</span> Extremely Sorry !Error at our end .Please Be Patient ");
                                    }else if(data=="present")
                                        //alert(data);
                                    $("#error").html("<span style='color:#cc0000'>Error:</span> BE UNIQUE !! Username is already used. Please choose another one");
                                }
                                else
                                {
                                    $('#login-form').shake();
                                    $("#signup").val('Signup');
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

        <div class="login-form" >
            <div class="login-wrap">
                <form action="" method="POST">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_pens"></i></span>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" autofocus>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <input class="btn btn-primary btn-lg btn-block" type="submit" id="signup" value="Signup">
                    <br>
                <span class='msg'></span>

                <div id="error"></div>
                <div id="success"></div>
                </form>
                <button onclick="window.location='index.php';" class="btn btn-info btn-lg btn-block">Login</button>
            </div>
        </div>
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