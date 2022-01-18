<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class CompletePurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
        return $this->data['epc_batch'] != 0;
    }

    public function isCancelled()
    {
        return $this->data['epc_batch'] == 0;
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
        return isset($this->data['epc_order_id']) ? $this->data['epc_order_id'] : null;
    }

    public function getAmount()
    {
        return isset($this->data['epc_amount']) ? $this->data['epc_amount'] : null;
    }

    public function getTransactionReference()
    {
        return isset($this->data['epc_batch']) and $this->data['epc_batch'] != 0 ? $this->data['epc_batch'] : null;
    }

    public function getCurrency()
    {
        return $this->data['USD'];
    }

    public function getMessage()
    {
        return null;
    }
}
