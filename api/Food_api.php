<?php

$app->get('/food', function($request) {
	$dao = new Dao();
	echo $dao->showAll('food', 'NAME');
});


?>
