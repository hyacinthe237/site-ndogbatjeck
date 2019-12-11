<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('support code');
            $table->enum('person_type', ['morale','physique'])->default('physique')->comment('support person_type');
            $table->string('name')->comment('support name');
            $table->string('corporate_name')->nullable()->comment('support corporate_name');
            $table->string('field_of_activity')->nullable()->comment('support field_of_activity');
            $table->string('email')->comment('support email');
            $table->string('phone')->comment('support phone');
            $table->string('country')->comment('support country');
            $table->string('support_type')->comment('support country');
            $table->string('support_type_other')->nullable()->comment('support_type_other description');
            $table->string('sector_cible')->nullable()->comment('sector_cible description');
            $table->string('experience')->nullable()->comment('experience description');
            $table->string('attente')->comment('attente description');
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
        Schema::dropIfExists('supports');
    }
}
