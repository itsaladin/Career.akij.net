<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Auth;
use Exception;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazilla;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact;
use App\Models\EmployerType;
use App\Helpers\UploadHelper;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Benefit;
use App\Models\BenefitType;
use App\Models\DegreeLevel;
use App\Models\Institution;
use App\Models\JobBenefit;
use App\Models\JobInstitution;
use App\Models\JobLevel;
use App\Models\JobStatus;
use App\Models\Status;
use App\Models\Skill;
use Image;

class JobsController extends Controller
{
	/**
	 * index()
	 * 
	 * @return view Return Find a Job Page
	 */
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->get();
        $degree_levels = DegreeLevel::orderBy('id', 'asc')->get();
        $institutions  = Institution::orderBy('name', 'asc')->get();
        $employers = Employer::orderBy('name', 'asc')->get();
        $categories  = Category::orderBy('name', 'asc')->get();

        return view('frontend.pages.jobs.index', compact('jobs', 'degree_levels', 'institutions','employers', 'categories'));
    	//return view('frontend.pages.jobs.index');
    }
    /** 
     * single Job Show Page
     * 
     * @return view 
     */
    public function show($job_id)
    {
        $jobs = new Job;
        $job  = Job::find($job_id);
        $degree_levels = new DegreeLevel;
        $degree_level  = DegreeLevel::find($job_id);
        $institutions  = new Institution;
        $institution   = Institution::find($job_id);
        $employers     = new Employer;
        $employer      = Employer::find($job_id);
        $job_benefits  = new JobBenefit;
        $job_benefit   = Benefit::find($job_id);
        // $categories = new Category;
        // $category   = Category::find($employer->category_id);

        // $statuses = Status::find($job_id);
        return view('frontend.pages.jobs.show', compact('job', 'degree_level', 'institution','employer', 'job_benefit'));
    	// return view('frontend.pages.jobs.show');
    }

    /**
     * Apply Job Page
     * 
     * @return view 
     */
    // public function apply()
    // {
    //     return view('frontend.pages.jobs.apply');
    // }

    /**
     * Post Job Page  
     * 
     * @return view 
     */
    public function postJob()
    {
        return view('frontend.pages.jobs.post');
    }
    
}
