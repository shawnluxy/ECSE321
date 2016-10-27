<?php

$app->get('/order', function($request) {
	$dao = new Dao("Order");
	echo $dao->showAll();
});

$app->get('/order/{id}', function($request) {
	$oid = $request->getAttribute('id');
	$dao = new Dao("Order");
	echo $dao->findby('orderlist','MID, MENU_NAME, AMOUNT','OID',$oid);
});



?>
