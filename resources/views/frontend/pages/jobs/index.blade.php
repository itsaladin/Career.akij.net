@extends('frontend.layouts.app')

@section('title')
	Find a Job | {{ config('app.name') }}
@endsection


@section('styles')
	
@endsection

@section('content')
	
    <!-- Find a job area --> 
    <section id="find-a-job-area" class="bp">
        <div class="container">
            <div class="row">
            
                <!-- catagory list -->
                <div class="col-xl-4 col-lg-3 col-md-12">
                    <div class="accordion js-accordion">
  
                      <div class="accordion__item js-accordion-item start">
                        <div class="accordion-header js-accordion-header">
                        <i class="fa fa-th"></i>
                        Categories
                        </div> 
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <div class="catagory-list-area skillist">
                                    <div class="single-catagory-list">

                                        @foreach ($categories as $category)
                                    <li> <a href="{{ route('category.job.index', $category->id)}}">{{ $category->name}} <span>({{ $category->count() }})</span> </a></li>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>  
                      </div> 
                      
                       <div class="accordion__item js-accordion-item ">
                        <div class="accordion-header js-accordion-header">
                        <i class="fa fa-th"></i>
                        Browse by Location
                        </div> 
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                <div class="catagory-list-area skillist">
                                    <div class="single-catagory-list"> 
                                        <li> <a href=""> Chittagong <span>(50)</span> </a></li>
                                        <li> <a href=""> Rangpur <span>(50)</span> </a></li>
                                        <li> <a href=""> Sylhet <span>(50)</span> </a></li>
                                        <li> <a href=""> Barisal <span>(50)</span> </a></li>
                                        <li> <a href=""> Khulna <span>(50)</span> </a></li>
                                        <li> <a href=""> Dhaka <span>(50)</span> </a></li>
                                        <li> <a href=""> Rajshahi <span>(50)</span> </a></li>
                                      
                                    </div>
                                </div>
                            </div> 
                        </div>  
                      </div> 
                      
                      
                    </div>    
                </div>
                <!-- catagory list -->
                
                <!-- Find a job lsit -->
                <div class="col-xl-8 col-lg-9 col-md-12">
                    <div class="job-search-list">
                        <form action="">
                              <input class="fullinputs" type="text" placeholder="&#xf0ca; Job title, keywords, skills" style="font-family:Arial, FontAwesome" />
                              <button class="btn-searchs find-job-search-button mybtton"> <span class="icon-search"> Search </span></button>
                        </form>
                    </div>
                    <div class="serach-job-list-area">
                        <div class="list-not-found">
                            <div class="found"><p> 10 Results Found </p></div>
                            <div class="show-job">
                                <p>Jobs Show 
                                    <select name="" id="" class="jobs-per-select">
                                        <option value="10">10</option>
                                        <option value="10">20</option>
                                        <option value="10">30</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <!-- single job post -->
                        <div class="single-job-post-full">
                            {{-- @if(is_array($jobs) || is_object($jobs)) --}}
                            @foreach ($jobs as $job)
                            <div class="job-title-here">
                                <div class="single-job">
                                    <div class="job-name-icon">
                                        <span class="icon-icon-brifcase"></span>
                                    </div>
                                    <div class="job-name">
                                    <h3>{{ $job->title}}</h3>
                                        <p>Akij Group</p>
                                    </div>
                                </div>
                                <div class="view-details">
                                    <button class="view-details" onclick="location.href='{{ route('jobs.show', $job->id) }}'">
                                        View Job
                                        <span class="icon-arrow-left"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="job-details-here">
                            
                                <div class="details-list">
                                    <p>Expericnce</p>
                                     <h6> <span class="icon-time"> </span> At List {{ $job->experience_min_year}} years</h6>
                                    
                                </div>
                                
                                <div class="details-list">
                                    <p>Educational Requirements</p>
                                     <h6> <span class="icon-study"> </span> {{ $job->other_educational_qualification}}  </h6> 
                                </div>
                                
                                <div class="details-list">
                                    <p>Job Location</p>
                                    <h6> <span class="icon-location"> </span> {{ $job->job_location_details}}</h6> 
                                </div>
                                
                                <div class="details-list">
                                    <p>Application Deadline</p> 
                                    <h6> <span class="icon-hourglass"> </span> {{ $job->deadline}} </h6> 
                                </div>
                                 
                            </div>
                            @endforeach
                            {{-- @endif --}}
                        </div>
                        
                        <!-- single job post -->
                         {{--<div class="single-job-post-full">
                        
                            <div class="job-title-here">
                                <div class="single-job">
                                    <div class="job-name-icon">
                                        <span class="icon-icon-brifcase"></span>
                                    </div>
                                    <div class="job-name">
                                        <h3>Front End Developer Needed</h3>
                                        <p>Akij Group</p>
                                    </div>
                                </div>
                                <div class="view-details">
                                    <button class="view-details" onclick="location.href='{{ route('jobs.show', 'test-job') }}'">
                                        View Job
                                        <span class="icon-arrow-left"></span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="job-details-here">
                            
                                <div class="details-list">
                                    <p>Expericnce</p>
                                     <h6> <span class="icon-time"> </span>   At List 2 years</h6>
                                    
                                </div>
                                
                                <div class="details-list">
                                    <p>Educational Requirements</p>
                                     <h6> <span class="icon-study"> </span>    CSE , BSE , CS </h6> 
                                </div>
                                
                                <div class="details-list">
                                    <p>Job Location</p>
                                    <h6> <span class="icon-location"> </span>    Dhaka </h6> 
                                </div>
                                
                                <div class="details-list">
                                    <p>Application Deadline</p> 
                                    <h6> <span class="icon-hourglass"> </span>    2018-10-03 </h6> 
                                </div>
                                 
                            </div>
                            
                        </div> --}}
                         
                        <div class="next-pages">
                            <nav aria-label="..." class="pages next-prev">
                              <ul class="pagination">
                                <li class="page-item disabled">
                                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#">Next</a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                            
                    </div>
                    
                </div>
                <!-- Find a job lsit -->
                
            </div>
        </div>
    </section> 
    <!-- Find a job area --> 
    
@endsection

@section('scripts')
	
@endsection