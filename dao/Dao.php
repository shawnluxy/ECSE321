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
		return $db->showjson($result);
	}

	public function findby($table, $selector, $column, $s) {
		$db = new DBconnect();
		$conn = $db->setup();
		$s = Validation::validate($s, $conn);
		$sql = "select $selector from $table where $column = '$s'";
		$result = $conn->query($sql);
		return $db->showjson($result);
	}

	public function addData($s) {
		return $this->auth->add($s);
	}

	public function updateData($s) {
		return $this->auth->update($s);
	}

	public function deleteby($s) {
		$db = new DBconnect();
		$conn = $db->setup();
		$sql = $conn->prepare($this->auth->sql_delete());
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

	public function getAuth($header) {
		return $this->auth->authCheck($header);
	}

}

?>