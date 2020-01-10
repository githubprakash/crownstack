<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::table('coupons')->delete();

        DB::table('compaigns')->delete();

        DB::table('compaigns')->insert($this->getCompaign());

        $compaign = DB::table('compaigns')->first();

        DB::table('coupons')->insert($this->getCoupons($compaign->id));

    }

    private function getCompaign()
    {
        return  array(
            'name' => 'Marketing Compaign 1',
            'slug' => 'marketing-compaign-1',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        );
    }

    private function getCoupons($id)
    {
        return [

            [
               'compaign_id' => $id,
               'code' => 'FIXED-50',
                'uses' => 0,
                'max_uses' => 15,
                'type' => 'fixed',
                'discount_amount' => 50,
                'starts_at' => '2019-12-01',
                'expires_at' => '2020-12-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-100',
                 'uses' => 0,
                 'max_uses' => 12,
                 'type' => 'fixed',
                 'discount_amount' => 100,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-200',
                 'uses' => 0,
                 'max_uses' => 10,
                 'type' => 'fixed',
                 'discount_amount' => 200,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-500',
                 'uses' => 0,
                 'max_uses' => 8,
                 'type' => 'fixed',
                 'discount_amount' => 500,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-1000',
                 'uses' => 0,
                 'max_uses' => 5,
                 'type' => 'fixed',
                 'discount_amount' => 1000,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-2000',
                 'uses' => 0,
                 'max_uses' => 4,
                 'type' => 'fixed',
                 'discount_amount' => 2000,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-5000',
                 'uses' => 0,
                 'max_uses' => 2,
                 'type' => 'fixed',
                 'discount_amount' => 5000,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
            ],
            [
                'compaign_id' => $id,
                'code' => 'FIXED-10000',
                 'uses' => 0,
                 'max_uses' => 1,
                 'type' => 'fixed',
                 'discount_amount' => 10000,
                 'starts_at' => '2019-12-01',
                 'expires_at' => '2020-12-31',
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
             ]
        ];
    }
}
