<?php
namespace Serious\Tradeapi\Services;

/**
 * @method Info()
 */
class TradeServices extends PayeerServices
{
    /**
     * Services constructor.
     * @param $
     */
    private $id;
    private $key;
    private $body;
    private $action;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setPrivateKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function call()
    {

        if(method_exists(self::class, $this->action)){
            $this->{$this->action}($this->body);
        } else{
            $strErrorDesc = 'Action not supported';
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($strErrorDesc);
        }

    }

    public function getError()
    {
        return $this->arError;
    }

    public function info(): string
    {
        $res = $this->request(
            array(
                'method' => 'info',
            ),
            $this->arParams
        );

        return $res;
    }

    public function orders(string $pair = 'BTC_USDT'): string
    {
        $res = $this->request(
            array(
                'method' => 'orders',
                'post' => array(
                    'pair' => $pair,
            ),
            $this->arParams
        ));

        return $res['pairs'];
    }

    public function account(): string
    {
        $res = $this->request(
            array(
            'method' => 'account',
            ),
            $this->arParams
        );

        return $res['balances'];
    }

    public function orderCreate($req = array()): string
    {

        $res = $this->request(
            array(
                'method' => 'order_create',
                'post' => $req,
            ),
            $this->arParams
        );

        return $res;
    }

    public function orderStatus($req = array()): string
    {
        $res = $this->request(
            array(
                'method' => 'order_status',
                'post' => $req,
            ),
            $this->arParams
        );

        return $res['order'];
    }

    public function myOrders($req = array()): string
    {
        $res = $this->request(
            array(
                'method' => 'my_orders',
                'post' => $req,
            ),
            $this->arParams
        );

        return $res['items'];
    }
}
?>