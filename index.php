<?php

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
            <?php include ('resources/css/w3.css') ?>
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
	                            <a href="logout.php" class="btn btn-block btn-primary active" id="logout">Logout</a>
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

		<header class="w3-container w3-red w3-center" style="padding:128px 16px">
			<h1 class="w3-margin w3-jumbo">Ukraine Flight System</h1>
				<p class="w3-xlarge">Bring the best service to you</p>
		</header>

		<div class="w3-row-padding w3-padding-64 w3-container">
			<div class="w3-content">
				<div class="w3-twothird">
					<h1>Fly to Everywhere</h1>
					<h5 class="w3-padding-32">Company provides the best experience during your flight</h5>

					<p class="w3-text-grey">Plenty of services are provided to the customers. Various class for the customer to choose. Economy, Business, First Class, Premium class and other options for the customers.
						Able to fly to almost all countries in the world except for some countries which still not yet open for foreigners.</p>
				</div>

				<div class="w3-third w3-center" style="height:auto">
				
					<img src="resources/image/flight.jpg" style="height:250px;width:250px">
				</div>
			</div>
		</div>
		            

		</div>
		<?php include ('template/footer.php') ?>
	</body>

</html>
