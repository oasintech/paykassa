<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class PurchaseRequest extends AbstractRequest
{
    /**
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        // Validate required parameters before return data
        $this->validate('merchant_id', 'passphrase', 'currency', 'amount');

        $data['func'] = "sci_create_order";
        $data['sci_id'] = $this->getMerchantID();
        $data['sci_key'] = $this->getPassphrase();
        $data['amount'] = $this->getAmount();
        $data['currency'] = $this->getCurrency(); // USD, EUR or OAU
        $data['order_id'] = $this->getTransactionId();
        $data['system'] = $this->getSystem();
        $data['phone'] = FALSE;
        $data['comment'] = $this->getDescription();
        $data['paid_commission'] = 'client';
        $data['test	'] = FALSE;


      //  $data['epc_status_url'] = $this->getNotifyUrl();
     //   $data['epc_success_url'] = $this->getReturnUrl();
      //  $data['epc_cancel_url'] = $this->getCancelUrl();
      //  $data['epc_descr'] = $this->getDescription();


        $sign = [
            $data['epc_merchant_id'],
            $data['epc_amount'],
            $data['epc_currency_code'],
            $data['epc_order_id'],
            $this->getPassphrase() // merchant password
        ];

        # get epc_sign hash
        $sign = hash('sha256', implode(':', $sign));


        $data['epc_sign'] = $sign;

        return $data;
    }

    public function sendData($data)
    {
        return new PurchaseResponse($this, $data, $this->getEndpoint());
    }
}
