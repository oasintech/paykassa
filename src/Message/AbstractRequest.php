<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;

abstract class AbstractRequest extends OmnipayRequest
{
    /**
     * Sandbox Endpoint URL
     *
     * @var string URL
     */
    protected $testEndpoint = 'https://paykassa.app/sci/0.4/index.php';

    /**
     * Live Endpoint URL
     *
     * @var string URL
     */
    protected $liveEndpoint = 'https://paykassa.app/sci/0.4/index.php';

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }


    public function getFunc()
    {
        return $this->getParameter('func');
    }

    public function setFunc($value)
    {
        return $this->setParameter('func', $value);
    }

    public function setSciId($value)
    {
        return $this->setParameter('sci_id', $value);
    }

    public function getSciId()
    {
        return $this->getParameter('sci_id');
    }


    public function setSCiKey($value)
    {
        return $this->setParameter('sci_key', $value);
    }


    public function getSCiKey()
    {
        return $this->getParameter('sci_key');
    }


    public function getSystem()
    {
        return $this->getParameter('system');
    }

    public function setSystem($value)
    {
        return $this->setParameter('system', $value);
    }




    public function getCommision()
    {
        return $this->getParameter('commission');
    }

    public function setCommision($value)
    {
        return $this->setParameter('commission', $value);
    }


    public function getPrivateHash()
    {
        return $this->getParameter('private_hash');
    }

    public function setPrivateHash($value)
    {
        return $this->setParameter('private_hash', $value);
    }

    public function getComment()
    {
        return $this->getParameter('comment');
    }

    public function setComment($value)
    {
        return $this->setParameter('comment', $value);
    }

    public function getPaymentId()
    {
        return $this->getParameter('paymentId');
    }

    public function setPaymentId($value)
    {
        return $this->setParameter('paymentId', $value);
    }
}
