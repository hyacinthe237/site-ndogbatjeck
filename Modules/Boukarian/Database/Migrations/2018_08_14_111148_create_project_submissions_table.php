<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('project_submission code');
            $table->string('firstname')->comment('project_submission firstname');
            $table->string('lastname')->nullable()->comment('project_submission lastname');
            $table->string('email')->comment('project_submission email');
            $table->string('phone')->comment('project_submission phone');
            $table->string('country')->nullable()->comment('project_submission country');
            $table->boolean('is_company')->default('0')->comment('project_submission is_company');
            $table->string('project_name')->comment('project_submission owner');
            $table->string('issue')->comment('project_submission issue');
            $table->string('why_issue')->comment('project_submission why_issue');
            $table->string('solution')->comment('project_submission solution');
            $table->string('existing_solution')->comment('project_submission existing_solution');
            $table->string('next_steps')->comment('project_submission next_steps');
            $table->string('why_boukarou')->comment('project_submission why_boukarou');
            $table->text('project_story')->comment('project_submission project_story');
            $table->enum('status', ['En attente','Approuve','Rejete'])->default('En attente')->comment('project_submission status');
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
        Schema::dropIfExists('project_submissions');
    }
}
