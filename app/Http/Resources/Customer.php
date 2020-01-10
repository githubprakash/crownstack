<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'message' => 'Congratulation !! You won the coupon',
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'coupons' => Coupon::Collection($this->coupons)
        ];
    }
}
