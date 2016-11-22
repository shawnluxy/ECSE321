<?php

$app->get('/staff', function($request) {
	$dao = new Dao("Staff");
	echo $dao->showAll();
});

$app->get('/staff/{id}', function($request) {
	$id = $request->getAttribute('id');
	$dao = new Dao("Staff");
	echo $dao->findby('staff','ID,NAME,ROLE,GENDER,AGE,TEL','ID',$id);
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
		return "404: Item Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_staff/{id}', function($request) {
	$dao = new Dao("Staff");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getAttribute('id');
	$exist = $dao->findby('staff','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
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