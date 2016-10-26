<?php

class DBconnect {
	public function __construct(){
	}

	public function setup() {
		$host = "localhost";
		$user = "root";
		$passwd = "root";
		$dbname = "FTMS";
		$conn = new mysqli($host, $user, $passwd, $dbname);
		if($conn->connect_error){
			 die("Connection failed: " . $conn->connect_error);
		}

		return $conn;
	}

}

?>
