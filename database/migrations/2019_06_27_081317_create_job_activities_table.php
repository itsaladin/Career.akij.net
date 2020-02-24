<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');
            $table->float('expected_salary')->default(0);
            $table->boolean('is_salary_negotiable')->default(false);
            $table->text('cover_letter')->nullable();
            $table->boolean('use_profile_cv')->default(0);
            $table->string('cv')->nullable()->comment('File Link');
            $table->boolean('is_short_listed')->default(0);
            $table->boolean('is_final_listed')->default(0);
            $table->boolean('is_interviewed')->default(0);
            $table->boolean('is_emailed')->default(0);
            $table->boolean('is_viewed')->default(0);
            $table->boolean('is_starred')->default(0);

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_activities');
    }
}
