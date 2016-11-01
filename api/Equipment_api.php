<?php

$app->get('/equipment', function($request) {
	$dao = new Dao("Equipment");
	echo $dao->showAll();
});

$app->post('/add_equipment', function($request) {
	$dao = new Dao("Equipment");
	$header = $request->getHeaders();
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$name = $request->getParsedBody()['NAME'];
	$quantity = $request->getParsedBody()['QUANTITY'];
	$price = $request->getParsedBody()['PRICE'];
	$data = array("NAME"=>$name, "QUANTITY"=>$quantity, "PRICE"=>$price);
	return $dao->addData($data);
});

$app->put('/update_equipment', function($request) {
	$dao = new Dao("Equipment");
	$header = $request->getHeaders();
	if($dao->getAuth($header) != 1){
		return "403: No Permission";
	}
	$rname = $request->getParsedBody()['RAW_NAME']; 
	$name = $request->getParsedBody()['NAME'];
	$quantity = $request->getParsedBody()['QUANTITY'];
	$price = $request->getParsedBody()['PRICE'];
	$data = array("RAW_NAME"=>$rname, "NAME"=>$name, "QUANTITY"=>$quantity, "PRICE"=>$price);
	$exist = $dao->findby('equipment','*','NAME',$rname);
	if($exist == "empty"){
		return "404: Not Found";
	}else {
		return $dao->updateData($data);
	}
});

?>
