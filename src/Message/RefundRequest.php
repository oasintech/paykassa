<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class RefundRequest extends AbstractRequest
{
    protected $endpoint = 'https://api.Paykassa.com/v1/transfer';

    /**
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('accountId', 'payeeAccount', 'amount', 'paymentId', 'description');

        $data['api_id'] = $this->getAccountId();
        $data['api_secret'] = $this->getPassword();
        // $data['src_account'] = $this->getAccount();
        $data['account'] = $this->getPayeeAccount();
        $data['currency'] = 'usd';
        $data['amount'] = $this->getAmount();
        $data['payment_id'] = ($this->getPaymentId());
        $data['descr'] = ($this->getDescription());

        return $data;
    }

    public function sendData($data)
    {


        //  dd($data);
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->endpoint,
            [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            http_build_query($data)
        );

        return new RefundResponse($this, $httpResponse->getBody()->getContents());
    }
}
