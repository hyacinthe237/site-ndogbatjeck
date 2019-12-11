<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('themes code');
            $table->Integer('parent_id')->unsigned()->index()->nullable()->comment('themes parent_id');
            $table->string('name')->comment('themes name');
            $table->string('slug')->comment('themes slug');
            $table->string('image')->nullable()->default('image-LeBoukarou-life-unit.png')->comment('themes image');
            $table->text('description')->nullable()->comment('themes description');
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
        Schema::dropIfExists('themes');
    }
}
