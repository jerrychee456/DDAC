<?php

    session_start();

	if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

	if (isset($_POST['submitted'])){


		include('DBOperation.php');

		$db = new DBOperation();
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sqlquery = "SELECT * FROM USER WHERE username = '$username' AND password = '$password' ";

		$result = $db->get($sqlquery);

		if ($result->num_rows == 1 ){

			echo "sucess";
			$_SESSION['user'] = $username;
			echo $_SESSION['user'];
			header("Location: index.php"); /* Redirect browser */
			exit;
		}
		else{

			echo '<script>alert("Incorrect username or password");</script>';
		}


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
	
	<body>
		<div id="wrap">

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
	                            <a href="logout.php" class="btn btn-block btn-primary active">Logout</a>
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


	    <div style="height:80px;text-align:center;">
			<h2>Login</h2>
		</div>


		<div style="width:30%;height:auto;margin:auto;">
		    <form method="POST" action="loginpage.php">

		        <input type="hidden" class="form-control" name="submitted" value="true">
				<div class="form-group">
			        <label>Username</label> 
			        	<input type="text" class="form-control" name="username">
		        </div>

		        <div class="form-group">
			        <label>Password</label>
			        	<input type="password" class="form-control" name="password">
			    </div>

		        <input type="submit" class="btn btn-primary" style="float:right" value="Login">

	        </form>  
        </div>        

		</div>
		<?php include ('template/footer.php') ?>
	</body>

</html>
