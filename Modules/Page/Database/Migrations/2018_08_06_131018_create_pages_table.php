<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('pages title');
            $table->string('slug')->comment('pages slug');
            $table->string('tags')->nullable()->comment('pages tags');
            $table->string('image')->nullable()->default('image.jpg')->comment('pages image');
            $table->string('type')->comment('pages type');
            $table->string('template')->default('Default Template')->comment('pages template');
            $table->text('excerpt')->nullable()->comment('pages excerpt');
            $table->text('content')->nullable()->comment('pages content');
            $table->enum('status', ['published','unpublished'])->default('unpublished')->comment('pages status');
            $table->boolean('is_commentable')->default('1')->comment('pages is_commentable');
            $table->dateTime('published_at')->nullable()->comment('pages posts');
            $table->Integer('last_updated_by')->nullable()->unsigned()->index()->comment('pages last_updated_by');
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
        Schema::dropIfExists('pages');
    }
}
