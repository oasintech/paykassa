<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\InvalidResponseException;

class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws InvalidRequestException
     * @throws InvalidResponseException
     */
    public function getData()
    {
        $theirHash = (string)$this->httpRequest->request->get('private_hash');
       // $ourHash = $this->createResponseHash($this->httpRequest->request->all());

        if (!$theirHash) {
            throw new InvalidResponseException("Callback hash does not match expected value");
        }

        return $this->httpRequest->request->all();
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * @param $parameters
     * @return string
     * @throws InvalidRequestException
     */
    public function createResponseHash($parameters)
    {
        $this->validate('sci_key');

        return hash('sha256', implode(':', [
            $parameters['data'],
            $parameters['epc_order_id'],
            $parameters['epc_created_at'],
            $parameters['epc_amount'],
            $parameters['epc_currency_code'],
            $parameters['epc_dst_account'],
            $parameters['epc_src_account'],
            $parameters['epc_batch'],
            $this->getSCiKey(),
        ]));
    }
}
