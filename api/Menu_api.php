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

?>