<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('post_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('post_categories code');
            $table->Integer('parent_id')->unsigned()->index()->nullable()->comment('post_categories parent_id');
            $table->string('name')->comment('post_categories name');
            $table->string('slug')->comment('post_categories slug');
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
        Schema::dropIfExists('post_categories');
    }
}
