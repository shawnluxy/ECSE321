<?php

$app->get('/equipment', function($request) {
	$dao = new Dao();
	echo $dao->showAll('equipment','NAME');
});

?>
