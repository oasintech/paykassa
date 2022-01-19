<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\InvalidResponseException;
use GuzzleHttp\Exception\BadResponseException;

class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws InvalidRequestException
     * @throws InvalidResponseException
     */
    public function getData()
    {
        $theirHash = (string) $this->httpRequest->request->get('private_hash');

        if (empty($theirHash)) {
            throw new InvalidResponseException("Callback hash is expected value");
        }

        $this->validate('func', 'sci_key', 'sci_id', 'private_hash');

        $data['func'] = $this->getFunc();
        $data['sci_id'] = $this->getSciId();
        $data['sci_key'] = $this->getSCiKey();
        $data['private_hash'] = $this->getPrivateHash();

        return $data;
    }


    protected function getHeaders()
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
    }

    public function sendData($data)
    {

        try {
            $response = $this->httpClient->request(
                'POST',
                $this->getEndpoint(),
                $this->getHeaders(),
                http_build_query($data)
            );
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $result = json_decode($response->getBody()->getContents());

        return $this->response = new CompletePurchaseResponse($this, $result);
    }
}
