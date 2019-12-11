<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('posts code');
            $table->Integer('category_id')->unsigned()->index()->nullable()->comment('posts category_id');
            $table->string('title')->comment('posts title');
            $table->string('slug')->comment('posts slug');
            $table->string('tags')->nullable()->comment('posts tags');
            $table->string('image')->nullable()->default('image.jpg')->comment('posts image');
            $table->string('template')->default('Default Template')->comment('posts template');
            $table->text('excerpt')->nullable()->comment('posts excerpt');
            $table->text('content')->nullable()->comment('posts content');
            $table->enum('status', ['published','unpublished'])->default('unpublished')->comment('posts status');
            $table->boolean('is_commentable')->default('1')->comment('posts is_commentable');
            $table->boolean('is_anchor')->default('1')->comment('posts is_anchor');
            $table->dateTime('published_at')->nullable()->comment('posts posts');
            $table->Integer('last_updated_by')->nullable()->unsigned()->index()->comment('posts last_updated_by');
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
        Schema::dropIfExists('posts');
    }
}
