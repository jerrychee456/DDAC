<?php

    session_start();

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

	if (isset($_POST['submitted'])){

		include('DBOperation.php');

		$db = new DBOperation();
		$origin = $_POST['Origin'];
		$destination = $_POST['Destination'];
		$seatid = $_POST['Seat'];
		$user = $_SESSION['user'];

		if (($origin != null or "") and ($destination != null or "") and ($seatid != null or "")){

			$sqlquery = "INSERT INTO Booking(origin, destination, seatid, status, booked_by) VALUES ('$origin', '$destination', '$seatid', 'Booked', '$user')";
			$db->run($sqlquery);
			echo '<script>alert("Booked sucessfully");</script>';
		}
		else{

			echo '<script>alert("Please fill up the form");</script>';
		}

	}



?>


<html>
	<head>
		<script src="resources/js/jquery-3.2.1.min.js"></script>
		<meta content="en-us" http-equiv="Content-Language" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>Ukraine Ticketing System</title>
		<style type="text/css">
            <?php include ('resources/css/bootstrap.css') ?>
            <?php include ('resources/css/style.css') ?>
        </style> 
        <style type="text/css">
            <?php include ('resources/css/planecss.css') ?>
        </style> 

        <script type="text/javascript">

        	$(document).ready(function(){

				$(".seat").on("click", function() {
					document.getElementById('seat').value = $(this).attr("name");
				});

				$(".rightseat").on("click", function() {
					document.getElementById('seat').value = $(this).attr("name");
				});
			});

    	</script>
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
				<h2>Booking Page</h2>
			</div>

			<div style="width:100%;height:100%;">
				<div style="width:49.5%;height:100%;float:left;">
					<div class="seatrow">
						<div class="seat" name="A1">A1
						</div>
						<div class="seat" name="A2">A2
						</div>
						<div class="seat" name="A3">A3
						</div>
						<div class="rightseat" name="A6">A6
						</div>
						<div class="rightseat" name="A5">A5
						</div>
						<div class="rightseat" name="A4">A4
						</div>
					</div>

					<div class="seatrow">
						<div class="seat" name="B1">B1
						</div>
						<div class="seat" name="B2">B2
						</div>
						<div class="seat" name="B3">B3
						</div>
						<div class="rightseat" name="B6">B6
						</div>
						<div class="rightseat" name="B5">B5
						</div>
						<div class="rightseat" name="B4">B4
						</div>
					</div>

					<div class="seatrow">
						<div class="seat" name="C1">C1
						</div>
						<div class="seat" name="C2">C2
						</div>
						<div class="seat" name="C3">C3
						</div>
						<div class="rightseat" name="C6">C6
						</div>
						<div class="rightseat" name="C5">C5
						</div>
						<div class="rightseat" name="C4">C4
						</div>
					</div>

					<div class="seatrow">
						<div class="seat" name="D1">D1
						</div>
						<div class="seat" name="D2">D2
						</div>
						<div class="seat" name="D3">D3
						</div>
						<div class="rightseat" name="D6">D6
						</div>
						<div class="rightseat" name="D5">D5
						</div>
						<div class="rightseat" name="D4">D4
						</div>
					</div>

					<div class="seatrow">
						<div class="seat" name="E1">E1
						</div>
						<div class="seat" name="E2">E2
						</div>
						<div class="seat" name="E3">E3
						</div>
						<div class="rightseat" name="E6">E6
						</div>
						<div class="rightseat" name="E5">E5
						</div>
						<div class="rightseat" name="E4">E4
						</div>
					</div>
				</div>


				<div style="width:49.5%;height:100%;margin-left:10px;float:left">

					<form id="bookingform" method="POST" action="bookingpage.php">
		                
		        		<input type="hidden" name="submitted" value="true">

		                <h5>Origin</h5>
		                <input type="text" class="form-control" id="Origin" name="Origin" placeholder="Origin"/>
		                
		                <h5>Destination</h5>
		                <input class="form-control" id="Destination" name="Destination" 
		                             placeholder="Destination" />

		                <h5>Seat ID</h5>
		                <input class="form-control" id="seat" name="Seat" 
		                             placeholder="Seat ID" />
		                
		                <div class="col-md-4" style="padding-top: 20px;padding-right:0;float:right">

		                    <input type="submit" class="form-control" id="book" value="Book"/>

		                </div>
		            <form>
				</div>
			</div>


		</div>

		<?php include ('template/footer.php') ?>
	</body>

</html>
