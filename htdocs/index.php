<?php
use controller\RouteController;
use util\csv\CsvParser;
use util\common\CommonUtil;
use controller\CsvController;
use action\api\CsvFileParseAction;

session_start();

// ini_set('display_errors', "On");

require_once __DIR__ . '/../vendor/autoload.php';

if (! isset($_SESSION['ROUTE_MAPPING'])) {
    $_SESSION['ROUTE_MAPPING'] = $_SESSION['ROUTE_MAPPING'] ?? spyc_load_file(__DIR__ . '/../config/route.yml');
}

if (! isset($_SESSION['MESSAGE'])) {
    $_SESSION['MESSAGE'] = $_SESSION['MESSAGE'] ?? spyc_load_file(__DIR__ . '/../config/message.yml');
}

$controller = new RouteController();
$controller->controll();

// session_destroy();
