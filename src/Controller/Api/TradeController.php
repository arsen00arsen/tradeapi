<?php

namespace Serious\Tradeapi\Controller\Api;

use Serious\Tradeapi\services\TradeServices;


class TradeController extends BaseController
{
    public function tradeAction($action)
    {

        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $headers=array();
        foreach (getallheaders() as $name => $value) {
            $headers[$name] = $value;
        }

        if(!isset($headers['API-ID']) || !isset($headers['API-SIGN'])) {
            $strErrorDesc = 'No ID AND KEY';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }

        if (strtoupper($requestMethod) == 'POST') {

            $payerService = (new TradeServices)
                ->setId($headers['API-ID'])
                ->setPrivateKey($headers['API-SIGN'])
                ->setBody(json_decode(file_get_contents("php://input"), true))
                ->setAction($action)
                ->call();

        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }

    }

}