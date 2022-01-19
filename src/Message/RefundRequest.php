<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use GuzzleHttp\Exception\BadResponseException;

class RefundRequest extends AbstractRequest
{
    protected $endpoint = 'https://paykassa.app/api/0.5/index.php';

    /**
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('func', 'api_id', 'api_key', 'system');

        $data['func'] = $this->getFunc();
        $data['shop'] = $this->getSciId();
        $data['api_id'] = $this->getAPiId();
        $data['api_key'] = $this->getApiKey();
        $data['currency'] = $this->getCurrency();
        $data['number'] = $this->getAccount();
        $data['amount'] = $this->getAmount();
        $data['system'] = $this->getSystem();
        $data['paid_commission'] = $this->getCommision() ?? 'shop';

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
            $response = $this->httpClient->request('POST', $this->endpoint, $this->getHeaders(), http_build_query($data));
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $result = json_decode($response->getBody()->getContents());

        return new RefundResponse($this, $result);
    }
}
