<?php

    session_start();
	if (isset($_SESSION['user'])){
	        $user = $_SESSION['user'];
	}

	include('DBOperation.php');

		$db = new DBOperation();
		$sqlquery = "SELECT * FROM booking WHERE booked_by = '$user'";

		$result = $db->get($sqlquery);


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
				<h2>View Booking</h2>
			</div>

			<div>
				<table class="table">
					<thead>
					    <tr>
					      <th>No.</th>
					      <th>Origin</th>
					      <th>Destination</th>
					      <th>Seat id</th>
					    </tr>
					  </thead>
					<tbody>
						<?php
							$count = 1;
							while($booking = mysqli_fetch_assoc($result)){

								echo "<tr>";

								echo "<td>". $count ."</td>";
								echo "<td>". $booking['origin']. "</td>";
								echo "<td>". $booking['destination']. "</td>";
								echo "<td>". $booking['seatid']. "</td>";

								echo "</tr>";

								$count++;
							}
						?>
					</tbody>
				</table>		
			</div>        

		</div>
		<?php include ('template/footer.php') ?>
	</body>

</html>
