<?php

namespace App\Services;
 
use Yabacon\Paystack as PaystackSDK;  

class PaystackTransactionWrapper
{
    protected $paystack;
    protected $lastResponse;

    public function __construct(PaystackSDK $paystack)
    {
        $this->paystack = $paystack;
    }

    public function initialize(array $data)
    {
        $this->lastResponse = $this->paystack->transaction->initialize($data);
        return $this;
    }

    public function verify(string $reference)
    {
        $this->lastResponse = $this->paystack->transaction->verify([
            'reference' => $reference,
        ]);
        return $this;
    }

    public function response()
    {
        return $this->lastResponse->data ?? null;
    }
}
