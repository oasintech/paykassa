<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class CompletePurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
        return $this->data['error'] == false;
    }

    public function isCancelled()
    {
        return !$this->data['error'];
    }

    public function isRedirect()
    {
        return false;
    }

    public function getRedirectUrl()
    {
        return null;
    }

    public function getRedirectMethod()
    {
        return null;
    }

    public function getRedirectData()
    {
        return null;
    }

    public function getTransactionId()
    {
        return isset($this->data['data']['order_id']) ? $this->data['order_id'] : null;
    }

    public function getAmount()
    {
        return isset($this->data['data']['amount']) ? $this->data['data']['amount'] : null;
    }

    public function getTransactionReference()
    {
        return isset($this->data['data']['hash']) and $this->data['data']['hash'] != 0 ? $this->data['data']['hash'] : null;
    }

    public function getCurrency()
    {
        return $this->data['data']['currency'];
    }

    public function getMessage()
    {
        return null;
    }
}
