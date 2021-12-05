<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('创建人');
            $table->integer('article_id')->comment('文章id');
            $table->string('body',255)->comment('评论内容');
            $table->integer('pid')->nullable()->comment('父id');
            $table->integer('likes')->nullable()->default(0)->comment('点赞数');
            $table->integer('unlikes')->nullable()->default(0)->comment('不喜欢');
            $table->tinyInteger('status')->comment('1: 启用 0:禁用');
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
        Schema::dropIfExists('comments');
    }
}
