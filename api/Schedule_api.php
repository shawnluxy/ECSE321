<?php

$app->get('/schedule', function($request) {
	$dao = new Dao();
	echo $dao->showAll('schedule','ID');
});

$app->get('/schedule/{id}', function($request) {
	$uid = $request->getAttribute('id');
	$dao = new Dao();
	echo $dao->findby('schedule','START_TIME, END_TIME','UID',$uid);
});

?>