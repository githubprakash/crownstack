<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function coupons()
    {
        return $this->belongsToMany('App\Coupon','coupon_customer','customer_id', 'coupon_id');
    }

    
    public function createCustomer($data)
    {
        $this->name = $data['name'];
        
        $this->email = $data['email'];
        
        $this->mobile = $data['mobile'];
        
        $this->save();

        return self::find($this->id);
    }

    public function assignCoupon($coupon)
    {
        $this->coupons()->save($coupon);

        $coupon->increment('uses');

        return self::find($this->id);
    }


}
