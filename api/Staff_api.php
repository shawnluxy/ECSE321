<?php

$app->get('/staff', function($request) {
	$dao = new Dao("Staff");
	echo $dao->showAll();
});

$app->post('/add_staff', function($request) {
	$dao = new Dao("Staff");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->put('/update_staff', function($request) {
	$dao = new Dao("Staff");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$data = $request->getParsedBody();
	$exist = $dao->findby('staff','*','ID',$id);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_staff', function($request) {
	$dao = new Dao("Staff");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$exist = $dao->findby('staff','*','ID',$id);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

$app->post('/login', function($request, $response) {
	$dao = new Dao("Staff");
	$username = $request->getParsedBody()['USERNAME'];
	$password = $request->getParsedBody()['PASSWORD'];
	$user = $dao->findby('staff','ID, USERNAME, PASSWORD','USERNAME',$username);
	if($user == "empty"){
		return "NO SUCH USER";
	}
	$data = json_decode($user);
	if($password != $data[0]->PASSWORD){
		return "WRONG PASSWORD";
	}
	return $data[0]->ID;
});

?>