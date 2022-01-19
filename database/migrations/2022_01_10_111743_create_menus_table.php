<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label',128)->comment('菜单名称');
            $table->integer('pid')->unsigned()->comment('父id');
            $table->integer('sort')->nullable()->default(0)->comment('排序');
            $table->tinyInteger('platform')->comment('平台 1: 后台 2: 前台');
            $table->string('icon','255')->nullable()->comment('图标');
            $table->string('route')->nullable()->comment('路由');
            $table->tinyInteger('status')->comment('状态 1: 启用 0:禁用');
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
        Schema::dropIfExists('menus');
    }
}
