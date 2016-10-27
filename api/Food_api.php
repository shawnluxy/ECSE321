<?php

$app->get('/food', function($request) {
	$dao = new Dao("Food");
	echo $dao->showAll();
});



?>
