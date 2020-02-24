<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_qualifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('degree_level_id');
            $table->unsignedBigInteger('degree_id');
            $table->string('major_subject')->nullable();

            $table->foreign('degree_level_id')->references('id')->on('degree_levels')->onDelete('cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
        Schema::dropIfExists('job_qualifications');
    }
}
