<?php
require_once 'DBconnect.php';
require_once 'Validation.php';

class Dao {
	public function __construct(){
	}

	public function showAll($table, $orderby) {
		$connection = new DBconnect();
		$conn = $connection->setup();
		$sql = "select * from $table order by $orderby ASC";
		$result = $conn->query($sql);
		return $this->showjson($result);
	}

	public function findby($table, $selector, $column, $s) {
		$connection = new DBconnect();
		$conn = $connection->setup();
		$s = Validation::validate($s, $conn);
		$sql = "select $selector from $table where $column = '$s'";
		$result = $conn->query($sql);
		return $this->showjson($result);
	}

	public function addData($table) {
		
	}

	public function updateData($table) {

	}

	public function deleteby($table, $column, $s) {
		$connection = new DBconnect();
		$conn = $connection->setup();
		$sql = $conn->prepare("delete from $table where $column = ?");
		$sql->bind_param("s",$p);
		$p = Validation::validate($s, $conn);
		$result = $sql->execute();
		if($result) {
			return "success";
		}else {
			return "error";
		}
		$sql->close();
	}

	private function showjson($result){
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