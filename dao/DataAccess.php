<?php 

interface DataAccess {
	public function sql_show();
	public function sql_delete();
	public function add($conn, $s);
	public function update($conn, $s);
	public function authCheck($header);
}


class Equipment_dao implements DataAccess {
	public function sql_show() {
		return "select * from equipment order by NAME ASC";}
	public function sql_delete() {
		return "delete from equipment where NAME = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into equipment (NAME, QUANTITY, PRICE) values (?, ?, ?)");
		$sql->bind_param("sid", $name, $quantity, $price);
		$name = $s["NAME"];
		$quantity = $s["QUANTITY"];
		$price = $s["PRICE"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$rname = $s["RAW_NAME"];
		$sql = $conn->prepare("update equipment set NAME = ?, QUANTITY = ?, PRICE = ? where NAME = '$rname'");
		$sql->bind_param("sid", $name, $quantity, $price);
		$name = $s["NAME"];
		$quantity = $s["QUANTITY"];
		$price = $s["PRICE"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;	
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager", "Wholesaler");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Food_dao implements DataAccess {
	public function sql_show() {
		return "select * from food order by NAME ASC";}
	public function sql_delete() {
		return "delete from food where NAME = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into food (NAME, QUANTITY, PRICE) values (?, ?, ?)");
		$sql->bind_param("sid", $name, $quantity, $price);
		$name = $s["NAME"];
		$quantity = $s["QUANTITY"];
		$price = $s["PRICE"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$rname = $s["RAW_NAME"];
		$sql = $conn->prepare("update food set NAME = ?, QUANTITY = ?, PRICE = ? where NAME = '$rname'");
		$sql->bind_param("sid", $name, $quantity, $price);
		$name = $s["NAME"];
		$quantity = $s["QUANTITY"];
		$price = $s["PRICE"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager", "Wholesaler");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Menu_dao implements DataAccess {
	public function sql_show() {
		return "select * from menu order by NAME ASC";}
	public function sql_delete() {
		return "delete from menu where ID = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into menu (ID, NAME, PRICE, POPULARITY) values (?, ?, ?, ?)");
		$sql->bind_param("ssdi", $id, $name, $price, $popularity);
		$id = $s["ID"];
		$name = $s["NAME"];
		$price = $s["PRICE"];
		$popularity = $s["POPULARITY"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$id = $s["ID"];
		$sql = $conn->prepare("update menu set NAME = ?, PRICE = ?, POPULARITY = ? where ID = '$id'");
		$sql->bind_param("sdi", $name, $price, $popularity);
		$name = $s["NAME"];
		$price = $s["PRICE"];
		$popularity = $s["POPULARITY"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager", "Cook");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Order_dao implements DataAccess {
	public function sql_show() {
		return "select * from orders order by TIME ASC";}
	public function sql_delete() {
		return "delete from orders where ID = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into orders (ID, TIME, STATUS) values (?, ?, ?)");
		$sql->bind_param("ssi", $id, $time, $status);
		$id = $s["ID"];
		$time = $s["TIME"];
		$status = $s["STATUS"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$id = $s["ID"];
		$sql = $conn->prepare("update orders set TIME = ?, STATUS = ? where ID = '$id'");
		$sql->bind_param("si", $time, $status);
		$time = $s["TIME"];
		$status = $s["STATUS"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager", "Cashier");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Schedule_dao implements DataAccess {
	public function sql_show() {
		return "select * from schedule order by ID ASC";}
	public function sql_delete() {
		return "delete from schedule where ID = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into schedule (ID, UID, START_TIME, END_TIME) values (?, ?, ?, ?)");
		$sql->bind_param("ssss", $id, $uid, $start_time, $end_time);
		$id = $s["ID"];
		$uid = $s["UID"];
		$start_time = $s["START_TIME"];
		$end_time = $s["END_TIME"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$id = $s["ID"];
		$sql = $conn->prepare("update schedule set UID = ?, START_TIME = ?, END_TIME = ? where ID = '$id'");
		$sql->bind_param("sss", $uid, $start_time, $end_time);
		$uid = $s["UID"];
		$start_time = $s["START_TIME"];
		$end_time = $s["END_TIME"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Staff_dao implements DataAccess {
	public function sql_show() {
		$selector = "ID,NAME,ROLE,GENDER,AGE,TEL";
		return "select $selector from staff order by NAME ASC";}
	public function sql_delete() {
		return "delete from staff where ID = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into staff (ID, NAME, ROLE, GENDER, AGE, TEL, USERNAME, PASSWORD) values (?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->bind_param("ssssiiss", $id, $name, $role, $gender, $age, $tel, $username, $password);
		$id = $s["ID"];
		$name = $s["NAME"];
		$role = $s["ROLE"];
		$gender = $s["GENDER"];
		$age = $s["AGE"];
		$tel = $s["TEL"];
		$username = $s["USERNAME"];
		$password = $s["PASSWORD"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$id = $s["ID"];
		$sql = $conn->prepare("update staff set NAME = ?, ROLE = ?, GENDER = ?, AGE = ?, TEL = ?, USERNAME = ?, PASSWORD = ? where ID = '$id'");
		$sql->bind_param("sssiiss", $name, $role, $gender, $age, $tel, $username, $password);
		$name = $s["NAME"];
		$role = $s["ROLE"];
		$gender = $s["GENDER"];
		$age = $s["AGE"];
		$tel = $s["TEL"];
		$username = $s["USERNAME"];
		$password = $s["PASSWORD"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Recipe_dao implements DataAccess {
	public function sql_show() {
		return "select * from recipe order by ID ASC";}
	public function sql_delete() {
		return "delete from recipe where ID = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into recipe (MID, FOOD_NAME, AMOUNT) values (?, ?, ?)");
		$sql->bind_param("ssi", $mid, $food_name, $amount);
		$mid = $s["MID"];
		$food_name = $s["FOOD_NAME"];
		$amount = $s["AMOUNT"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$id = $s["ID"];
		$sql = $conn->prepare("update recipe set MID = ?, FOOD_NAME = ?, AMOUNT = ? where ID = '$id'");
		$sql->bind_param("ssi", $mid, $food_name, $amount);
		$mid = $s["MID"];
		$food_name = $s["FOOD_NAME"];
		$amount = $s["AMOUNT"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager", "Cook");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Orderlist_dao implements DataAccess {
	public function sql_show() {
		return "select * from orderlist order by OID ASC";}
	public function sql_delete() {
		return "delete from orderlist where ID = ?";}
	public function add($conn, $s) {
		$sql = $conn->prepare("insert into orderlist (OID, MID, MENU_NAME, AMOUNT) values (?, ?, ?, ?)");
		$sql->bind_param("sssi", $oid, $mid, $menu_name, $amount);
		$oid = $s["OID"];
		$mid = $s["MID"];
		$menu_name = $s["MENU_NAME"];
		$amount = $s["AMOUNT"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function update($conn, $s) {
		$id = $s["ID"];
		$sql = $conn->prepare("update orderlist set OID = ?, MID = ?, MENU_NAME = ?, AMOUNT = ? where ID = '$id'");
		$sql->bind_param("si", $time, $status);
		$oid = $s["OID"];
		$mid = $s["MID"];
		$menu_name = $s["MENU_NAME"];
		$amount = $s["AMOUNT"];
		$result = $sql->execute();
		if($result){
			$response = "SUCCESS";
		}else {
			$response = "406: ". $sql->error;
		}
		$sql->close();
		return $response;
	}
	public function authCheck($header) {
		$role = $header[0];
		$permission = array("Manager", "Cashier");
		if(in_array($role, $permission)) {
			return 1;}
		return 0;
	}
}

class Default_dao implements DataAccess {
	public function sql_show() {
		return "";}
	public function sql_delete() {
		return "";}
	public function add($conn, $s) {
		return 0;
	}
	public function update($conn, $s) {
		return 0;
	}
	public function authCheck($header) {
		return 0;
	}
}

?>