<?php
require_once 'DBconnect.php';
require_once 'Validation.php';
require_once 'DataAccess.php';

class Dao {

	private $dao;
	public function __construct($obj){
		switch ($obj) {
			case "Equipment": $this->dao = new Equipment_dao(); break;
            case "Food": $this->dao = new Food_dao(); break;
            case "Menu": $this->dao = new Menu_dao(); break;
            case "Order": $this->dao = new Order_dao(); break;
            case "Schedule": $this->dao = new Schedule_dao(); break;
            case "Staff": $this->dao = new Staff_dao(); break;
            case "Recipe": $this->dao = new Recipe_dao(); break;
            case "Orderlist": $this->dao = new Orderlist_dao(); break;
            default: $this->dao = new Default_dao();
        }
	}

	public function showAll() {
		$db = new DBconnect();
		$conn = $db->setup();
		$sql = $this->dao->sql_show();
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

		return $this->dao->add($conn, $s);
	}

	public function updateData($s) {
		$db = new DBconnect();
		$conn = $db->setup();

		return $this->dao->update($conn, $s);
	}

	public function deleteby($s) {
		$db = new DBconnect();
		$conn = $db->setup();
		$sql = $conn->prepare($this->dao->sql_delete());
		$sql->bind_param("s",$p);
		$p = Validation::validate($s, $conn);
		$result = $sql->execute();
		if($result) {
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}

	public function getAuth($header) {
		return $this->dao->authCheck($header);
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

	public function updatePopularity($mid, $pop) {
		$db = new DBconnect();
		$conn = $db->setup();
		$sql = "update menu set POPULARITY = '$pop' where ID = '$mid'";
		$result = $conn->query($sql);
		return $result;
	}

}

?>