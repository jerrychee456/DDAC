<?php

	class DBOperation{

		private $con;

		function __construct(){

			include('DBConnect.php');

			$db = new DBConnect();

			$this->con = $db->connect();

		}

		function run($query){


			if ($this->con->query($query)){

				return true;

			} else {

				return false;
			}

		}

		function get($query){

			$dataset = mysqli_query($this->con, $query) or die ('error getting data');

			return $dataset;

		}


	}



?>