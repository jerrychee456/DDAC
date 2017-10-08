<?php
    
    if (isset($_SESSION))
        session_start();

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

?>

<html>
    <head>
        <meta content="en-us" http-equiv="Content-Language" />
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Ukraine Ticketing System</title>

        <style type="text/css">
            <?php include ('resources/css/bootstrap.css') ?>
            <?php include ('resources/css/style.css') ?>
        </style> 
    </head>

    <div class="row row-eq-height" style="height:70px" id="header">
        <div class="col-md-3 vertical-center">
            <div class="col-md-4 col-md-offset-4">
                <a href="index.php" class="display-block header-link">Home</a>
            </div>
        </div>

        <?php 

            if (isset($user)){
                
                echo '  <div class="col-md-3 vertical-center">
                            <div class="col-md-4 col-md-offset-4">
                                <a href="bookingpage.php" class="display-block header-link">Booking</a>
                            </div>
                        </div>';
            }
        ?>

        <?php 
    
            if (isset($user)){
                
                echo '  
                    <div class="col-md-3 vertical-center">
                        <div class="col-md-4 col-md-offset-4">
                            <a href="viewbookingpage.php" class="display-block header-link">View Booking</a>
                        </div>
                    </div>';
            }
        ?>

        <?php 
    
            if (isset($user)){

                 echo '
                    <div class="col-md-3 vertical-center">
                        <div class="col-md-offset-6 vertical-center">
                            <a href="index.php" class="btn btn-block btn-primary active">Logout</a>
                        </div>
                    </div>';
            }
            else{  
                echo '
                <div class="col-md-3 col-md-offset-7 vertical-center">
                    <div class="col-md-offset-6 vertical-center">
                        <a href="loginpage.php" class="btn btn-block btn-primary active">Login</a>
                    </div>

                    <div class="col-md-offset-1 vertical-center">
                        <a href="registerpage.php" class="btn btn-block btn-primary active">Register</a>
                    </div>
                </div>';
            }
        ?>

    </div>


</html>
