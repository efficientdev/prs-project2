<?php

namespace App\Services;

use Yabacon\Paystack as PaystackSDK; 
 
class PaystackService
{
    protected $paystack;

    public function __construct()
    {
        $this->paystack = new PaystackSDK(env('PAYSTACK_SECRET_KEY'));//
    }
 
    public function transaction()
    {
        return new PaystackTransactionWrapper($this->paystack);
    } 

    public function initializeTransaction(array $data)
    {
        return $this->paystack->transaction->initialize($data);
    }

    // Add other methods as needed (verify, charge, etc.)
}
