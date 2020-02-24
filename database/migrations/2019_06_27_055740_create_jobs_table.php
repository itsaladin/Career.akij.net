<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 150);
            $table->string('slug', 190)->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('employer_id');
            $table->date('deadline')->nullable();
            $table->boolean('resume_receiving_option_online')->default(1)->comment('Is resume can be received via online !!');
            $table->boolean('resume_receiving_option')->nullable();
            $table->boolean('resume_receiving_option_description')->nullable();

            $table->unsignedTinyInteger('no_vacancy')->default(1)->nullable();
            $table->boolean('is_photograph_enclose')->default(0);
            $table->text('special_instruction')->nullable();
            $table->unsignedBigInteger('job_type_id');
            $table->unsignedBigInteger('job_level_id');
            $table->text('job_context')->nullable();
            $table->text('job_responsibility')->nullable();
            $table->boolean('job_location')->default(1)->comment('1=>inside Bangladesh, 0=>outside Bangladesh');
            $table->string('job_location_details', 100)->nullable()->comment('Address');
            $table->boolean('is_salary_negotiable')->default(0);
            $table->float('min_salary')->default(0);
            $table->float('max_salary')->default(0);
            $table->string('salary_type')->nullable()->comment('Weekly, Monthly, Yearly');
            $table->text('additional_salary_info')->nullable();
            $table->tinyInteger('festival_bonus', 2)->nullable();
            $table->text('other_bonus')->nullable();
            $table->text('other_educational_qualification')->nullable();
            $table->text('course_info')->nullable();
            $table->text('professional_certificates')->nullable();
            $table->boolean('experience_required')->default(0);
            $table->unsignedTinyInteger('experience_min_year')->default(0);
            $table->unsignedTinyInteger('experience_max_year')->default(0);
            $table->boolean('is_fresher_encourage')->default(0);
            $table->string('area_experience')->nullable();
            $table->string('area_business', 190)->nullable();
            $table->string('additional_skills', 190)->nullable();
            $table->unsignedTinyInteger('min_age')->default(18);
            $table->unsignedTinyInteger('max_age')->default(60);
            $table->boolean('gender')->default(1)->comment('1=>Male, 0=>Female, 2=>Others');
            $table->boolean('is_retired_army_officer')->default(0);

            $table->boolean('company_name_show')->default(1);
            $table->boolean('company_address_show')->default(1);
            $table->boolean('company_business_show')->default(1);

            $table->boolean('is_featured')->default(0);
            $table->boolean('is_confirmed')->default(0);

            $table->unsignedBigInteger('total_view')->default(0);
            $table->unsignedBigInteger('total_search')->default(0);

            $table->unsignedTinyInteger('status')->default(0)->comment('0=>Draft, 1=>Active, 2=>Deleted');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->foreign('job_level_id')->references('id')->on('job_levels')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
