<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    protected $table = 'compaigns';

    public function scopeActive($query)
    {
        return $query->whereStatus('1');
    }

    public function coupons()
    {
        return $this->hasMany('App\Coupon','compaign_id');
    }
}
