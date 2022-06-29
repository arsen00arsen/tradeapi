<?php
namespace Serious\Tradeapi\Services;


class PayeerServices
{
    protected $arError = array();

    protected function request($req = array(), $header = array()):string
    {
        $msec = round(microtime(true) * 1000);
        $req['post']['ts'] = $msec;
        $post = json_encode($req['post']);
        $sign = hash_hmac('sha256', $req['method'].$post, $header['key']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://payeer.com/api/trade/".$req['method']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "API-ID: ".$header['id'],
            "API-SIGN: ".$sign
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        $arResponse = json_decode($response, true);

        if ($arResponse['success'] !== true)
        {
            $this->arError = $arResponse['error'];
            echo json_encode($arResponse);
            exit;
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($arResponse);
            exit;
        }
    }

}