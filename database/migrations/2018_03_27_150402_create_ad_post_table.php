<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->integer('user_id');
            $table->integer('subcategory_id');
            $table->string('ad_type');
            $table->string('ad_title');
            $table->string('item_condition');            
            $table->float('item_price');
            $table->tinyInteger('price_negotiable')->default(0);
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('delivery')->nullable();
            $table->tinyInteger('status')->default(1); // 1 published, 2 unpublished
            $table->text('short_description',500);
            $table->text('long_description',5000);
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
