<?php

namespace Omnipay\Paykassa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class RefundResponse extends AbstractResponse
{
    protected $message;
    protected $success;

    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
        $this->success = false;
        $this->parseResponse();
    }

    public function isSuccessful()
    {
        return $this->success;
    }

    public function getMessage()
    {
        return $this->message;
    }

    private function parseResponse()
    {
        $data = json_decode($this->data);

        if (!isset($data->batch) && isset($data->error)) {
            $this->message = $data->error;
            return $this->success = false;
        }

        $this->message = $data;

        return $this->success = true;
    }

    public function getBatch()
    {
        return $this->message->batch;
    }
}
