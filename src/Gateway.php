<?php

namespace Omnipay\Paykassa;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * Gateway Class
 * @method NotificationInterface acceptNotification(array $options = array())
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'Paykassa';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            //'sci_id'     => '',
            'sci_key'  => '',
        );
    }


    public function getFunc()
    {
        return $this->getParameter('func');
    }


    public function setFunc($value)
    {
        return $this->setParameter('func', $value);
    }


    public function setSCiKey($value)
    {
        return $this->setParameter('sci_key', $value);
    }


    public function getSCiKey()
    {
        return $this->getParameter('sci_key');
    }


    public function setSciId($value)
    {
        return $this->setParameter('sci_id', $value);
    }

    public function getSciId()
    {
        return $this->getParameter('sci_id');
    }


    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->getParameter('account');
    }

    /**
     * @param string $value
     * @return Gateway
     */
    public function setAccount($value)
    {
        return $this->setParameter('account', $value);
    }

    public function setApiId($value)
    {
        return $this->setParameter('api_id', $value);
    }

    public function getApiId()
    {
        return $this->getParameter('api_id');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('api_key', $value);
    }

    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }

    public function setSystem($value)
    {
        return $this->setParameter('system', $value);
    }

    public function getSystem()
    {
        return $this->getParameter('system');
    }

    public function getPrivateHash()
    {
        return $this->getParameter('private_hash');
    }

    public function setPrivateHash($value)
    {
        return $this->setParameter('private_hash', $value);
    }

    public function getPaymentId()
    {
        return $this->getParameter('paymentId');
    }

    public function setPaymentId($value)
    {
        return $this->setParameter('paymentId', $value);
    }


    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paykassa\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paykassa\Message\CompletePurchaseRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paykassa\Message\RefundRequest', $parameters);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
