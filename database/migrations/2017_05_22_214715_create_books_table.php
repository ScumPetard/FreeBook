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
            $table->string('name')->comment('书籍名称');
            $table->string('preview')->comment('封面图片');
            $table->string('description')->comment('描述');
            $table->integer('download_count')->default(0)->comment('下载次数');
            $table->integer('read_count')->default(0)->comment('阅读次数');
            $table->integer('favorite_count')->default(0)->comment('收藏次数');
            $table->integer('enable')->default(1)->comment('是否开启,默认开启 1 => 开启 0 => 关闭');
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
