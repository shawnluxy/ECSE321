<?php

$app->get('/order', function($request) {
	$dao = new Dao();
	echo $dao->showAll('orders','TIME');
});

$app->get('/order/{id}', function($request) {
	$oid = $request->getAttribute('id');
	$dao = new Dao();
	echo $dao->findby('orderlist','MID, MENU_NAME, AMOUNT','OID',$oid);
});



?>