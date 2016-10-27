<?php 


interface DataAccess {
	public function sql_show();
	public function sql_delete();
	public function add($s);
	public function update($s);
	public function authCheck($header);
}


class Equipment_dao implements DataAccess {
	public function sql_show() {
		return "select * from equipment order by NAME ASC";}
	public function sql_delete() {
		return "delete from equipment where NAME = ?";}
	public function add($s) {

	}
	public function update($s) {

	}
	public function authCheck($header) {
		return 1;
	}
}

class Food_dao implements DataAccess {
	public function sql_show() {
		return "select * from food order by NAME ASC";}
	public function sql_delete() {
		return "delete from food where NAME = ?";}
	public function add($s) {

	}
	public function update($s) {

	}
	public function authCheck($header) {
		return 233;
	}
}

class Menu_dao implements DataAccess {
	public function sql_show() {
		return "select * from menu order by NAME ASC";}
	public function sql_delete() {
		return "delete from menu where ID = ?";}
	public function add($s) {

	}
	public function update($s) {

	}
	public function authCheck($header) {
		return $header;
	}
}

class Order_dao implements DataAccess {
	public function sql_show() {
		return "select * from orders order by TIME ASC";}
	public function sql_delete() {
		return "delete from orders where ID = ?";}
	public function add($s) {

	}
	public function update($s) {

	}
	public function authCheck($header) {
		return 4;
	}
}

class Schedule_dao implements DataAccess {
	public function sql_show() {
		return "select * from schedule order by ID ASC";}
	public function sql_delete() {
		return "delete from schedule where ID = ?";}
	public function add($s) {

	}
	public function update($s) {

	}
	public function authCheck($header) {
		return 5;
	}
}

class Staff_dao implements DataAccess {
	public function sql_show() {
		return "select * from staff order by NAME ASC";}
	public function sql_delete() {
		return "delete from staff where ID = ?";}
	public function add($s) {

	}
	public function update($s) {

	}
	public function authCheck($header) {
		return 6;
	}
}

class Default_dao implements DataAccess {
	public function sql_show() {
		return "";}
	public function sql_delete() {
		return "";}
	public function add($s) {
		return 0;
	}
	public function update($s) {
		return 0;
	}
	public function authCheck($header) {
		return 0;
	}
}

?>