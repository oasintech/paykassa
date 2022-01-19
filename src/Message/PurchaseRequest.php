<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use GuzzleHttp\Exception\BadResponseException;

class PurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        // Validate required parameters before return data
        $this->validate('func', 'sci_key', 'sci_id', 'currency', 'amount');

     

        $data['func'] = $this->getFunc(); // "sci_create_order";
        $data['sci_id'] = $this->getSciId();
        $data['sci_key'] = $this->getSCiKey();
        $data['amount'] = $this->getAmount();
        $data['currency'] = $this->getCurrency(); // USD, EUR or OAU
        $data['order_id'] = $this->getTransactionId();
        $data['system'] = $this->getSystem();
        $data['phone'] = FALSE;
        $data['comment'] = $this->getComment();
        $data['paid_commission'] = $this->getCommision() ?? 'shop';
        $data['test'] = FALSE;


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
            $response = $this->httpClient->request('POST', $this->getEndpoint(), $this->getHeaders(), http_build_query($data));
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $result = json_decode($response->getBody()->getContents(), true);

        return new PurchaseResponse($this, $result);
    }
}
