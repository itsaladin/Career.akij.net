@extends('frontend.layouts.app')

@section('title')
	About Us | {{ config('app.name') }}
@endsection


@section('styles')
	
@endsection

@section('content')
	
    <!-- Companies Area -->
    <section id="companies-area" class="bp bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-5 pr-4">
                    <h5>Companies</h5>
                    <h6>
                        Lorem ipsum dolor sit amet of dummy text
                    </h6>
                    <div class="company-description">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident harum hic odit cum obcaecati tenetur maxime debitis aliquid tempora nisi, praesentium illo voluptatem voluptatum, odio perferendis officiis quis ratione fuga.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident harum hic odit cum obcaecati tenetur maxime debitis aliquid tempora nisi, praesentium illo voluptatem voluptatum, odio perferendis officiis quis ratione fuga.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 pt-5 pl-4">
                    <img src="{{ asset('public/img/building.png') }}" class="img img-fluid about-building">
                </div>
            </div>
        </div>
    </section>
    
     
    <!-- our company profile -->
    <section id="about-profile" class="bp p-3">
        <div class="container pl-4 pr-4">
            
            <div class="row">
                <div class="owl-carousel our-company-icon">
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                    <div class="company-logos"><img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" /></div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- our company profile -->

    <!-- Job Seeker Opportunity -->
    <section id="job-seeker-opportunity" class="bp">
        <div class="container pl-4 pr-4">
            <div class="row">
                <div class="col-md-6 pt-5 pr-4">
                    <h5>Companies</h5>
                    <h6 class="mb-4">
                        Lorem ipsum dolor sit amet of dummy text
                    </h6>
                    <div class="company-description">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident harum hic odit cum obcaecati tenetur maxime debitis aliquid tempora nisi, praesentium illo voluptatem voluptatum.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident harum hic odit.
                        </p>
                    </div>
                </div>
                <div class="col-md-6  pl-4">
                    <img src="{{ asset('public/img/Group-1010.png') }}" class="img img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- Job Seeker Opportunity -->


    <!-- Training Programs -->
    <section id="about-training-programs" class="bp bg-white">
        <div class="container pl-4 pr-4">
            <div class="row">
                <div class="col-md-6  pl-4">
                    <img src="{{ asset('public/img/Group-2x.png') }}" class="img img-fluid">
                </div>
                <div class="col-md-6 pt-5 pr-4">
                    <h5>Training Programms</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut molestiae aliquam culpa consequatur Lorem ipsum dolor sit amet.
                    </p>
                    <div class="training-list">
                        
                        <div class="training-item">
                            <div class="float-left">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="float-right">
                                <p>
                                    <strong>Title</strong>
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit delectus quo unde laudantium a beatae, neque.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- Single Training Item -->

                        <div class="training-item">
                            <div class="float-left">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="float-right">
                                <p>
                                    <strong>Title</strong>
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit delectus quo unde laudantium a beatae, neque.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- Single Training Item -->
                        
                        <div class="training-item">
                            <div class="float-left">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="float-right">
                                <p>
                                    <strong>Title</strong>
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit delectus quo unde laudantium a beatae, neque.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- Single Training Item -->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Training Programs -->
    
     
@endsection

@section('scripts')
	
@endsection