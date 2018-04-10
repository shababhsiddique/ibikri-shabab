<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechargeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_requests', function (Blueprint $table) {
            $table->increments('recharge_request_id');
            $table->integer('user_id');
            $table->string('bkash_code');
            $table->float('recharge_amount');
            $table->tinyInteger('request_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recharge_requests');
    }
}
