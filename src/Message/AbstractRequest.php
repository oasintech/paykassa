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

    public function getPassphrase()
    {
        return $this->getParameter('passphrase');
    }

    public function setPassphrase($value)
    {
        return $this->setParameter('passphrase', $value);
    }

    public function getAccount()
    {
        return $this->getParameter('account');
    }

    public function setAccount($value)
    {
        return $this->setParameter('account', $value);
    }

    public function getMerchantID()
    {
        return $this->getParameter('merchant_id');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchant_id', $value);
    }

    public function getAccountName()
    {
        return $this->getParameter('accountName');
    }

    public function setAccountName($value)
    {
        return $this->setParameter('accountName', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getDescriptionNoChange()
    {
        return $this->getParameter('descriptionNoChange');
    }

    public function setDescriptionNoChange($value)
    {
        return $this->setParameter('descriptionNoChange', $value);
    }

    public function getBaggageFields()
    {
        return $this->getParameter('baggageFields');
    }

    public function setBaggageFields($value)
    {
        return $this->setParameter('baggageFields', $value);
    }

    public function getAvailablePaymentMethods()
    {
        return $this->getParameter('availablePaymentMethods');
    }

    public function setAvailablePaymentMethods($value)
    {
        return $this->setParameter('availablePaymentMethods', $value);
    }

    public function getAccountId()
    {
        return $this->getParameter('accountId');
    }

    public function setAccountId($value)
    {
        return $this->setParameter('accountId', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getPayeeAccount()
    {
        return $this->getParameter('payeeAccount');
    }

    public function setPayeeAccount($value)
    {
        return $this->setParameter('payeeAccount', $value);
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
