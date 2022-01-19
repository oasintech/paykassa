<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class RefundResponse extends AbstractResponse
{
    protected $message;
    protected $success;

    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
        // $this->parseResponse();
    }

    public function isSuccessful()
    {
        return !$this->data->error;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMessage()
    {
        return $this->data->data;
    }

    public function getAmount()
    {
        return isset($this->data->data->amount) ? $this->data->data->amount : null;
    }

    public function getBatch()
    {
        return isset($this->data->data->txid) ? $this->data->data->txid     : null;
    }
}
