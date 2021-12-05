<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('创建人');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('副标题');
            $table->bigInteger('views')->nullable()->default(0)->comment('访问量');
            $table->integer('likes')->nullable()->default(0)->comment('点赞数');
            $table->integer('unlikes')->nullable()->default(0)->comment('不喜欢');
            $table->integer('collects')->nullable()->default(0)->comment('收藏人数');
            $table->text('body')->comment('文章内容');
            $table->tinyInteger('categories_id')->comment('文章分类');
            $table->integer('comments')->nullable(0)->default(0)->comment('评论数量');
            $table->integer('public_date')->nullable()->comment('设置文章发行时间');
            $table->tinyInteger('status')->comment('状态 1:启用 0:禁用');
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
        Schema::dropIfExists('articles');
    }
}
