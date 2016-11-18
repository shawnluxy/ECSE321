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
		return "404: Not Found";
	}else {
		return $dao->updateData($data);
	}
});

$app->delete('/delete_order', function($request) {
	$dao = new Dao("Order");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$exist = $dao->findby('orders','*','ID',$id);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

$app->delete('/delete_orderlist', function($request) {
	$dao = new Dao("Orderlist");
	$header = $request->getHeader('Authorization');
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$id = $request->getParsedBody()['ID'];
	$exist = $dao->findby('orderlist','*','ID',$id);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->deleteby($id);
	}
});

?>
