<?php

$app->get('/menu', function($request) {
	$dao = new Dao("Menu");
	echo $dao->showAll();
});

$app->get('/menu/{id}', function($request) {
	$mid = $request->getAttribute('id');
	$dao = new Dao("Menu");
	echo $dao->findby('recipe','FOOD_NAME, AMOUNT','MID',$mid);
});

$app->post('/add_menu', function($request) {
	$dao = new Dao("Menu");
	$header = $request->getHeaders();
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$name = $request->getParsedBody()['NAME'];
	$price = $request->getParsedBody()['PRICE'];
	$popularity = $request->getParsedBody()['POPULARITY'];
	$data = array("ID"=>$id, "NAME"=>$name, "PRICE"=>$price, "POPULARITY"=>$popularity);
	return $dao->addData($data);
});

$app->put('/update_menu', function($request) {
	$dao = new Dao("Menu");
	$header = $request->getHeaders();
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$name = $request->getParsedBody()['NAME'];
	$price = $request->getParsedBody()['PRICE'];
	$popularity = $request->getParsedBody()['POPULARITY'];
	$data = array("ID"=>$id, "NAME"=>$name, "PRICE"=>$price, "POPULARITY"=>$popularity);
	$exist = $dao->findby('menu','*','ID',$id);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->updateData($data);
	}
});

?>