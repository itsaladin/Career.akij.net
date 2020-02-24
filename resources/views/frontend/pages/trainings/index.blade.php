@extends('frontend.layouts.app')

@section('title')
Training | {{ config('app.name') }}
@endsection


@section('styles')

@endsection

@section('content')


<!-- hero banner area start here -->
<section id="hero-banner-area-course">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <div class="display-table text-center">
                    <div class="table-center">
                        <!-- Hero banner title -->
                        <div class="hero-banner-box">
                            <h2>Find Courses</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quidem temporibus quam.</p>
                        </div>
                        <!-- search area -->
                        <div class="search-area">  

                            <form>
                                <input type="text" placeholder="&#xf19d;  Search Course" style="font-family:Arial, FontAwesome" /> 
                                <button class="btn-search btn-course-search"> Search </button>
                            </form>
                        </div>
                        
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- hero banner area start here --> 

<!-- Training area --> 
<section id="find-a-job-area" class="bp">
    <div class="container">
        <div class="row">

            <!-- catagory list -->
            <div class="col-xl-3 col-lg-3 col-md-12">

                <div class="sidebar-item">

                    <div class="sidebar-item-header">
                        <i class="fa fa-list"></i> &nbsp; Browse By Categories
                    </div> 
                    <div class="single-catagory-list p-3">
                        <li> <a href="">HR/ Admin <span>(50)</span> </a></li>
                        <li> <a href="">Accounting/Finance  <span>(50)</span> </a></li>
                        <li> <a href="">IT & Telecommunication <span>(50)</span> </a></li>
                        <li> <a href=""> & Training <span>(50)</span> </a></li>
                        <li> <a href="">Marketing & Sales <span>(50)</span> </a></li>
                        <li> <a href="">Customer Support   <span>(50)</span> </a></li>
                        <li> <a href=""> Call Center  <span>(50)</span> </a></li>

                        <li> <a href="">HR/ Admin <span>(50)</span> </a></li>
                        <li> <a href="">Accounting/Finance  <span>(50)</span> </a></li>
                        <li> <a href="">IT & Telecommunication <span>(50)</span> </a></li>
                        <li> <a href=""> & Training <span>(50)</span> </a></li>
                        <li> <a href="">Marketing & Sales <span>(50)</span> </a></li>
                        <li> <a href="">Customer Support   <span>(50)</span> </a></li>
                        <li> <a href=""> Call Center  <span>(50)</span> </a></li>
                    </div>
                </div>
            </div>

            <!-- Training list -->
            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="list-not-found">
                    <span class="badge badge-success p-1 pr-3 pl-3">Total Result Found <strong class="text-white">12</strong></span>
                    <div class="show-job">
                        <p> 
                            Sort By 
                            <select name="" id="" class="sort-by">
                                <option value="">Week</option>
                                <option value="">Month</option>
                                <option value="">Year</option>
                            </select>
                        </p>    
                    </div>
                </div>

              <div class="job-list-area-sm">
                <div class="row">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-md-4">
                            <div class="single-job-list-item" onclick="location.href='{{ route('jobs.show', 'test-job') }}'">
                                <div class="float-left">
                                    {{-- <img src="{{ asset('public/img/ic-card.png') }}" alt=""> --}}
                                    <i class="fa fa-suitcase job-bag"></i>
                                </div>
                                <div class="float-right">
                                    <h5>Frond End Development</h5>
                                    <p class="group-name">Akij Group</p>
                                    <p class="job-date font-10 line-10 text-secondary"><i class="fa fa-history"></i> Date: 17-29 May 2019</p>
                                    <p class="small-description font-12 line-14">
                                        We need a frond-end developer urgently at our Akij City Center !!
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endfor
                    
                </div>
                <div class="next-pages float-left">
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
                <div class="clearfix"></div>
             </div>  
      </div>
  </div>
  <!-- Training lsit -->
</div>
</div>
</section> 
<!-- Training area --> 


@endsection

@section('scripts')

@endsection