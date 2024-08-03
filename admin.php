<?php
    require 'connection.php';
    session_start();

    if (isset($_SESSION['admin'])) {
        header('location: admin_panel.php');
        exit;
    }

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
    <body style="background: #888585;">
        <div>
            <?php
                require 'header.php';
                include 'connection.php';

                if(isset($_POST['submit'])){


                    $username = $_POST['username'];
                    $password= $_POST['password'];

                    $sql = "Select * from admin where username='$username' and password='$password' ";
                    echo $sql;

                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result)>0){

                        $_SESSION['admin'] = $username;
                

                        ?>
                        <script>
                            alert("Admin Logged in Successfully");
                            window.location.href='admin_panel.php';
                        </script>
                        <?php
                       
                    }else{

                        ?>
                        <script>
                            alert("Invalid Credential");
                        </script>
                        <?php
                       

                    }



                }
            ?>
            <br><br><br>
           <div class="container" style="margin-top: 5%;">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 style="margin: auto; width: max-content;">ADMIN LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to make a purchase.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?php isset($_POST['username'])? $_POST['username']: ""; ?>" name="username" placeholder="username" >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div style="margin: auto; width: max-content;">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <br><br><br><br><br>
         
        </div>
    </body>
</html>
