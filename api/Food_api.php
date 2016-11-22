<?php

$app->get('/food', function($request) {
	$dao = new Dao("Food");
	echo $dao->showAll();
});

$app->post('/add_food', function($request) {
	$dao = new Dao("Food");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->put('/update_food', function($request) {
	$dao = new Dao("Food");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$rname = $request->getParsedBody()['RAW_NAME'];
	$data = $request->getParsedBody();
	$exist = $dao->findby('food','*','NAME',$rname);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_food/{name}', function($request) {
	$dao = new Dao("Food");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$name = $request->getAttribute('name');
	$exist = $dao->findby('food','*','NAME',$name);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->deleteby($name);
	}
});

?>
