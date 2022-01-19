<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class RefundResponse extends AbstractResponse
{
    protected $message;
    protected $success;

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
        if (isset($this->data->data->txid) && !empty($this->data->data->txid)) {
            return $this->data->data->txid;
        }

        if (isset($this->data->data->transaction) && !empty($this->data->data->transaction)) {
            return $this->data->data->transaction;
        }

        return NULL;
    }
}
