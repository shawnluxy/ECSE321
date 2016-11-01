<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../dao/Dao.php';

$app = new \Slim\App;
require_once '../api/Food_api.php';
require_once '../api/Equipment_api.php';
require_once '../api/Menu_api.php';
require_once '../api/Order_api.php';
require_once '../api/Schedule_api.php';
require_once '../api/Staff_api.php';

$app->run();
