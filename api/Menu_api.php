<?php

$app->get('/menu', function($request) {
	$dao = new Dao();
	echo $dao->showAll('menu','NAME');
});

$app->get('/menu/{id}', function($request) {
	$mid = $request->getAttribute('id');
	$dao = new Dao();
	echo $dao->findby('recipe','FOOD_NAME, AMOUNT','MID',$mid);
});

?>