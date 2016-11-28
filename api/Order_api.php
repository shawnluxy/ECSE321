<?php

$app->get('/order', function($request) {
	$dao = new Dao("Order");
	echo $dao->showAll();
});

$app->get('/order/{id}', function($request) {
	$oid = $request->getAttribute('id');
	$dao = new Dao("Order");
	echo $dao->findby('orderlist','ID, MID, MENU_NAME, AMOUNT','OID',$oid);
});

$app->post('/add_order', function($request) {
	$dao = new Dao("Order");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	return $dao->addData($data);
});

$app->post('/add_orderlist', function($request) {
	$dao = new Dao("Orderlist");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$data = $request->getParsedBody();
	$mid = $data["MID"];
	$amount = $data["AMOUNT"];
	$pop = json_decode($dao->findby('menu','POPULARITY','ID',$mid));
	$new_pop = (int)$pop[0]->POPULARITY + (int)$amount;
	$dao->updatePopularity($mid, $new_pop);
	return $dao->addData($data);
});

$app->put('/update_order', function($request) {
	$dao = new Dao("Order");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$data = $request->getParsedBody();
	$exist = $dao->findby('orders','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_order/{id}', function($request) {
	$dao = new Dao("Order");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getAttribute('id');
	$exist = $dao->findby('orders','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

$app->delete('/delete_orderlist/{id}', function($request) {
	$dao = new Dao("Orderlist");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getAttribute('id');
	$exist = $dao->findby('orderlist','*','ID',$id);
	if($exist == "empty"){
		return "404: Item Not Found";
	}else {
		$data = json_decode($exist);
		$mid = $data[0]->MID;
		$amount = $data[0]->AMOUNT;
		$pop = json_decode($dao->findby('menu','POPULARITY','ID',$mid));
		$new_pop = (int)$pop[0]->POPULARITY - (int)$amount;
		if($new_pop < 0){$new_pop = 0;}
		$dao->updatePopularity($mid, $new_pop);
		return $dao->deleteby($id);
	}
});

?>
