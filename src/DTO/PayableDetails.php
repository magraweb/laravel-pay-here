<?php

namespace ApiChef\PayHere\DTO;

use Carbon\Carbon;
use Illuminate\Support\Collection;

abstract class PayableDetails
{
    public $data;
    public $orderId;
    public $date;
    public $description;
    public $status;
    public $currency;
    public $amount;
    public $customer;
    public $amountDetail;
    public $paymentMethod;
    public $items;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->orderId = $this->data['order_id'];
        $this->date = Carbon::parse($this->data['date']);
        $this->description = $this->data['description'];
        $this->status = $this->data['status'];
        $this->currency = $this->data['currency'];
        $this->amount = $this->data['amount'];
        $this->customer = $this->data['customer'];
        $this->amountDetail = $this->data['amount_detail'];
        $this->paymentMethod = $this->data['payment_method'];
        $this->items = $this->data['items'];
    }

    public function getCustomer(): Customer
    {
        return new Customer($this->customer);
    }

    public function getPriceDetails(): PriceDetails
    {
        return new PriceDetails($this->amountDetail);
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return new PaymentMethod($this->paymentMethod);
    }

    public function getItems(): Collection
    {
        return collect($this->items)->map(function ($item) {
            return new Item($item);
        });
    }
}
