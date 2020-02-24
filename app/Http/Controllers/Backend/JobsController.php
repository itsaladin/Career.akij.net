<?php

namespace App\Http\Controllers\Backend;

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
use App\Models\Degree;
use App\Models\Institution;
use App\Models\JobBenefit;
use App\Models\JobInstitution;
use App\Models\JobLevel;
use App\Models\JobStatus;
use App\Models\JobQualification;
use App\Models\Status;
use App\Models\Skill;
use Image;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * 
     * index()
     * 
     * jobs index :: method
     * 
     */
    public function index()
    {
        // Auth::guard('admin')->user()->givePermissionTo('employers.view');
        // Auth::guard('admin')->user()->assignRole('Super Admin');

        if (!Auth::guard('admin')->user()->can('jobs.view')) {
            abort(403, 'Unauthorized action');
        }

        $jobs = Job::orderBy('id', 'desc')->get();
        return view('backend.pages.jobs.index', compact('jobs'));
    }   
    /**
     * 
     * create()
     * 
     * jobs create :: method
     * 
     */
    public function create()
    {
        if (!Auth::guard('admin')->user()->can('jobs.create')) {
            abort(403, 'Unauthorized action.');
        }

        $employers = Employer::orderBy('name', 'asc')->get();
        $countries = Country::orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $upazillas = Upazilla::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();
        $statuses = Status::orderBy('id', 'asc')->get();

        return view('backend.pages.jobs.create', compact('countries', 'districts', 'upazillas', 'categories', 'types', 'employers', 'statuses'));
    }
    /**
     * 
     * step2()
     * 
     * step2 preview/show :: method
     * 
     */
    public function step2($job_id)
    {
        if (!Auth::guard('admin')->user()->can('jobs.create')) {
            abort(403, 'Unauthorized action.');
        }

        $job = Job::find($job_id);

        if (!is_null($job)) {
            $levels = JobLevel::all();
            $benefit_types = BenefitType::all();
            return view('backend.pages.jobs.step2', compact('job', 'levels', 'benefit_types'));
        }
        session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * step3()
     * 
     * step3 preview/show :: method
     * 
     */
    public function step3($job_id)
    {
        if (!Auth::guard('admin')->user()->can('jobs.create')) {
            abort(403, 'Unauthorized action.');
        }

        $job = Job::find($job_id);

        if (!is_null($job)) {
            $degree_levels = DegreeLevel::orderBy('id', 'asc')->get();
            $institutions  = Institution::orderBy('name', 'asc')->get();

            $Degrees       = Degree::orderBy('name', 'asc')->get();
            $Degree        = Degree::find($job_id);

            // $skill      = Skill::orderBy('name', 'asc')->get();
            return view('backend.pages.jobs.step3', compact('job', 'degree_levels', 'institutions','Degree'));
        }
        session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * preview()
     * 
     * preview all data  :: method
     * 
     */
    public function preview($job_id)
    {
        if (!Auth::guard('admin')->user()->can('jobs.create')) {
            abort(403, 'Unauthorized action.');
        }

        $job = Job::find($job_id);
        //$statuses = Status::find($job_id);
        //dd($statuses);

        if (!is_null($job)) {
            $degree_levels = DegreeLevel::orderBy('id', 'asc')->get();
            $institutions = Institution::orderBy('name', 'asc')->get();
            $employers = Employer::orderBy('name', 'asc')->get();
            $statuses = Status::find($job_id);
            return view('backend.pages.jobs.preview', compact('job', 'degree_levels','statuses','institutions','employers'));
        }
        session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * complete()
     * 
     * complete page:: method
     * 
     */
    public function complete($job_id)
    {
        // return 1;
        // if (!Auth::guard('admin')->user()->can('jobs.create')) {
        //     abort(403, 'Unauthorized action.');
        // }

        $job = Job::find($job_id);
        //$statuses = Status::find($job_id);
        //dd($statuses);
        
        try {
            
            return view('backend.pages.jobs.complete',compact('job'));

        } catch (\Throwable $e) {

            session()->flash('error', 'Complete has been not found !!');
        }

        session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * livePost()
     * 
     * Job live post :: method
     * 
     */
    public function livePost($job_id)
    {
        // return 1;
        // if (!Auth::guard('admin')->user()->can('jobs.create')) {
        //     abort(403, 'Unauthorized action.');
        // }

        $job = Job::find($job_id);
        
        if(!empty($job)){
            if(( $job->status == 0)){
                $job->status = 1;
                session()->flash('success', 'Job post live successfully !!');
            }
            else if(( $job->status == 1)){
                session()->flash('error', 'Already active this post !!');
            }
            else if(( $job->status == 2)){
                session()->flash('error', 'this post has deleted !!');
            }
            $job->save();
        }

        return back();
        //return view('backend.pages.jobs.complete',compact('job'));
        // try {
        //     return view('backend.pages.jobs.complete');
        // } catch (\Throwable $e) {
        //     session()->flash('error', 'Complete has been not found !!');
        // }
        //session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * step2Update()
     * 
     * create job step2 Update :: method
     * 
     */
    public function step2Update($job_id, Request $request)
    {
        if (!Auth::guard('admin')->user()->can('jobs.create')) {
            abort(403, 'Unauthorized action.');
        }

        $job = Job::find($job_id);

        if (!is_null($job)) {
            try {
                // dd($request);

                DB::beginTransaction();

                $job->job_level_id = $request->job_level_id;
                $job->job_context = $request->job_context;
                $job->job_responsibility = $request->job_responsibility;
                $job->job_location = $request->job_location;
                $job->job_location_details = $request->job_location_details;

                if (isset($request->is_salary_negotiable)) {
                    $job->is_salary_negotiable = 1;
                    $job->min_salary = 0;
                    $job->max_salary = 0;
                    $job->salary_type = 3;
                } else {
                    $job->is_salary_negotiable = 0;
                    $job->min_salary = $request->min_salary;
                    $job->max_salary = $request->max_salary;
                    $job->salary_type = $request->salary_type;
                }

                $job->additional_salary_info = $request->additional_salary_info;
                $job->festival_bonus = $request->festival_bonus;
                $job->other_bonus = $request->other_bonus;
                

                if (isset($request->job_benefits)) {
                    foreach ($request->job_benefits as $bnft) {
                        $benefit = new JobBenefit();
                        $benefit->job_id = $job->id;
                        $benefit->benefit_id = $bnft;
                        $benefit->save();
                    }
                }

                $job->save();

                DB::commit();
                session()->flash('success', 'More Job Information has been updated successfully !!');
                return redirect()->route('admin.jobs.store.step3', $job->id);
            } catch (\Exception $e) {
                session()->flash('db_error', $e->getMessage());
                DB::rollBack();
                return back();
            }
        }
        session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * step3Update()
     * 
     * create job step2 Update :: method
     * 
     */
    public function step3Update($job_id, Request $request)
    {
        if (!Auth::guard('admin')->user()->can('jobs.create')) {
            abort(403, 'Unauthorized action.');
        }
        // dd($request->institutions);

        $job = Job::find($job_id);

        //$jobInstitution = JobInstitution::find($job_id);
        //console.log('job');
        //dd($jobInstitution);

        if (!is_null($job )) {
            try {
                // dd($request);

                DB::beginTransaction();
                
                //degree level 
                // if (isset($request->degree_level_ids)) {
                //     foreach ($request->degree_level_ids as $degree_level) {
                //         $job_Qualifications = new JobQualification();
                //         //$jobInstitution = JobQualification::find($job_id);
                //         $job_Qualifications->degree_level_id = $request->$level->id;
                //         //$job_Qualifications->degree_id = $job->id;
                //         $job_Qualifications->save();
                //     }
                // }

                //jobInstitution DataTable
                if (isset($request->institutions)) {
                    foreach ($request->institutions as $institution) {
                        $jobInstitution = new JobInstitution();
                        // $jobInstitution = JobInstitution::find($job_id);
                        $jobInstitution->job_id = $job->id;
                        $jobInstitution->institution_id = $institution;
                        $jobInstitution->save();
                    }
                }
                
                //Job DataTable
                $job->other_educational_qualification = $request->other_educational_qualification;
                $job->course_info = $request->course_info;
                $job->professional_certificates = $request->professional_certificates;
                //Job Experence
                if(( $request->optExperience) == 1){
                    //Max job Experence
                    if(($request->cmbMinExp) > 0){
                        $job->experience_min_year = $request->cmbMinExp;
                    }else{
                        $job->experience_min_year = 0;
                    }
                    //Max job Experence
                    if(($request->cmbMaxExp) > 0){
                        $job->experience_max_year = $request->cmbMaxExp;
                    }else{
                        $job->experience_max_year = 0;
                    }
                    if(($request->optExperienceFreshers) > 0){
                        $job->is_fresher_encourage = $request->optExperienceFreshers;
                    }else{
                        $job->is_fresher_encourage = 0;
                    }
                }
                $job->area_experience = $request->txtExperiance;
                $job->area_business = $request->txtBusiness;
                
                //from skill datatable to update data
                // if(!empty($request->txtSkill)){
                //     $skill = Skill::find($job_id);

                //     $skill->name = $request->txtSkill;
                //     $skill->slug = str_slug($request->txtSkill);
                // }

                //Confused Data Table Field start
                $job->additional_skills = $request->JobRequirements;
                //Confused Data Table Field End

                //gender seletion field
                if(($request->optGender) > 0 && ($request->optGender) < 2){
                    $job->gender = $request->optGender;
                }
                else if(($request->optGender) >= 2 && ($request->optGender) < 3){
                    $job->gender = $request->optGender;
                }
                else{
                    $job->gender = 0;
                }

                //Min Age value assign
                if(($request->cmbMinAge) > 0){
                    $job->min_age = $request->cmbMinAge;
                }else{
                    $job->min_age = 0;
                }

                //Max Age value assign
                if(($request->cmbMaxAge) > 0){
                    $job->max_age = $request->cmbMaxAge;
                }else{
                    $job->max_age = 0;
                }
                //is_retired_army_person
                if(($request->chkRetiredArmy) > 0){
                    $job->is_retired_army_officer = $request->chkRetiredArmy;
                }else{
                    $job->is_retired_army_officer = 0;
                }

                $job->save();
                DB::commit();
                session()->flash('success', 'More Job Information (Step 3) has been updated successfully !!');
                return redirect()->route('admin.jobs.store.preview', $job->id);
            } catch (\Exception $e) {
                session()->flash('db_error', $e->getMessage());
                DB::rollBack();
                return back();
            }
        }
        session()->flash('error', 'No job has been found !!');
    }
    /**
     * 
     * store()
     * 
     * job store :: method
     * 
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title'  => 'required|max:150',
        // ],
        // [
        //     'title.required' => 'Please give a job title'
        // ]);

        try {
            // dd($request);

            DB::beginTransaction();
            $job = new Job();
            $job->title = $request->title;
            $job->slug = StringHelper::createSlug($request->title, 'Job', 'slug');
            $job->employer_id = $request->employer_id;

            if(( $request->chkVacancies) == true){
                $job->no_vacancy = 0;
            }else{
                $job->no_vacancy = $request->no_vacancy;
            }

            $job->category_id = $request->category_id;
            $job->employer_id = $request->employer_id;
            $job->resume_receiving_option_online = $request->resume_receiving_option_online;
            $job->resume_receiving_option = $request->resume_receiving_option;
            if ($request->resume_receiving_option == 1) {
                $job->resume_receiving_option_description = $request->AppliedEmail;
            } elseif ($request->resume_receiving_option == 2) {
                $job->resume_receiving_option_description = $request->textHardcopy;
            } elseif ($request->resume_receiving_option == 3) {
                $job->resume_receiving_option_description = $request->textWalkingInterview;
            }

            $job->special_instruction = $request->special_instruction;

            $getDeadline = $request->deadline; //04/30/2019
            //2019-04-18 00:00:00
            $getDeadline = substr($getDeadline, 6, 4) . '-' . substr($getDeadline, 0, 2) . '-' . substr($getDeadline, 3, 2);
            $job->deadline = $getDeadline;

            $job->status = 0; // Draft
            $job->save();

            // Job Multiple Statuses
            foreach ($request->status_id as $sts) {
                $status = new JobStatus();
                $status->job_id = $job->id;
                $status->status_id = $sts;
                $status->save();
            }

            DB::commit();
            session()->flash('success', 'Job has been saved successfully !!');
            return redirect()->route('admin.jobs.store.step2', $job->id);
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
    /**
     * 
     * jobsEdit()
     * 
     * Jobs edit  :: method
     * 
     */
    public function jobsEdit($id)
    {
        // if (!Auth::guard('admin')->user()->can('jobs.jobs-edit')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $job = Job::find($id);
        //dd($job);

        if (!empty($job)) {
            $countries = Country::orderBy('name', 'asc')->get();
            $employers = Employer ::orderBy('name', 'asc')->get();
            $statuses = Status ::orderBy('name', 'asc')->get();
            $districts = District::orderBy('name', 'asc')->get();
            $upazillas = Upazilla::orderBy('name', 'asc')->get();
            $categories = Category::orderBy('name', 'asc')->get();
            $types = Type::orderBy('name', 'asc')->get();
            // $job = Job::find($id);
            // dd($job);

            //$primary_contact = Contact::$employer->primaryContact($id);
            return view('backend.pages.jobs.jobs-edit', compact('job','countries','employers','statuses','districts', 'upazillas', 'categories', 'types'));
        }
        session()->flash('error', 'No Employer has found by ID');
        return $this->index();
        //return view('backend.pages.jobs.jobs-edit');
    }
    /**
     * 
     * jobsUpdate()
     * 
     * Jobs update :: method
     * 
     */
    public function jobsUpdate(Request $request, $id)
    {
        // if (!Auth::guard('admin')->user()->can('jobs.jobs-edit')) {
        //     abort(403, 'Unauthorized action.');
        // }
        //dd($id);

        $job = Job::find($id);
        
        if (!is_null($job)) {
            try {
                // dd($request);

                DB::beginTransaction();

                $job->title = $request->title;
                $job->employer_id = $request->employer_id;
                $job->no_vacancy  = $request->no_vacancy;//incomplete
                $job->category_id = $request->category_id;


                if (isset($request->status_id)) {
                    foreach ($request->status_id as $status) {
                        $jobstatus = new JobStatus();
                        $jobstatus->status_id = $status->id;
                        $jobstatus->save();
                    }
                }

                $getDeadline = $request->deadline; //04/30/2019
                //2019-04-18 00:00:00
                $getDeadline = substr($getDeadline, 6, 4) . '-' . substr($getDeadline, 0, 2) . '-' . substr($getDeadline, 3, 2);
                $job->deadline = $getDeadline;


                if(isset($request->resume_receiving_option_online)){
                    $job->resume_receiving_option_online = $request->resume_receiving_option_online;
                }else{
                    $job->resume_receiving_option_online = 0;
                }


                if(isset($request->resume_receiving_option)){
                    if(( $request->resume_receiving_option) == 1){
                        $job->resume_receiving_option = $request->resume_receiving_option;
                        $job->resume_receiving_option_description = $request->AppliedEmail;
                    }
                    else if(( $request->resume_receiving_option) == 2){
                        $job->resume_receiving_option = $request->resume_receiving_option;
                        $job->resume_receiving_option_description = $request->textHardcopy;
                    }
                    else if(( $request->resume_receiving_option) == 3){
                        $job->resume_receiving_option = $request->resume_receiving_option;
                        $job->resume_receiving_option_description = $request->textWalkingInterview;
                    }
                }else{
                    $job->resume_receiving_option = 0;
                }
                
                $job->special_instruction = $request->special_instruction;
                if(( $request->is_photograph_enclose) == 1){
                    $job->is_photograph_enclose = $request->is_photograph_enclose;
                }else{
                    $job->is_photograph_enclose = 0;
                }
                
                $job->save();

                DB::commit();
                session()->flash('success', 'More Job Information has been updated successfully !!');
                return redirect()->route('admin.jobs.store.step2', $job->id);
            } catch (\Exception $e) {
                session()->flash('db_error', $e->getMessage());
                DB::rollBack();
                return back();
            }
        }
        session()->flash('error', 'No job has been found !!');

    }
    /**
     * 
     * job_Delete()
     * 
     * job delete :: method
     * 
     */
    public function job_Delete($id)
    {
        $job = Job::find($id);

        try {
            if (!is_null($job)) {
                $job->delete();
                session()->flash('success', 'Employer Information has been deleted successfully !!');
                return back();
            }
        } catch (\Throwable $th) {
            session()->flash('error_msg', 'Sorry !! There is no employer has found !!');
            return back();
        }
    }
    public function show($id)
    {
        //
    }
    /**
     * 
     * edit()
     * 
     * job edit :: method
     * 
     */
    public function edit($id)
    {
        if (!Auth::guard('admin')->user()->can('employers.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $employer = Employer::find($id);

        if (!is_null($employer)) {
            $countries = Country::orderBy('name', 'asc')->get();
            $districts = District::orderBy('name', 'asc')->get();
            $upazillas = Upazilla::orderBy('name', 'asc')->get();
            $categories = Category::orderBy('name', 'asc')->get();
            $types = Type::orderBy('name', 'asc')->get();

            $primary_contact = $employer->primaryContact($id);
            return view('backend.pages.employers.edit', compact('countries', 'districts', 'upazillas', 'categories', 'types', 'employer', 'primary_contact'));
        }
        session()->flash('error', 'No Employer has found by this ID');
        return $this->index();
    }
    /**
     * 
     * update()
     * 
     * edit job update :: method
     * 
     */
    public function update(Request $request, $id)
    {

        $employer = Employer::find($id);

        $request->validate([
            'name'  => 'required|max:100',
            'name_bn'  => 'required|max:100',
            'contact_email'  => 'required|email|max:100|unique:employers,email,' . $employer->id,
            'country_id'  => 'required',
            'district_id'  => 'required',
            'upazilla_id'  => 'required',
            'category_id'  => 'required',
            'address'  => 'required|max:190',
            'address_bn'  => 'nullable|max:190',
            'business_description'  => 'nullable|max:190',
            'business_trade_licence'  => 'nullable|max:190',
            'business_rl_no'  => 'nullable|max:50',
            'website'  => 'nullable|url|max:50',
            'logo'  => 'nullable|image|max:100',
            'password'  => 'nullable|confirmed|min:6|max:20',
        ]);

        try {
            DB::beginTransaction();
            $employer->name = $request->name;
            $employer->name_bn = $request->name_bn;
            $employer->country_id = $request->country_id;
            $employer->district_id = $request->district_id;
            $employer->division_id = District::find($request->district_id)->division_id;
            $employer->upazilla_id = $request->upazilla_id;
            $employer->category_id = $request->category_id;
            $employer->address = $request->address;
            $employer->address_bn = $request->address_bn;
            $employer->business_description = $request->business_description;
            $employer->business_trade_licence = $request->business_trade_licence;
            $employer->business_rl_no = $request->business_rl_no;
            $employer->website = $request->website;
            $employer->email = 'test@gmail.com';
            $employer->password = Hash::make($request->password);
            $employer->api_token = bin2hex(openssl_random_pseudo_bytes(40));
            $employer->save();

            // New Contact Information for this employer
            $contact = $employer->primaryContact($employer->id);
            $contact->name = $request->contact_name;
            $contact->email = $request->contact_email;
            $contact->phone = $request->contact_phone;
            $contact->designation = $request->contact_designation;
            $contact->employer_id = $employer->id;
            $contact->is_primary_contact  = 1;
            $contact->save();

            // If there is any logo then save it
            if (isset($request->logo)) {
                $employer->logo = ImageUploadHelper::update('logo', $request->file('logo'), time(), 'public/img/companies', 'public/img/companies/' . $employer->logo);
            }

            $employer->email =  $request->contact_email;
            $employer->save();

            // Save employers types
            if (count($request->types) <= 20) {
                // Delete old employers types
                $etypes = EmployerType::where('employer_id',  $employer->id)->get();
                foreach ($etypes as $etype) {
                    $etype->delete();
                }

                if (count($request->types) > 0) {
                    foreach ($request->types as $type) {
                        $employer_type = new EmployerType();
                        $employer_type->employer_id = $employer->id;
                        $employer_type->type_id = $type;
                        $employer_type->save();
                    }
                }
            } else {
                throw new Exception('Please give types less than or equal twenty types. ');
            }

            DB::commit();
            session()->flash('success', 'Employer Information has been updated successfully !!');
            return redirect()->route('admin.employers.index');
        } catch (\Exception $e) {
            // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
    /**
     * 
     * destroy()
     * 
     * destroy  :: method
     * 
     */
    public function destroy($id)
    {
        $employer = Employer::find($id);
        if (!is_null($employer)) {
            $employer->delete();
            session()->flash('success', 'Employer Information has been deleted successfully !!');
            return back();
        }

        session()->flash('error_msg', 'Sorry !! There is no employer has found !!');
        return back();
    }
}
