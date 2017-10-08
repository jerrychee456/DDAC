<?php

	class DBConnect{

		private $con;

		function __construct(){


		}

		function connect(){

			include('DBConstants.php');
			$this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			return $this->con;
		}


	}


?>