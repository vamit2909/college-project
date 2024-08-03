<?php
    require 'connection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body style="background: #092627">
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br><br>
           <div class="container" style="margin-top: 5%">
                <div class="card">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel " >
                            <div class="panel-heading" style="background-color: #ef9e1d">
                                <h3 class="text-center">LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to make a purchase.</p>
                                <form method="post" action="login_submit.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" value="<?php isset($_POST['email'])? $_POST['email']: ""; ?>" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div style="margin: auto; width: max-content;">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer" style="background-color: #ef9e1d" >Don't have an account yet? <a href="signup.php">Register</a></div>
                        </div>
                    </div>
                </div>
           </div>
           <br><br><br><br><br>
         
        </div>
    </body>
</html>
<style>
        body {
            background: #092627;
        }

        .panel {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: #ef9e1d;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: #fff;
            padding: 10px;
        }

        .panel-body {
            padding: 20px;
        }

        .panel-footer {
            background-color: #ef9e1d;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .search-bar {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar .form-group {
            margin-bottom: 0;
        }

        .search-bar .btn {
            border-radius: 0 5px 5px 0;
        }

        .search-bar .form-control {
            border-radius: 5px 0 0 5px;
            border: none;
            box-shadow: none;
        }
    </style>
