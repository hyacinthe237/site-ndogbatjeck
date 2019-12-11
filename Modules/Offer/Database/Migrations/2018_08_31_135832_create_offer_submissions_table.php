<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('offer_id')->unsigned()->index()->nullable();
            $table->string('code');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->boolean('is_company')->default('0');
            $table->text('why_boukarou')->nullable();
            $table->text('background')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('offer_submissions');
    }
}
