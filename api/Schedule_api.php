<?php

$app->get('/schedule', function($request) {
	$dao = new Dao("Schedule");
	echo $dao->showAll();
});

$app->get('/schedule/{id}', function($request) {
	$uid = $request->getAttribute('id');
	$dao = new Dao("Schedule");
	echo $dao->findby('schedule','START_TIME, END_TIME','UID',$uid);
});

?>