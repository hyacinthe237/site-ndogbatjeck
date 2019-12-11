<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('body')->comment('comment body');
            $table->string('code')->unique('code')->comment('comment code');
            $table->integer('commentable_id')->unsigned()->comment('comment commentable_id');
            $table->string('commentable_type')->comment('comment commentable_type');
            $table->Integer('created_for_article')->unsigned()->index()->nullable()->comment('comment article');
            $table->Integer('created_for_page')->unsigned()->index()->nullable()->comment('comment page');
            $table->Integer('created_for_activite')->unsigned()->index()->nullable()->comment('comment page');
            $table->timestamps();
            $table->softDeletes();
        });;
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
