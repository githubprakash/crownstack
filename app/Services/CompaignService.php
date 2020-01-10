<?php

namespace App\Services;
use App\Coupon;
use App\Customer;
use App\Compaign;

class CompaignService 
{
    public function registerCustomerWithCoupon($customer, $coupon)
    {
       return (new Customer())
       ->createCustomer($customer)
       ->assignCoupon($coupon);

    }
}