<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('activities code');
            $table->Integer('subject_id')->unsigned()->index()->nullable()->comment('activities category_id');
            $table->string('title')->comment('activities title');
            $table->string('slug')->comment('activities slug');
            $table->string('tags')->nullable()->comment('activities tags');
            $table->string('image')->nullable()->default('image.jpg')->comment('activities image');
            $table->string('location')->nullable()->comment('activities location');
            $table->text('excerpt')->nullable()->comment('activities excerpt');
            $table->text('description')->nullable()->comment('activities description');
            $table->enum('published', ['published','unpublished'])->default('unpublished')->comment('activities published');
            $table->boolean('is_commentable')->default('1')->comment('activities is_commentable');
            $table->boolean('is_anchor')->default('1')->comment('activities is_anchor');
            $table->boolean('is_frequent')->default('0')->comment('activities is_frequent');
            $table->dateTime('published_at')->nullable()->comment('activities published_at');
            $table->date('date_activity')->nullable()->comment('activities date_activity');
            $table->time('time_activity')->nullable()->comment('activities time_activity');
            $table->Integer('last_updated_by')->nullable()->unsigned()->index()->comment('activities last_updated_by');
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
        Schema::dropIfExists('activities');
    }
}
