<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_us', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('join_us code');
            $table->string('first_name')->comment('join_us first_name');
            $table->string('last_name')->comment('join_us last_name');
            $table->string('email')->comment('join_us email');
             $table->string('phone')->comment('join_us phone');
            $table->string('social_network')->comment('join_us social_network');
            $table->string('country')->comment('join_us country');
            $table->enum('search_type', ['Rejoindre le staff ?','Un stage chez nous','Un stage dans une des entités chez nous','Travailler en freelance'])->comment('join_us search_type');
            $table->text('more_details')->comment('join_us more_details');
            $table->text('why_boukarou')->comment('join_us why_boukarou');
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
        Schema::dropIfExists('join_us');
    }
}
