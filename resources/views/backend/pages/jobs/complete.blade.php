@extends('backend.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('public/backend/css/add-job.css') }}">
<link rel="stylesheet" href="{{ asset('public/backend/css/job-posting-board.css') }}">
<link rel="stylesheet" href="{{ asset('public/backend/css/job-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/backend/css/custom.css') }}">

@endsection

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>{{$job->title}}</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('admin-content')

<div class="row">
    <div class="col-xl-12 xl-100">
        <div class="card">

            <div class="card-body">
                <div class="job-create-form">

                    @include('backend.layouts.partials.messages')

                    <section id="post-job-area" class="bp">
                        <div class="container">
                            <div class="single-job-post">
                                @include('backend.pages.jobs.partials.job-options')
                                <!-- End Wizard -->
                                <div class="row">
                                <div class="col-md-offset-2 col-md-12 text-center">
                                    <i class="svg-icon svg-check-success"></i>
                                    <h4>You want to live this job ?</h4>
                                    <a href="{{ route('admin.jobs.store.live',$job->id)}}" class="btn btn-success mb-30 mt-20">Live now</a>
                                    {{-- <h3 class="mb-20"><!--Congratulations! Job  has been posted successfully.-->Job is live now.</h3> --}}
                                    <p>
                                         <!--Your job has been posted successfully and now available on Bdjobs.com-->
                                         <!--Please complete payment to publish it shortly.If you need any help regarding payment procedure, kindly contact with our  sales manager who is mentioned below this page or contact with customer support.-->
                                         The job has been published successfully on Bdjobs.com's site. It will be expired after the due date. Good luck.
                                    </p>
                    
                                    <div class="job-status mt-20 mb-40">
                                        <h4 class="inline-block">Job Status: </h4>
                                        <span class="badge  live"><i class="icon-check-sign"></i>&nbsp;Live</span>
                                    </div>
                    
                                    <div class="mb-40">
                                    <a href="{{ route('jobs.show',$job->id)}}" class="btn btn-success"><i class="icon-file-view"></i>&nbsp;View Job</a>
                                    </div>
                    
                                    <div class="alert alert-info">
                                        Customer support: <i class="icon-phone"></i>16479
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')

{{--  <script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(68754)</script>   --}}

<script src="{{ asset('public/js/pages/job-post.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous">
</script>
@include('backend.pages.jobs.partials.job-posting-js');

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script>
    $(".institution-select2").select2({
        placeholder: "Select your preferred institution",
        allowClear: true
    });
</script>
@endsection