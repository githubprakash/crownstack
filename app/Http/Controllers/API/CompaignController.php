<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Compaign;
use App\Services\CompaignService;
use DB;
use App\Coupon;
use App\Http\Requests\StoreCustomer;
use App\Http\Resources\Customer as CustomerResource;

class CompaignController extends Controller
{
    private $compaign;

    private $service;

    public function __construct()
    {
        $this->compaign = Compaign::active()->first();

        $this->service = new CompaignService();
    }

    public function register(StoreCustomer $request)
    {
   
        try {

            return DB::transaction(function () use($request) {

                $coupon = $this->compaign->coupons()->select('*')->available()->priority()->lockForUpdate()->first();
                
                if( Coupon::totoalAvailable() == 1 ) {

                    return json(['error' => 'All discount values have already been given, no more discount values left'], 200);
                }

                return new CustomerResource(
                    
                    $this->service->registerCustomerWithCoupon(
                        $request->all(),
                        $coupon
                    )
                );
                
         });
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
       
    }

}
