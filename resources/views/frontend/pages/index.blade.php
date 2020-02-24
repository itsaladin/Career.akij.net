@extends('frontend.layouts.app')

@section('title')
HomePage | {{ config('app.name') }}
@endsection


@section('styles')

@endsection

@section('content')

<!-- hero banner area start here -->
<section id="hero-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <div class="display-table text-center">
                    <div class="table-center">
                        <!-- Hero banner title -->
                        <div class="hero-banner-box">
                            <h2>Want to Build your Career With </h2>
                            <h1>Akij Group ?</h1>
                        </div>
                        <!-- search area -->
                        <div class="search-area">  

                            <form>
                                <input type="text" placeholder="&#xF002; Job Title, Keywords" style="font-family:Arial, FontAwesome" />
                                <input type="text" placeholder="&#xf041;  Location" style="font-family:Arial, FontAwesome" /> 
                                <button class="btn-search"> Search </button>
                            </form>

                        </div>
                        <!-- hireing -->
                        <div class="hireing">
                            <p>Are You Hiring?</p>
                            <button class="btn-hire">POST A JOB</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- hero banner area start here --> 

<section id="latest-job" class="bp">
    <!-- latest job area start -->
    <div class="container">
        <div class="row ">
            <div class="col-xl-12 ">
                <div class="section-title text-center">
                    <h2> <span class="icon-icon-brifcase">  </span> Latest Jobs </h2>
                </div>
            </div>
        </div>
        <div class="row">
                
            <div class="col-xl-12">
                <!-- latest job carousel -->
                <div class="owl-carousel latest-jobs">

                    @foreach ($jobs as $job)
                    <!-- single jobs -->
                    <div class="latest-jobs-box box-shadow">
                        
                        <div class="company-logo">
                            <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" />
                        </div>
                        <div class="job-details">
                            <h2>{{$job->title}}</h2>
                            <h3>Akij Group</h3>
                            <div class="job-table">

                                <table>
                                    <tr>
                                        <td> <span class="icon-location"></span> {{ $job->job_location_details }}</td>

                                        <td> <span class="icon-hourglass"></span> {{ $job->experience_min_year}} years</td> 
                                    </tr>

                                    <tr>
                                        <td> <span class="icon-calender"></span> {{ $job->deadline}}</td>
                                        {{-- {{ $job->statuses->status }} --}}
                                        <td> <span class="icon-time"></span> Full-Time </td> 
                                    </tr>

                                </table>

                            </div>
                            <div class="apply-nows">
                                <a href="{{ route('jobs.show', $job->id) }}"> <button class="apply-now">  Apply Now <span class="icon-arrow-right-2"></span></button></a>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                    <!-- single jobs -->
                    {{-- <div class="latest-jobs-box box-shadow">

                        <div class="company-logo">
                            <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" />
                        </div>
                        <div class="job-details">
                            <h2>Front End Developer Needed</h2>
                            <h3>Akij Group</h3>
                            <div class="job-table">

                                <table>
                                    <tr>
                                        <td> <span class="icon-location"></span> Dhaka</td>

                                        <td> <span class="icon-hourglass"></span> 2 years</td> 
                                    </tr>

                                    <tr>
                                        <td> <span class="icon-calender"></span> May 12, 2018</td>

                                        <td> <span class="icon-time"></span> Full TIme</td> 
                                    </tr>

                                </table>

                            </div>
                            <div class="apply-nows">
                                <a href="{{ route('jobs.show', 'test-job') }}"> <button class="apply-now">  Apply Now <span class="icon-arrow-right-2"></span></button></a>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
           
        </div>
    </div>
    <!-- latest job area end -->

    <!-- Brows By Catagory  -->
    <div class="container pt">
        <div class="row">
            <div class="col-xl-12 ">

                <div class="borwser-catagory box-shadow">
                    <div class="catagory-title">
                        <span class="icon-ic_list_24px"></span>  Browse By Categories
                    </div>
                    
                    <!-- single catagory list -->
                    @foreach ($categories as $category)
                    <div class="catagory-list-area">
                        <div class="single-catagory-list">
                            
                        <li> <a href="{{ route('category.job.index', $category->id)}}">{{ $category->name}} <span>({{ $loop->index+1 }})</span> </a></li>
                            
                            {{-- <li> <a href="">HR/ Admin <span>(50)</span> </a></li>
                            <li> <a href="">Accounting/Finance  <span>(50)</span> </a></li>
                            <li> <a href="">IT & Telecommunication <span>(50)</span> </a></li>
                            <li> <a href=""> & Training <span>(50)</span> </a></li>
                            <li> <a href="">Marketing & Sales <span>(50)</span> </a></li>
                            <li> <a href="">Customer Support   <span>(50)</span> </a></li>
                            <li> <a href=""> Call Center  <span>(50)</span> </a></li> --}}
                        </div>
                    </div>
                    @endforeach

                    <!-- single catagory list -->
                    {{-- <div class="catagory-list-area">
                        <div class="single-catagory-list">
                            <li> <a href="">HR/ Admin <span>(50)</span> </a></li>
                            <li> <a href="">Accounting/Finance  <span>(50)</span> </a></li>
                            <li> <a href="">IT & Telecommunication <span>(50)</span> </a></li>
                            <li> <a href=""> & Training <span>(50)</span> </a></li>
                            <li> <a href="">Marketing & Sales <span>(50)</span> </a></li>
                            <li> <a href="">Customer Support   <span>(50)</span> </a></li>
                            <li> <a href=""> Call Center  <span>(50)</span> </a></li>
                        </div>
                    </div> --}}
                    <!-- single catagory list -->

                </div>
            </div>
        </div>
        </div>
        <!-- Brows By Catagory  -->
        </section>

        <!-- Brows By Skill -->
        <section id="brows-by-skill" class="bp">
            <div class="container">
                <div class="row">

                    <!-- skill image -->
                    <div class="col-xl-5 col-lg-5">
                        <div class="skill-img">
                            <img src="{{ asset('public/img/img-laptop.png') }}" alt="" />
                        </div>
                    </div>

                    <!-- catagory skill -->
                    <div class="col-xl-7 col-lg-7">
                        <div class="borwser-catagory box-shadow skills">
                            <div class="catagory-title">
                                <span class="icon-ic_list_24px"></span>  Browse By Skills
                            </div>

                            <!-- single catagory list -->
                            @foreach ($skills as $skill)
                            <div class="catagory-list-area">
                                <div class="single-catagory-list pl-2 pr-2">
                                    <li> <a href=""> {{ $skill->name}} <span>(50)</span> </a></li>
                                </div>
                            </div>
                            @endforeach
                            <!-- single catagory list -->

                        </div>
                    </div>


                </div>

                <div class="row pt">

                    <!-- single banner -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="job-banner box-shadow">
                            <h2>Are You Looking For Job</h2>
                            <p>Submit Your Resume To Help You</p>
                            <button class="btn-applys">Apply Now</button>
                        </div>
                    </div>

                    <!-- single banner -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="job-banner box-shadow">
                            <h2>Post a New Job</h2>
                            <p>Find the best applicant for you job.</p>
                            <button class="btn-applys">Post Now</button>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- Brows By Skill -->

        <!-- top companies -->
        <section id="top-companies" class="bp">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-12 ">
                        <div class="section-title text-center">
                            <h2> <span class="icon-layer">  </span> Top Company Jobs </h2>
                        </div>
                    </div>
                </div>

                <!-- all companies -->
                <div class="row">

                    <!-- single companies -->
                    @foreach ($jobs as $job)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-companies box-shadow">
    
                                <div class="companies-logo">
                                    <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" />
                                </div>
                                <div class="companies-detail">
                                    <h3>{{ $job->employer->name}}</h3>
                                <span class="iconname-manager-1"> {{ $job->title}}</span>
                                    <span class="icon-manager-1"> Jr. Executive</span>
                                </div>
                                <div class="companies-icon">
                                    <a href=""><span class="icon-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- single companies -->
                    {{-- <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-companies box-shadow">

                            <div class="companies-logo">
                                <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" />
                            </div>
                            <div class="companies-detail">
                                <h3>Akij Food & Beverage Ltd.</h3>
                                <span class="icon-manager-1"> Project Manager</span>
                                <span class="icon-manager-1"> Jr. Executive</span>
                            </div>
                            <div class="companies-icon">
                                <a href=""><span class="icon-arrow-left"></span></a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xl-12 col-lg-4 col-md-6">
                        <nav aria-label="..." class="pages">
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
          <!-- all companies -->

      </div>
  </section>
  <!-- top companies -->

  <!-- our company profile -->
  <section id="our-compnay-profile" class="bp">
    <div class="container">

        <div class="row ">
            <div class="col-xl-12 ">
                <div class="section-title text-center">
                    <h2 class="border-title"> Our Companies </h2>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <p>
                                In this era of mass production, as it is very hard to stand out with one product, Akij Group focuses on making the best in all sectors.
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center pb-3">
            <div class="col-md-9">
                <div class="owl-carousel our-company-icon">
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/afbl.svg') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/Akij-Textile.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/akij-jute.svg') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/afbl.svg') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/Akij-Textile.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/akij-jute.svg') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/afbl.svg') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/Akij-Textile.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/companies/akij-jute.svg') }}" alt="" /></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- our company profile -->

<!-- Download apps  --> 
<section id="download-our-apps" class="pt">
    <div class="container">
        <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="download-our-apps-details">
                    <h3>Download Our App</h3>
                    <h5>A world market in your hand</h5>
                    <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p>
                    <div class="apps">

                        <div class="single-apps box-shadow active">
                            <span class="icon-android"></span>
                            <p>Android</p>
                        </div>
                        <div class="single-apps box-shadow">
                            <span class="icon-apple"></span>
                            <p>IOS</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="download-img">
                    <img src="{{ asset('public/img/img-phone.png') }}" alt="" />
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Download apps  --> 

<!-- News Client  --> 
<section id="new-allerts" class="">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="alerts-box text-center">
                    <h2 class="border-title">Subscribe to Newsletters</h2>
                    <p class="pt-3">Subscribe for the latest newsletters, achievements, news and events.</p>
                    <div class="search-areas">  
                        <form>
                            <input type="text" placeholder="Your Name" />
                            <input type="text" placeholder="Email" />
                            <button class="btn-searchs"> Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Client  -->  

@endsection

@section('scripts')

@endsection