<?php

namespace ApiChef\PayHere\View\Components;

use ApiChef\PayHere\Payment;
use Illuminate\View\Component;

class Fields extends Component
{
    public Payment $payment;

    public string $merchantId;

    public string $itemDescription;

    public string $successUrl;

    public string $cancelUrl;

    public function __construct(Payment $payment, string $itemDescription, string $successUrl, string $cancelUrl)
    {
        $this->payment = $payment;
        $this->merchantId = config('pay-here.merchant_credentials.id');
        $this->itemDescription = $itemDescription;
        $this->successUrl = $successUrl;
        $this->cancelUrl = $cancelUrl;
    }

    public function render()
    {
        return view('pay-here::fields');
    }
}