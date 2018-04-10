<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            /* Required on Sign Up */
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            
            /* Can Give Later */
            $table->text('info')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('user_type')->default(0);
            
            $table->tinyInteger('comment_enabled')->default(0); 
            $table->tinyInteger('newsletter_enabled')->default(1); 
            
            $table->tinyInteger('account_status')->default(1);  //1 Active, 2 Closed, 3 Banned
            
            $table->rememberToken();
            $table->timestamps();
            
            $table->integer('user_balance')->default(0);
        });
        
        
        DB::table('users')->insert(
                array(
                    'id' => 0,
                    'name' => 'Administrator',
                    'email' => 'admin@ibikri.com',                    
                    'password' => md5('root1234'),
                    'created_at' => date('Y-m-d 01:10:11')
                )
        );       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
