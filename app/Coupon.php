<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Coupon extends Model
{
    protected $table = 'coupons';

    public function compaign()
    {
        return $this->belongsTo('App\Compaign', 'compaign_id');
    }

    public function scopeAvailable($query)
    {
        return $query
        ->whereDate('starts_at', '<=', $this->getCurrentDate())
        ->whereDate('expires_at', '>=', $this->getCurrentDate())
        ->whereColumn('uses','<', 'max_uses');
    }

    public function scopePriority( $query )
    {
        return $query->addSelect(DB::raw('`max_uses` - `uses` AS  available'))->orderBy('available', 'desc')->orderByRaw('RAND()');
    }

    private function getCurrentDate()
    {
        return Carbon::now()->format('Y-m-d');
    }

    public static function totoalAvailable()
    {
        return self::sum(DB::raw('max_uses + uses'));
    }
}
