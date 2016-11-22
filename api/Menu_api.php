<?php

$app->get('/menu', function($request) {
	$dao = new Dao("Menu");
	echo $dao->showAll();
});

$app->get('/menu/{id}', function($request) {
	$mid = $request->getAttribute('id');
	$dao = new Dao("Menu");
	echo $dao->findby('recipe','ID, FOOD_NAME, AMOUNT','MID',$mid);
});

$app->post('/add_menu', function($request) {
	$dao = new Dao("Menu");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->post('/add_recipe', function($request) {
	$dao = new Dao("Recipe");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->put('/update_menu', function($request) {
	$dao = new Dao("Menu");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$data = $request->getParsedBody();
	$exist = $dao->findby('menu','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_menu/{id}', function($request) {
	$dao = new Dao("Menu");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getAttribute('id');
	$exist = $dao->findby('menu','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

$app->delete('/delete_recipe/{id}', function($request) {
	$dao = new Dao("Recipe");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getAttribute('id');
	$exist = $dao->findby('recipe','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

?>