<?php

class ServicesTest extends \PHPUnit\Framework\TestCase
{
    public function testInfo()
    {

        $client = new GuzzleHttp\Client();
        $responseData = $client->request('POST', 'http://localhost/tradeapi/api/trade/info', [
            'headers'        =>
                [
                    'API-ID' => 'bd443f00-092c-4436-92a4-a704ef679e24',
                    'API-SIGN' => 'f133d2e7a960a3db86052be6d4f7699313e9416bce557868e7ad0f026c67c9ca'
                ],
            'form_params' =>
                [

                ],
            'decode_content' => false
        ]);
        $this->assertEquals(200, $responseData->getStatusCode(), 'Malformed email should return 400 error');

    }

    public function testAccount()
    {

        $client = new GuzzleHttp\Client();
        $responseData = $client->request('POST', 'http://localhost/tradeapi/api/trade/account', [
            'headers'        =>
                [
                    'API-ID' => 'bd443f00-092c-4436-92a4-a704ef679e24',
                    'API-SIGN' => 'f133d2e7a960a3db86052be6d4f7699313e9416bce557868e7ad0f026c67c9ca'
                ],
            'form_params' =>
                [

                ],
            'decode_content' => false
        ]);
        $this->assertEquals(200, $responseData->getStatusCode(), 'Worked Ok');

    }


    public function testOrders()
    {

        $client = new GuzzleHttp\Client();
        $responseData = $client->request('POST', 'http://localhost/tradeapi/api/trade/orders', [
            'headers'        =>
                [
                    'API-ID' => 'bd443f00-092c-4436-92a4-a704ef679e24',
                    'API-SIGN' => 'f133d2e7a960a3db86052be6d4f7699313e9416bce557868e7ad0f026c67c9ca'
                ],
            'form_params' =>
                [
                        "pair" => "BTC_USD,BTC_RUB"
                ],
            'decode_content' => false
        ]);
        $this->assertEquals(200, $responseData->getStatusCode(), 'Worked Ok');

    }

    public function testOrderStatus()
    {

        $client = new GuzzleHttp\Client();
        $responseData = $client->request('POST', 'http://localhost/tradeapi/api/trade/order_status', [
            'headers'        =>
                [
                    'API-ID' => 'bd443f00-092c-4436-92a4-a704ef679e24',
                    'API-SIGN' => 'f133d2e7a960a3db86052be6d4f7699313e9416bce557868e7ad0f026c67c9ca'
                ],
            'form_params' =>
                [
                    "order_id" => "37054293",
                    "ts" => 1644493185157
                ],
            'decode_content' => false
        ]);
        $this->assertEquals(200, $responseData->getStatusCode(), 'Worked Ok');

    }

    public function testOrderCreate()
    {

        $client = new GuzzleHttp\Client();
        $responseData = $client->request('POST', 'http://localhost/tradeapi/api/trade/order_create', [
            'headers'        =>
                [
                    'API-ID' => 'bd443f00-092c-4436-92a4-a704ef679e24',
                    'API-SIGN' => 'f133d2e7a960a3db86052be6d4f7699313e9416bce557868e7ad0f026c67c9ca'
                ],
            'form_params' =>
                [
                    "pair" => "TRX_USD",
                    "type" => "market",
                    "type" => "market",
                    "action" => "buy",
                    "amount" => "10",
                    "ts" => 1644489441948
                ],
            'decode_content' => false
        ]);
        $this->assertEquals(200, $responseData->getStatusCode(), 'Worked Ok');

    }

    public function testMyOrders()
    {

        $client = new GuzzleHttp\Client();
        $responseData = $client->request('POST', 'http://localhost/tradeapi/api/trade/my_orders', [
            'headers'        =>
                [
                    'API-ID' => 'bd443f00-092c-4436-92a4-a704ef679e24',
                    'API-SIGN' => 'f133d2e7a960a3db86052be6d4f7699313e9416bce557868e7ad0f026c67c9ca'
                ],
            'form_params' =>
                [
                    "ts" => 1644489441948
                ],
            'decode_content' => false
        ]);
        $this->assertEquals(200, $responseData->getStatusCode(), 'Worked Ok');

    }
}