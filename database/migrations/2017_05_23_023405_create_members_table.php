<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('name')->comment('昵称');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->integer('enable')->default(1)->comment('是否启用,默认启用');
            $table->integer('praise_count')->default(0)->comment('用户赞的数量');
            $table->integer('is_confirmed')->default(0)->comment('用户是否激活账户 0 => 未激活 1 => 激活');
            $table->string('confirm_token')->nullable()->comment('注册Token');
            $table->string('reset_token')->nullable()->comment('找回密码Token');
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
        Schema::drop('members');
    }
}
