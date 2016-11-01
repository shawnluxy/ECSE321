<?php

$app->get('/staff', function($request) {
	$dao = new Dao("Staff");
	echo $dao->showAll();
});

$app->post('/login', function($request) {
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