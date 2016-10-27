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

	public function showjson($result) {
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			header('Content-Type: application/json');
			return json_encode($data);
		}else {
			return "empty";
		}
	}

}

?>
