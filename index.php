<?php
require 'vendor\Autoload.php';
use Serious\Tradeapi\Controller\Api\TradeController;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ((isset($uri[3]) && $uri[2] != 'api') || !isset($uri[3]) || !isset($uri[4])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$objFeedController = new TradeController();
$strMethodName = $uri[3] . 'Action';
$objFeedController->{$strMethodName}($uri[4]);
?>