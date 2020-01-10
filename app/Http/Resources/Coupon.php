<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Coupon extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'code' => $this->code,
            'discount_amount' => $this->discount_amount,
            'valid_from' => $this->starts_at,
            'valid_to' => $this->expires_at,
            'discription' => $this->description
        ];
    }
}
