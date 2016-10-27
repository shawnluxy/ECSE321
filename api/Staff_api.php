<?php

$app->get('/staff', function($request) {
	$dao = new Dao("Staff");
	echo $dao->showAll();
});



?>