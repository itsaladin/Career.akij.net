<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\JobBenefit;
use App\Models\JobLevel;
use App\Models\JobEmploymentStatus;

class Job extends Model
{
    // $table->bigIncrements('id');
    // $table->string('title', 150);
    // $table->string('slug', 190)->unique();
    // $table->unsignedBigInteger('category_id');
    // $table->unsignedBigInteger('employer_id');
    // $table->date('deadline')->nullable();
    // $table->boolean('resume_receiving_option_online')->default(1)->comment('Is resume can be received via online !!');
    // $table->boolean('resume_receiving_option')->nullable();
    // $table->boolean('resume_receiving_option_description')->nullable();

    // $table->unsignedTinyInteger('no_vacancy')->default(1)->nullable();
    // $table->boolean('is_photograph_enclose')->default(0);
    // $table->text('special_instruction')->nullable();
    // $table->unsignedBigInteger('job_type_id');
    // $table->unsignedBigInteger('job_level_id');
    // $table->text('job_context')->nullable();
    // $table->text('job_responsibility')->nullable();
    // $table->boolean('job_location')->default(1)->comment('1=>inside Bangladesh, 0=>outside Bangladesh');
    // $table->boolean('is_salary_negotiable')->default(0);
    // $table->float('min_salary')->default(0);
    // $table->float('max_salary')->default(0);
    // $table->string('salary_type')->nullable()->comment('Weekly, Monthly, Yearly');
    // $table->text('additional_salary_info')->nullable();
    // $table->text('other_educational_qualification')->nullable();
    // $table->text('course_info')->nullable();
    // $table->text('professional_certificates')->nullable();
    // $table->boolean('experience_required')->default(0);
    // $table->unsignedTinyInteger('experience_min_year')->default(0);
    // $table->unsignedTinyInteger('experience_max_year')->default(0);
    // $table->boolean('is_fresher_encourage')->default(0);
    // $table->string('area_experience')->nullable();
    // $table->string('area_business', 190)->nullable();
    // $table->string('additional_skills', 190)->nullable();
    // $table->unsignedTinyInteger('min_age')->default(18);
    // $table->unsignedTinyInteger('max_age')->default(60);
    // $table->boolean('gender')->default(1)->comment('1=>Male, 0=>Female, 2=>Others');
    // $table->boolean('is_retired_army_officer')->default(0);

    // $table->boolean('company_name_show')->default(1);
    // $table->boolean('company_address_show')->default(1);
    // $table->boolean('company_business_show')->default(1);

    // $table->boolean('is_featured')->default(0);
    // $table->boolean('is_confirmed')->default(0);

    // $table->unsignedBigInteger('total_view')->default(0);
    // $table->unsignedBigInteger('total_search')->default(0);

    // $table->unsignedTinyInteger('status')->default(0)->comment('0=>Draft, 1=>Active, 2=>Deleted');


    public $fillable = [
        'id', 'title', 'slug', 'category_id',
        'employer_id', 'deadline', 'resume_receiving_option_online',
        'resume_receiving_option',
        'resume_receiving_option_description',
        'no_vacancy',
        'is_photograph_enclose',
        'special_instruction',
        'job_type_id',
        'job_level_id'
        
    ];

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }
    // public function job_statuses()
    // {
    //     return $this->belongsTo(JobEmploymentStatus::class);
    // }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function statuses()
    {
        return $this->hasMany(JobStatus::class);
    }
    public function qualifications()
    {
        return $this->hasMany(JobQualification::class);
    }

    // public function jobLevels()
    // {
    //     return $this->hasMany(JobLevel::class);
    // }

    public static function hasBenefit($job_id, $benefit_id)
    {
        $benefit = JobBenefit::where('job_id', $job_id)->where('benefit_id', $benefit_id)->first();
        if (!is_null($benefit))  return true;
        return false;
    }

    public function hasDegreeeLevel($job_id, $level_id, $degree_level_id)
    {
        $job_qualification = JobQualification::where('job_id', $job_id)
        ->where('degree_level_id', $degree_level_id)
        ->where('degree_level_id', $level_id)
        ->first();

        return !is_null($job_qualification) ? true : false;
    }

    public function hasDegreee($job_id, $did, $degree_id)
    {
        $job_qualification = JobQualification::where('job_id', $job_id)
        ->where('degree_id', $did)
        ->where('degree_id', $degree_id)
        ->first();

        return !is_null($job_qualification) ? true : false;
    }
}
