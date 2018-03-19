<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            
            $table->increments('admin_id');
            
            $table->string('admin_name',100);
            $table->string('admin_username',100);
            $table->string('admin_password',50);
            $table->string('admin_privilage',10);
            
            $table->tinyInteger("account_status")->default(1);
            
            $table->timestamp('last_active')->nullable();
            
            
            $table->timestamps();
        });
        
        
        DB::table('admins')->insert(
                array(
                    'admin_name' => 'Root User',
                    'admin_username' => 'root',
                    'admin_privilage' => 'root',
                    'admin_password' => md5('root1234'),
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
        Schema::dropIfExists('admins');
    }
}
