<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->unsignedInteger('compaign_id')->nullable();
   
            
            $table->string('code')->nullable( );
                
            $table->text('description')->nullable( );
        
           
            $table->integer('uses')->unsigned( )->nullable( )->default(0);
        
            
            $table->integer('max_uses')->unsigned()->nullable( );
        
           
            $table->integer('max_uses_user')->unsigned( )->nullable( )->default(1);
        
           
            $table->enum('type', ['fixed', 'percentage']);
        
            $table->integer('discount_amount');
        
                        
            $table->date('starts_at');
        
            
            $table->date('expires_at');
        
            
            $table->timestamps();
        
            $table->foreign('compaign_id')->references('id')->on('compaigns')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
