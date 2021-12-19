<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticleHistoryVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_history_version', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('编辑人');
            $table->integer('article_id')->comment('文章id');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('副标题');
            $table->text('body')->comment('文章内容');
            $table->text('add_body')->comment('添加内容');
            $table->text('delete_body')->comment('删除内容');
            $table->tinyInteger('type')->comment('1:新增; 2: 删除');
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
        Schema::dropIfExists('article_history_version');
    }
}
