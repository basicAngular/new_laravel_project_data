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
            $table->integer('role_id');
            $table->string('name');
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('mobile');
            $table->string('contact')->nullable();
            $table->string('fax')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->tinyInteger('status')->comment = "0=>inactive, 1=>active ";;
            $table->tinyInteger('is_deleted')->comment = "0=>not deleted, 1=>deleted ";;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
