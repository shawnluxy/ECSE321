<?php

$app->get('/equipment', function($request) {
	$dao = new Dao("Equipment");
	echo $dao->showAll();
});

$app->post('/add_equipment', function($request) {
	$dao = new Dao("Equipment");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->put('/update_equipment', function($request) {
	$dao = new Dao("Equipment");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$rname = $request->getParsedBody()['RAW_NAME']; 
	$data = $request->getParsedBody();
	$exist = $dao->findby('equipment','*','NAME',$rname);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_equipment', function($request) {
	$dao = new Dao("Equipment");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$name = $request->getParsedBody()['NAME'];
	$exist = $dao->findby('equipment','*','NAME',$name);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->deleteby($name);
	}
});

?>
