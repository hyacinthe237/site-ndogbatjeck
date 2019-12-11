<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('projects code');
            $table->Integer('theme_id')->unsigned()->index()->nullable()->comment('projects theme_id');
            $table->string('title')->comment('projects title');
            $table->string('slug')->comment('projects slug');
            $table->string('tags')->nullable()->comment('projects tags');
            $table->string('logo')->nullable()->default('image.jpg')->comment('projects logo');
            $table->text('excerpt')->nullable()->comment('projects excerpt');
            $table->text('idea')->comment('projectss content');
            $table->text('description')->nullable()->comment('projects description');
            $table->enum('published', ['published','unpublished'])->default('unpublished')->comment('projects status');
            $table->enum('status', ['en_cours','terminé','annulé'])->comment('projects status');
            $table->string('owner')->nullable()->comment('projects owner');
            $table->string('phone')->nullable()->comment('projects phone');
            $table->string('location')->nullable()->comment('projects location');
            $table->string('email')->nullable()->comment('projects email');
            $table->dateTime('published_at')->nullable()->comment('projects projects');
            $table->Integer('last_updated_by')->nullable()->unsigned()->index()->comment('projects last_updated_by');
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
        Schema::dropIfExists('projects');
    }
}
