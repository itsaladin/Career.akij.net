@extends('frontend.layouts.app')

@section('title')
View Job - Test Job | {{ config('app.name') }}
@endsection


@section('styles')

@endsection

@section('content')

<!-- Find a job area --> 
<section id="single-job-area" class="bp">
    <div class="container">
        <div class="row">

            
            <!-- Find a job lsit -->
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="single-job-details">
                    <div class="job-single-header pt-2">
                        <div class="float-left">
                            <div class="job-name-icon">
                                <span class="icon-icon-brifcase"></span>
                            </div>
                            <div class="float-right">
                            <h3 class="job-title">{{  $job->title}}</h3>
                                <p>Akij Group</p>
                            </div>
                        </div>
                        <div class="category-name float-right">
                            <h6 class="text-muted">Category</h6>
                            {{-- <h5>{{ $category->name}}</h5> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="job-requirements">
                        <div class="row">
                            <div class="details-list-info col-md-4">
                                <p>Preferred Age</p>
                                <h6> <span class="icon-time"> </span>   
                                    {{  $job->min_age}} to {{  $job->max_age}} (years)
                                </h6>

                            </div>

                            <div class="details-list-info col-md-4">
                                <p>Expericnce</p>
                                <h6> <span class="icon-hourglass"> </span> At List {{ $job->experience_min_year}}  years</h6>

                            </div>

                            <div class="details-list-info col-md-4">
                                <p>Educational Requirements</p>
                                <h6> <span class="icon-study"> </span>{{ $job->other_educational_qualification}}{{ $job->other_educational_qualification}} </h6> 	
                            </div>
                        </div>
                    </div>

                    <div class="job-item-info-list">

                        <div class="job-item-info">
                            <h5>
                                <span>Job Description/Reponsibility</span>
                            </h5>
                            <div class="job-item-description">
                                <ul>
                                    <li>	
                                        {{ $job->job_responsibility}}
                                    </li>
                                    <li>
                                        You will be responsible to carryout multiple projects.
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- Job Item Info -->
                        
                        <div class="job-item-info">
                            <h5>
                                <span>Job Level</span>
                            </h5>
                            <div class="job-item-description">

                                {{ $job->job_level_id}}

                                {{-- {{$job->jobLevel->name}} --}}

                                {{-- @foreach ($job->jobLevels as $jobLevel)
                                    <span class="badge badge-info mr-2">
                                        {{ $jobLevel->name }}
                                    </span>
                                @endforeach --}}
                            </div>
                        </div> <!-- Job Item Info -->
                        
                        <div class="job-item-info">
                            <h5>
                                <span>Description</span>
                            </h5>
                            <div class="job-item-description">
                                <p>
                                    {{ $job->job_context}}
                                </p>
                            </div>
                        </div> <!-- Job Item Info -->
                        
                        <div class="job-item-info">
                            <h5>
                                <span>Job Location</span>
                            </h5>
                            <div class="job-item-description">
                                {{ $job->job_location_details}}
                            </div>
                        </div> <!-- Job Item Info -->
                        

                        <div class="job-item-info">
                            <h5>
                                <span>Salary Range</span>
                            </h5>
                            <div class="job-item-description">
                                {{ $job->min_salary }} to {{  $job->max_salary}} Taka
                            </div>
                        </div> <!-- Job Item Info -->
                        

                        <div class="job-item-info">
                            <h5>
                                <span>Benefits</span>
                            </h5>
                            <div class="job-item-description">
                                <ol>
                                    <li>Workflow</li>
                                    <li>6 working days</li>
                                    <li>Allowance</li>
                                    <li>Tour Facility</li>
                                </ol>
                            </div>
                        </div> <!-- Job Item Info -->
                        
                        <div class="job-item-info">
                            <h5>
                                <span>Application Deadline</span>
                            </h5>
                            <div class="job-item-description">
                                {{ $job->deadline }} <span class="text-muted">(10 days)</span>
                            </div>
                        </div> <!-- Job Item Info -->
                        

                    </div> <!-- Job Item Info List -->
                    
                    <div class="float-left">
                        <div class="application-deadline row">
                            <div class="col-8">
                                Application Deadline :
                            </div> 
                            <div class="col-4 float-right font-12">
                                {{ $job->deadline }}
                            </div>
                        </div>
                    </div>
                    <div class="float-right pb-3 pr-2">
                        <a href="#jobApplyModal" class="btn btn-success btn-extended" data-toggle="modal">
                            <i class="fa fa-check"></i> Apply Now
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Find a job lsit -->

            <!-- Job Apply Modal -->
            @include('frontend.pages.jobs.partials.job-apply-modal')
            <!-- Job Apply Modal -->

            <!-- catagory list -->
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="">

                <div class="sidebar-item">
                <div class="sidebar-item-header">
                    <i class="fa fa-th"></i>
                    Job Summery
                </div> 
                <div class="p-3">
                    <div class="single-job-summery">
                        <table class="w-100">

                            <tr>
                                <td>
                                    <i class="fa fa-users"></i>
                                </td>
                                <td>
                                    No. Of Vacancy
                                </td>
                                <td><strong>{{  $job->no_vacancy}}</strong></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <i class="icon-time"></i>
                                </td>
                                <td>
                                    Vacancy Nature
                                </td>
                                <td>
                                    @foreach ($job->statuses as $jobStatus)
                                        <span class="badge badge-info mr-2">
                                            {{ $jobStatus->status->name }}
                                        </span>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-map-marker-alt"></i>
                                </td>
                                <td>
                                    Job Location
                                </td>
                                <td><strong>{{ $job->job_location_details}}</strong></td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-user"></i>
                                </td>
                                <td>
                                    Preferred Age
                                </td>
                                <td><strong>{{  $job->min_age}} to {{  $job->max_age}} (years)</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-map-marker-alt"></i>
                                </td>
                                <td>
                                    Working Days
                                </td>
                                <td><strong>6 days (week)</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-user"></i>
                                </td>
                                <td>
                                    Experience
                                </td>
                                <td><strong>+ {{  $job->experience_min_year}} years</strong></td>
                            </tr>

                        </table>
                    </div>
                </div>  
                </div> 

                <div class="sidebar-item">
                    <div class="sidebar-item-header">
                        <i class="fa fa-th"></i>
                        Company Details
                    </div> 
                    <div class="">
                        <div class="">
                            <div class="">
                                <div class="company-short-detail-info"> 
                                    <div class="ml-2 mt-2">
                                        <h6>
                                            <img src="{{ asset('public/img/akij-group-logo.png') }}" class="w50px pr-2">
                                            Akij Group
                                        </h6>
                                    </div>
                                    <div class="ml-2">
                                        <table class="w-100">
                                            <tr>
                                                <td class="p-2">
                                                    <i class="fa fa-map-marker-alt"></i> &nbsp; &nbsp; Address
                                                </td>
                                                <td class="p-2">
                                                    Akij House 198, Bir Uttam,
                                                    <br>
                                                    Mir Shawkath Sarak,
                                                    <br>
                                                    Gulshan Link Road
                                                    <br>
                                                    Tejgaon, Dhaka-1208
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="p-2">
                                                    <i class="fa fa-globe"></i> &nbsp; &nbsp; Website
                                                </td>
                                                <td class="p-2">
                                                    <a href="www.akij.net">www.akij.net</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div> 
                    </div>  
                </div> 

                </div>   
            </div>
            <!-- catagory list -->

        </div>
    </div>
</section> 
<!-- Find a job area --> 


@endsection

@section('scripts')

@endsection