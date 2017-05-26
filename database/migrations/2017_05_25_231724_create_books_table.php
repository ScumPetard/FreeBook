<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('书名');
            $table->string('preview')->comment('封面');
            $table->string('intro')->comment('简介');
            $table->integer('author_id')->references('id')->on('authors')->onDelete('cascade')->comment('作者id');
            $table->integer('click_count')->default(0)->comment('点击量');
            $table->integer('favorite_count')->default(0)->comment('关注数');
            $table->integer('praise_count')->default(0)->comment('赞数量');
            $table->integer('enable')->default(1)->comment('是否启用');
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
        Schema::drop('books');
    }
}
