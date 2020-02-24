@extends('backend.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('public/backend/css/add-job.css') }}">
<link rel="stylesheet" href="{{ asset('public/backend/css/job-posting-board.css') }}">
<link rel="stylesheet" href="{{ asset('public/backend/css/job-details.css') }}">

@endsection

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>Compelte Job </h3>
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

                                <form action="{{ route('admin.jobs.update_step3', $job->id) }}" method="post"
                                    enctype="multipart/form-data" id="jobAdd" data-parsley-validate>
                                    @csrf

                                    <h3 class="text-blue mb-40">Preview</h3>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col-md-3 device-control">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group btn-group-device mb-30 hidden-sm hidden-xs" data-toggle="buttons">
                                                            <div class="device-single-btn">
                                                                <span class="block">Desktop</span>
                                                                <label class="btn active btn-desktop">
                                                                    <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="8947 501.667 64 42.667" class="icon-svg icon-white">
                                                                        <path id="Path_6" data-name="Path 6" d="M53.333,41.333A5.326,5.326,0,0,0,58.64,36l.027-26.667A5.349,5.349,0,0,0,53.333,4H10.667A5.349,5.349,0,0,0,5.333,9.333V36a5.349,5.349,0,0,0,5.333,5.333H0v5.333H64V41.333Zm-42.667-32H53.333V36H10.667Z" transform="translate(8947 497.667)"></path>
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                            <div class="device-single-btn">
                                                                <span class="block">Mobile</span>
                                                                <label class="btn btn-mobile">
                                                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="9075.333 493.667 37.333 58.667" class="icon-svg icon-white">
                                                                        <path id="Path_9" data-name="Path 9" d="M34.333,1H13A7.989,7.989,0,0,0,5,9V51.667a7.989,7.989,0,0,0,8,8H34.333a7.989,7.989,0,0,0,8-8V9A7.989,7.989,0,0,0,34.333,1ZM29,54.333H18.333V51.667H29Zm8.667-8h-28V9h28Z" transform="translate(9070.333 492.667)"></path>
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group btn-toggle-s-1 btn-toggle-view mb-30" data-toggle="buttons">
                                                            <label class="btn btn-primary btn-search-view">
                                                            <input type="radio" name="options" id="option1" autocomplete="off"><i class="icon-search"></i>&nbsp;Search View
                                                            </label>
                                                            <label class="btn btn-primary btn-details-view active">
                                                            <input type="radio" name="options" id="option2" autocomplete="off" checked=""><i class="icon-file"></i>&nbsp;Details View
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>

                                            <div class="col-md-9 device-preview">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="device-container desktop">
                                                            <div class="details-view ">
                                                                <div class="job-details">
                                                                    <!------------------****6---------------------->
                                                                    <div id="job-preview" class="job-preview">
                                                                       <!-- Main Content Start-->
                                                                        <div class="row">
                                                                            <!--mig:select JP_ID, SkillType, DailyWorkTime,OfficeTime,ContractDuration,Renewable,DocumentInstruction     ,RequiredDocuments,AdditionalDocuments,NumberOfPhotographs,VisaProcessingFee,ProcessDuration     ,RecruitForOthers,RecruitingCompanyName,Website,HideCompanyInfo From bdjCorporate..jobMigrants where JP_ID = 844221 -->
                                                                            <!------------------****---------------------->
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <div class="pull-right">
                                                                                    <p class="category"><strong>Category: </strong>Production/Operation</p>
                                                                                </div>
                                                                            </div>
                                                                            <!------------------****---------------------->
                                                                            <!------------------****1---------------------->
                                                                            <div class="col-md-8 col-sm-8">
                                                                                <div class="left">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-3 col-sm-push-9" style="display:none">
                                                                                        </div>
                                                                                        <div class="col-sm-9 col-sm-pull-3">
                                                                                            <h4>
                                                                                                {{ $job->title }}                                                                                         </h4>
                                                                                            <h2>
                                                                                                {{-- <span> {{ $employers->name }} </span> --}}
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="vac">
                                                                                        <h5>
                                                                                            Vacancy
                                                                                        </h5>
                                                                                        <p>
                                                                                            {{ $job->no_vacancy }}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="job_des">
                                                                                        <h5>
                                                                                            Job Responsibilities
                                                                                        </h5>
                                                                                        <ul>
                                                                                            <li> 
                                                                                                {{ $job->job_responsibility }}
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="job_nat">
                                                                                        <h5>
                                                                                            Employment Status
                                                                                        </h5>
                                                                                            {{-- {{ $statuses->name }} --}}
                                                                                        <p>
                                                                                            
                                                                                        </p>
                                                                                    </div>
                                                                                    <!--Educational Requirements Details:-->
                                                                                    <div class="edu_req">
                                                                                        <h5>
                                                                                            Educational Requirements
                                                                                        </h5>

                                                                                        <ul>
                                                                                            {{ $job->other_educational_qualification }}
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="job_req">
                                                                                        <h5>
                                                                                            Additional Requirements
                                                                                        </h5>
                                                                                        <ul>

                                                                                            <li>Age at least {{ $job->min_age }} years </li>
                                                                                            <li>Applicants must have computer knowledge.</li>

                                                                                        </ul>
                                                                                    </div>


                                                                                    <div class="job_loc" style="line-height: 24px;">
                                                                                        <h5>
                                                                                            Job Location
                                                                                        </h5>
                                                                                        <p>{{ $job->job_location_details }}</p>
                                                                                    </div>

                                                                                    <div class="salary_range">
                                                                                        <h5>
                                                                                            Salary
                                                                                        </h5>
                                                                                        <!--<p></p>-->
                                                                                        <ul>
                                                                                            @if ($job->is_salary_negotiable == 1)
                                                                                                <li>Negotiable</li>
                                                                                                <li>As per company policy</li>
                                                                                            @else
                                                                                                <li> {{ $job->min_salary }} - {{ $job->max_salary }} Thousand Taka</li>
                                                                                            @endif
                                                                                        </ul>
                                                                                    </div>


                                                                                    <div class="job_source">
                                                                                        <h5>
                                                                                            Job Source
                                                                                        </h5>

                                                                                        <p>
                                                                                            Bdjobs.com Online Job Posting.
                                                                                        </p>
                                                                                    </div>

                                                                                    <div class="job_source">
                                                                                        <h5>
                                                                                            Published on:
                                                                                        </h5>

                                                                                        <p>
                                                                                            {{ $job->created_at }}
                                                                                        </p>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <!------------------****1---------------------->
                                                                            <!---------------------->
                                                                            <!-- Job Summary part -->
                                                                            <!---------------------->
                                                                            <div class="col-md-4 col-sm-4 ">
                                                                                <!------------------****4---------------------->
                                                                                <div class="right">
                                                                                    <div class="panel panel-default">
                                                                                        <div class="panel-heading">Job Summary</div>
                                                                                        <div class="panel-body">

                                                                                            <h4>
                                                                                                <strong>Published on:</strong>  {{ $job->created_at }}
                                                                                            </h4>
                                                                                            <h4>
                                                                                                <strong>Vacancy:</strong> {{ $job->no_vacancy }}
                                                                                            </h4>

                                                                                            <h4>
                                                                                                <strong>Job Nature:</strong> Full-time
                                                                                            </h4>

                                                                                            <h4>
                                                                                                <strong>Age:</strong> Age at least {{ $job->min_age }} years
                                                                                            </h4>


                                                                                            <h4 style="line-height: 24px;">
                                                                                                <strong>Job Location:</strong>
                                                                                                <!--New Location-->
                                                                                                {{ $job->job_location_details }}
                                                                                            </h4>

                                                                                            <h4>
                                                                                                <strong>Salary:</strong> 
                                                                                                
                                                                                                @if ($job->is_salary_negotiable == 1)
                                                                                                    <li>Negotiable</li>
                                                                                                    <li>As per company policy</li>
                                                                                                @else
                                                                                                    <li> {{ $job->min_salary }} - {{ $job->max_salary }} Thousand Taka</li>
                                                                                                @endif
                                                                                            </h4>

                                                                                            <h4>
                                                                                                <strong>Application Deadline:</strong> June 17, 2019
                                                                                            </h4>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                                {{-- <a id="btnPrint" type="button" href="javascript:printPreview()" class="btn btn-success" style="width: 100%;">
                                                                                    <span class="icon-print"></span> Print This Preview
                                                                                </a> --}}

                                                                            </div>

                                                                            <!--Edited Print Preview-->
                                                                            <!------------------****4---------------------->
                                                                        </div>

                                                                        <!---------------------------->
                                                                        <!-- Apply Instruction Part -->

                                                                        <!------------------****2---------------------->
                                                                        <div class="row">
                                                                            <!------------------****3---------------------->
                                                                            <div class="co-md-12 col-sm-12">
                                                                                <div class="guide text-center">
                                                                                    <!--strCVREceivingOptions:1, 3-->
                                                                                    <!--strHardCopyCV:3-->
                                                                                    <div class="apto">
                                                                                        <h3>
                                                                                            <!--strHardCopy:Competent candidates are requested to send their complete hard copy CV along with two copy recent passport size photo to Senior Manager, HR, Akij Food & Beverage Ltd. Krishnapura, Barobaria, Dhamrai, Dhaka.-->Apply Procedures
                                                                                        </h3>

                                                                                    </div>


                                                                                    <div class="apply text-center">
                                                                                        <a class="btn btn-success" href="javascript:void(0);" onclick="void(0)">Apply Online</a>
                                                                                    </div>

                                                                                    <div class="gra-padded gra-bordered gra-centered"></div>

                                                                                    <!--Company Infotmation For Email-->


                                                                                    <!--Company Infotmation For HardCopy-->

                                                                                    <h4>Hard Copy</h4>

                                                                                    <div class="instruction-details ">
                                                                                        Competent candidates are requested to send their complete hard copy CV along with two copy recent passport size photo to Senior Manager, HR, Akij Food &amp; Beverage Ltd. Krishnapura, Barobaria, Dhamrai, Dhaka.
                                                                                    </div>


                                                                                    <!--Walk Direct to interview-->

                                                                                    <div>
                                                                                        <span class="date">
                                                                                            Application Deadline: <strong> June 17, 2019</strong>
                                                                                        </span>
                                                                                    </div>



                                                                                    <!--</div>-->
                                                                                </div>
                                                                                <!------------------****3---------------------->

                                                                                <!--Company Details-->
                                                                                <div class="company-info">
                                                                                    <h5>
                                                                                        Company Information
                                                                                    </h5>
                                                                                    <span>
                                                                                    Akij Food &amp; Beverage Ltd.
                                                                                    </span>


                                                                                    <span>
                                                                                    Akij House, 198 Bir Uttam Mir Shawkat Sarak, Tejgaon, Dhaka-1208.
                                                                                    </span>

                                                                                    <span>
                                                                                        Web: <a href="http://www.akij.net/">www.akij.net</a>
                                                                                    </span>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <script type="text/javascript">
                                                                            function printPreview() {
                                                                                var divContents = document.getElementById("job-preview").outerHTML;
                                                                                var printWindow = window.open('', '', 'height=600,width=900');
                                                                                printWindow.document.write('<html><head><title>Job Preview</title>');
                                                                                printWindow.document.write('<link href="/css/bootstrap.min.css" rel="stylesheet" />');
                                                                                printWindow.document.write('<link rel="stylesheet" type="text/css" href="/css/corporate-icon-font.css" />');
                                                                                printWindow.document.write('<link href="/css/job_preview.css" type="text/css" rel="stylesheet">');
                                                                                //
                                                                                printWindow.document.write('<style type="text/css">#job-preview .col-md-4{display:none !important;}.col-md-8.col-sm-8,.left{width:100%;}.com-logo{width: 100%;}.com-logo img{float:right;}</style>');
                                                                                printWindow.document.write('</head><body id="main">');

                                                                                printWindow.document.write(divContents);

                                                                                printWindow.document.write('\x3Cscript>window.focus();window.onload=function(){window.print();if(navigator.userAgent.indexOf("Firefox") > -1 || navigator.userAgent.indexOf("Chrome") > -1){window.close();}else{window.onfocus=function(){ window.close();}}}\x3C/script>');

                                                                                printWindow.document.write('</body></html>');
                                                                                printWindow.document.close();
                                                                            }
                                                                        </script>
                                                                        <!-- include file="Applicant_List_process_JobPreview_su.asp" -->
                                                                    </div>
                                                                    <!------------------****6---------------------->
                                                                </div>
                                                            </div>

                                                            <div class="search-view hidden">
                                                                <div class="row">
                                                                    <div class="col-md-12">

                                                                        <div class="norm-jobs-wrapper">
                                                                            <div class="row">
                                                                                <div class="col-sm-3 col-sm-push-3">

                                                                                </div>

                                                                                <div class="col-sm-9 col-sm-pull-9">
                                                                                    {{-- <div class="row">

                                                                                        <div class="col-sm-12">
                                                                                            <div class="job-title-text">
                                                                                                <a href="javascript:void(0)">
                                                                                                    Junior Executive, Recycling Plant (For Akij Food &amp; Beverage Ltd., Factory)
                                                                                                    </a>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12">
                                                                                            <div class="comp-name-text">
                                                                                                Akij Food &amp; Beverage Ltd.
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12">
                                                                                            <div class="locon-text">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="locon-text-d">
                                                                                                            <img src="./Job Posting Board-Edit 6_files/Location.svg" alt="Location">Dhaka (Dhamrai)
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12">
                                                                                            <div class="edu-text">
                                                                                                <div class="edu-text-d">
                                                                                                    <img src="./Job Posting Board-Edit 6_files/Edu-cap.svg" alt="Education">
                                                                                                    <ul>Masters degree in any discipline</ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                </div>

                                                                                <div class="col-sm-12">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-9">
                                                                                            <div class="exp-text">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12">
                                                                                                        <div class="exp-text-d">
                                                                                                            <img src="./Job Posting Board-Edit 6_files/Exp_brief.svg" alt="Experience">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-3">
                                                                                            <div class="dead-text">
                                                                                                <div class="dead-text-s"><img src="./Job Posting Board-Edit 6_files/Calendar-deline.svg" alt="Deadline"> Application Deadline:</div>
                                                                                                <div class="dead-text-d">
                                                                                                    <strong>Jun 17, </strong>2019
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="divider s-2 mb-30 mt-20"></div>
                                                </div>

                                                <div class="col-md-8 col-md-push-4">
                                                    <div class="btn-group-right">

                                                        <a href="{{ route('admin.jobs.store.complete', $job->id) }}" class="btn btn-success btn-lg Step6" actionval="0">Update&nbsp;<i class="icon-refresh"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-md-pull-8">
                                                    <div class="btn-left">
                                                        <a href="javascript:void(0)" class="btn btn-grey-2 btn-lg btnStp6Back"><i class="icon-angle-left icon-small"></i>&nbsp;Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
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


<script language="javascript">

    var counter = 0;
    var intCount = parseInt(1)
    
    if (counter == 0){
        counter = intCount;	
    }	
    //var limit = 3;
    function addInput(divName){
        var newdiv = document.createElement('div');
            
        var appendblock;
        
        appendblock = "";
            
        appendblock = appendblock +  "<div class='form-group row'>";		
        appendblock = appendblock +  "<div class='col-md-3'>";
        
        appendblock = appendblock + "<select class='form-control form-control-s-1 mb-10' name='degree_level_ids[]' id='level_id"+parseInt(counter+1)+"' onchange='GetDegreeTitle(this.value,"+parseInt(counter+1)+")'><option value=''>Select Degree Level</option>@foreach ($degree_levels as $level)<option value='{{ $level->id }}'>{{ $level->name }}</option>@endforeach</select>";
                            
        appendblock = appendblock +  "</div>";
        appendblock = appendblock +  "<div class='col-md-3'>";
        appendblock = appendblock +  "<select class='form-control form-control-s-1 mb-10' name='degree_ids[]' id='cboDegreeTitleId"+parseInt(counter+1)+"' onchange='SelectDegreeLevel("+parseInt(counter+1)+")' ></select>";
        appendblock = appendblock +  "</div>";
        appendblock = appendblock +  "<div class='col-md-3'>";
        appendblock = appendblock +  "<input type='text' maxlength = '150' class='form-control form-control-s-1 mb-10 popTips alphanumerictext' placeholder='Concentration/ Major' name='major_subjects[]' id='txtMSubjectId"+parseInt(counter+1)+"' value='' onkeydown='AjaxSearch("+(parseInt(counter+1))+")' data-toggle='popover' data-trigger='focus' data-content='Write academic subject, conscentration or Major, <br>example: Physics,EEE,Science etc.'>";
        appendblock = appendblock +  "</div>";
        
        newdiv.setAttribute('id',(parseInt(counter+1)));
        appendblock = appendblock +  "<div class='col-md-3'>";
        appendblock = appendblock +  '<a href="javascript:delInput('+(parseInt(counter+1))+')" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;</a>';
        appendblock = appendblock +  "</div>";
        appendblock = appendblock +  "<input type='hidden' name='DegreeId' id='hidDegreeId"+parseInt(counter+1)+"' value=''/></div>";				  
        newdiv.innerHTML = appendblock;
        
        document.getElementById(divName).appendChild(newdiv);
        GetDegreeTitle(-1,parseInt(counter+1));
        counter++;
        if (counter>= 5)
        {
            $("#addDegree").css("display","None")
        }
        
        $(".popTips").popover({ html : true});
    }
    
    function GetDegreeTitle(level_id,id){
        var xhttp;
        if(level_id == ""){
            document.getElementById("cboDegreeTitleId"+id).innerHTML = "";
            return;
        }
        
        var xhttp=new XMLHttpRequest();
        var base_url = "{{ Url('/') }}"+"/api/get-degrees/";
        
        xhttp.onreadystatechange=function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("cboDegreeTitleId"+id).innerHTML=this.responseText;
                document.getElementById("txtMSubjectId"+id).value = "";
                //document.getElementById("txtMSubjectId"+id).disabled = true;
                }
            };
        xhttp.open("get", base_url+level_id, true);
        xhttp.send();
    }
    
    function delInput(divNum) {
        var d = document.getElementById('create_div');
        var olddiv = document.getElementById(divNum);
        d.removeChild(olddiv);
        counter--;
        if (counter < 1)
        {
            counter = 1
        }
        if (counter< 5)
        {
            $("#addDegree").css("display","block")
        }

    }
    //removeable_div
    function delDivEditMode(divNum) {
        var d = document.getElementById('removeable_div');
        var olddiv = document.getElementById(divNum);
        d.removeChild(olddiv);
        
        counter--;
        if (counter < 1)
        {
            counter = 1
        }
        if (counter< 5)
        {
            $("#addDegree").css("display","block")
        }
    }
</script>
@endsection