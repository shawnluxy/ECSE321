<?php

$app->get('/schedule', function($request) {
	$dao = new Dao("Schedule");
	echo $dao->showAll();
});

$app->get('/schedule/{id}', function($request) {
	$uid = $request->getAttribute('id');
	$dao = new Dao("Schedule");
	echo $dao->findby('schedule','ID, START_TIME, END_TIME','UID',$uid);
});

$app->post('/add_schedule', function($request) {
	$dao = new Dao("Schedule");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->put('/update_schedule', function($request) {
	$dao = new Dao("Schedule");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$data = $request->getParsedBody();
	$exist = $dao->findby('schedule','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_schedule/{id}', function($request) {
	$dao = new Dao("Schedule");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getAttribute('id');
	$exist = $dao->findby('schedule','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

?>