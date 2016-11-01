<?php
require_once 'DBconnect.php';
require_once 'Validation.php';
require_once 'DataAccess.php';

class Dao {

	private $auth;
	public function __construct($obj){
		switch ($obj) {
			case "Equipment": $this->auth = new Equipment_dao(); break;
            case "Food": $this->auth = new Food_dao(); break;
            case "Menu": $this->auth = new Menu_dao(); break;
            case "Order": $this->auth = new Order_dao(); break;
            case "Schedule": $this->auth = new Schedule_dao(); break;
            case "Staff": $this->auth = new Staff_dao(); break;
            default: $this->auth = new Default_dao();
        }
	}

	public function showAll() {
		$db = new DBconnect();
		$conn = $db->setup();
		$sql = $this->auth->sql_show();
		$result = $conn->query($sql);
		return $this->showjson($result);
	}

	public function findby($table, $selector, $column, $s) {
		$db = new DBconnect();
		$conn = $db->setup();
		$s = Validation::validate($s, $conn);
		$sql = "select $selector from $table where $column = '$s'";
		$result = $conn->query($sql);
		return $this->showjson($result);
	}

	public function addData($s) {
		$db = new DBconnect();
		$conn = $db->setup();

		return $this->auth->add($conn, $s);
	}

	public function updateData($s) {
		$db = new DBconnect();
		$conn = $db->setup();

		return $this->auth->update($conn, $s);
	}

	public function deleteby($s) {
		$db = new DBconnect();
		$conn = $db->setup();
		$sql = $conn->prepare($this->auth->sql_delete());
		$sql->bind_param("s",$p);
		$p = Validation::validate($s, $conn);
		$result = $sql->execute();
		if($result) {
			$response = "success";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}

	public function getAuth($header) {
		return $this->auth->authCheck($header);
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