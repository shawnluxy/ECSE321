<?php

$app->get('/staff', function($request) {
	$dao = new Dao();
	echo $dao->showAll('staff','NAME');
});



?>