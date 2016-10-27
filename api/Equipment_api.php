<?php

$app->get('/equipment', function($request) {
	$dao = new Dao("Equipment");
	echo $dao->showAll();
});



?>
