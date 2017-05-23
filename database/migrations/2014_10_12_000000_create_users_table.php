<?php

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
            $table->string('avatar')->nullable()->comment('用户头像');
            $table->string('name')->comment('用户昵称');
            $table->string('email')->unique()->comment('用户邮箱');
            $table->string('password')->comment('用户密码');
            $table->integer('enable')->default(1)->comment('是否启用,默认启用');
            $table->rememberToken()->comment('找回密码Token');
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
        Schema::drop('users');
    }
}
