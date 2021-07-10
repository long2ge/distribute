<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $dbConnections = config('database.connections.article.connection');
        $tableNames = 'articles';
        Schema::connection($dbConnections)->create($tableNames, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('标题');
            $table->text('content')->nullable()->comment('内容');
            $table->integer('creator_id')->default(0)->comment('创建者id');
            $table->tinyInteger('enable')->default(1)->comment('是否展示 1 展示，0不展示');
            $table->integer('type')->comment('文章类型，1 文章，2 企业介绍，3服务介绍, 4 价格介绍');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $dbConnections = config('database.connections.article.connection');
        $tableNames = 'articles';
        Schema::connection($dbConnections)->dropIfExists($tableNames);
    }
}
