@extends('backend.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('public/backend/css/add-job.css') }}">
@endsection

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>Compelte Job - {{ $job->title }}</h3>
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

                                    <h5 class="mb-4">
                                        Candidate Requirements
                                    </h5>

                                    <div class="card-content">
                                        <h6 class="form-subhead">Educational Qualification</h6>

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label">Degree</label>
                                            <div class="col-md-9">

{{--                                                 
                                                <div id="removeable_div">
                                                    <div id="0">
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <select class="form-control form-control-s-1 mb-10" name="degree_level_ids[]" id="level_id0" onchange="GetDegreeTitle(this.value,0)">
                                                                    <option value="">Select Degree Level</option>
                                                                    @foreach ($degree_levels as $level)
                                                                        <option value="{{ $level->id }}" {{ $job->hasDegreeeLevel($job->id, $level->id) ? 'selected' : '' }}>{{ $level->name }}</option>   
                                                                    @endforeach
                                                                </select>

                                                                {{-- <select class="form-control form-control-s-1 mb-10" name="degree_level_ids[]" id="level_id0" onchange="GetDegreeTitle(this.value,0)">
                                                                    @foreach ($degree_levels as $level)
                                                                        @if($Degree->degree_level_id == $level->id)
                                                                            <option value="{{ $level->id }}" selected>{{ $level->name }}</option>
                                                                        @else
                                                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select> --}}

                                                            {{-- </div>
                                                            <div class="col-md-3">
                                                            <select class="form-control form-control-s-1 mb-10" name="degree_ids[]" id="cboDegreeTitleId0">
                                                                <option value="">Select Degree Name</option>
                                                            </select>
                                                            </div>
                                                            
                                                            <div class="col-md-3">
                                                            
                                                            <input type="text" maxlength="150" class="form-control form-control-s-1 mb-10 popTips alphanumerictext" placeholder="Concentration/ Major" name="major_subjects[]" id="txtMSubjectId0" value="" onkeydown="AjaxSearch(0)" data-toggle="popover" data-trigger="focus" data-content="Write academic subject, conscentration or Major, <br>example: Physics,EEE,Science etc." data-original-title="" title="">
                                                            </div>
                                                            
                                                            <input type="hidden" name="DegreeId" id="hidDegreeId0" value="">   
                                                        </div>
                                                    </div>  
                                                </div>	  --}}


                                                <div id="create_div">
                                                    @foreach ($job->qualifications as $qualification)
                                                    <div id="{{ $loop->index + 2}}">
                                                            <div class="form-group row">
                                                                <div class="col-md-3">
                                                                    <select class="form-control form-control-s-1 mb-10" name="degree_level_ids[]" id="level_id0" onchange="GetDegreeTitle(this.value,0)">
                                                                        <option value="">Select Degree Level</option>
                                                                        @foreach ($degree_levels as $level)
                                                                            <option value="{{ $level->id }}" >{{ $level->name }}</option>   
                                                                            {{-- <option value="{{ $level->id }}" {{ $job->hasDegreeeLevel($job->id, $level->id, $qualification->degree_level_id) ? 'selected' : '' }}>{{ $level->name }}</option>    --}}
                                                                        @endforeach
                                                                    </select>
    
                                                                    {{-- <select class="form-control form-control-s-1 mb-10" name="degree_level_ids[]" id="level_id0" onchange="GetDegreeTitle(this.value,0)">
                                                                        @foreach ($degree_levels as $level)
                                                                            @if($Degree->degree_level_id == $level->id)
                                                                                <option value="{{ $level->id }}" selected>{{ $level->name }}</option>
                                                                            @else
                                                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select> --}}
    
                                                                </div>
                                                                <div class="col-md-3">
                                                                <select class="form-control form-control-s-1 mb-10" name="degree_ids[]" id="cboDegreeTitleId0">
                                                                    <option value="">Select Degree Name</option>
                                                                </select>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                
                                                                <input type="text" maxlength="150" class="form-control form-control-s-1 mb-10 popTips alphanumerictext" placeholder="Concentration/ Major" name="major_subjects[]" id="txtMSubjectId0" value="" onkeydown="AjaxSearch(0)" data-toggle="popover" data-trigger="focus" data-content="Write academic subject, conscentration or Major, <br>example: Physics,EEE,Science etc." data-original-title="" title="">
                                                                </div>
                                                                
                                                                <input type="hidden" name="DegreeId" id="hidDegreeId0" value="">   
                                                            </div>
                                                        </div> 
                                                    @endforeach
                                                </div>  

                                                <div class="row">
                                                    <div class="col-md-3">
                                                    <a id="addDegree" href="javascript:addInput('create_div');" class="btn btn-s-2 ">
                                                        <i class="icon-plus"></i>&nbsp;Add more
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Preferred Educational Institution</label>
                                        <div class="col-md-7">
                                            <select name="institutions[]" id="" class="form-control institution-select2 " multiple>
                                                <option value="">Select Preferred Institution</option>
                                                @foreach ($institutions as $institution)
                                                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="txtSelectedInstituteList" id="hidSelectedInstitute" value="">
                                        <input type="hidden" name="txtSelectedInstituteName" id="hidSelectedInstituteName" value="">
                                    </div>

                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label" for="txtEducation">Other Educational Qualification</label>
                                        <div class="col-md-7">
                                        <textarea class="form-control form-control-s-1 popTips" name="other_educational_qualification" id="txtEducation" placeholder="Write Other Educational Qualification" rows="4" data-toggle="popover" data-trigger="focus" data-content="Write other educational qualifications which are not covered with degree and preferred educational institution fields." data-original-title="" title="">{{$job->other_educational_qualification}}</textarea>
                                        </div>
                                    </div>
                                                        

                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label" for="course_info">Training/ Trade Course</label>
                                        <div class="col-md-7">
                                        <input type="text" class="form-control" value="{{$job->course_info}}" name="course_info" id="course_info">	       
                                        </div>
                                    </div>
                                    <input type="hidden" name="txtSelectedCourseList" id="hidSelectedCourse" value="">
                                    <input type="hidden" name="txtSelectedCourseName" id="hidSelectedCourseName" value="">
                                    
                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label" for="professional_certificates">Professional Certification</label>
                                        <div class="col-md-7">
                                        <input type="text" class="form-control" name="professional_certificates" value="{{$job->professional_certificates}}" id="professional_certificates">	       
                                        </div>
                                    </div>

                                <h6 class="form-subhead">Experience and Business Area</h6>
                                <div class="form-group row mb-20">
                                    
                                    <label class="col-md-3 col-form-label">Experience</label>

                                    <div class="col-md-7">
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="btn-group btn-toggle-s-1 mb-20 exp-tab" data-toggle="buttons">
                                                    <label class="btn btn-primary no-exp">
                                                    <input type="radio" name="optExperience" id="optExperienceNotRequired" autocomplete="off" value="0" checked="checked"><i class="icon-check-sign toggle"></i>&nbsp;No Experience Required
                                                    </label>
                                                    <label class="btn btn-primary ml-3 exp active">
                                                    <input type="radio" name="optExperience" id="optExperienceNotRequired1" value="1" autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Experience Required
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row experience-filter">

                                            <div class="col-md-6">
                                            <label for="cmbMinExp" class="label-sm">Minimum year of experience</label>
                                            <select name="cmbMinExp" id="cmbMinExp" class="form-control form-control-s-1 on-click-disabled">
                                                <option value="-1">Any</option>
                                                
                                                @for($min_exp =  0; $min_exp <= 50; $min_exp++)
                                                    <option value="{{ $min_exp }}">{{ $min_exp }}</option>
                                                @endfor
                                                
                                            </select>
                                            </div> 
                                            
                                            <div class="col-md-6">
                                                <label for="cmbMaxExp" class="label-sm">Maximum year of experience</label>
                                                <select name="cmbMaxExp" id="cmbMaxExp" class="form-control form-control-s-1 on-click-disabled">
                                                    <option value="-1">Any</option>
                                                    
                                                    @for($max_exp =  1; $max_exp <= 50; $max_exp++)
                                                        <option value="{{ $max_exp }}">{{ $max_exp }}</option>
                                                    @endfor
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="alert-grey">
                                                    <i class="icon-exclamation"></i>Use both fields for range or use only one field.
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="md-checkbox mb-20">
                                                    <input type="checkbox" name="optExperienceFreshers" id="optExperienceFreshers" value="1">
                                                    <label for="optExperienceFreshers" class="">Freshers are also encouraged to apply</label>
                                                </div>
                                            </div>

                                            <label class="col-md-12 label-sm">Area of experience</label>
                                            <div class="col-md-12 mb-10">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="as-container area-of-experience">
                                                                    <div class="as-items area-of-experience-items">
                                                                        
                                                                    </div>
                                                                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input class="form-control form-control-s-1 no-border popTips alphanumerictext ui-autocomplete-input" placeholder="Write Area of Experience" type="text" name="txtExperiance" id="txtExperiance"  value="{{ $job->area_experience}}"  data-toggle="popover" data-trigger="focus" data-content="Select the area of experience according to your job category from the suggestion list." data-original-title="" title="" size="24" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <input type="hidden" name="txtSelectedExperienceList" id="hidSelectedExperience" value="">
                                            <input type="hidden" name="txtSelectedExperienceName" id="hidSelectedExperienceName" value="">

                                            <label class="col-md-12 col-form-label label-sm">Area of business</label>
                                            <div class="col-md-12">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="as-container area-of-business">
                                                                    <div class="as-items area-of-business-items">
                                                                        
                                                                    </div>
                                                                <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input class="form-control form-control-s-1 no-border popTips alphanumerictext ui-autocomplete-input" placeholder="Write Area of Business" type="text" name="txtBusiness" id="txtBusiness" value="{{ $job->area_business}}" data-toggle="popover" data-trigger="focus" value="{{ $job->area_business}}" data-content="Write the area of business according to your <br>job category then you will get suggestions to select." data-original-title="" title="" size="22" autocomplete="off">
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <input type="hidden" name="txtSelectedBusinessList" id="hidSelectedBusiness" value="">
                                            <input type="hidden" name="txtSelectedBusinessName" id="hidSelectedBusinessName" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="">

                                    <div class="form-group row mb-20">
                                    <label class="col-md-3 col-form-label">Skills</label>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="as-container skills" id="txtSkillErrorMsg">
                                                <div class="as-items skills-items">
                                                                                            
                                                </div>
                                                <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input class="form-control form-control-s-1 no-border popTips alphanumerictext  ui-autocomplete-input" data-trigger="focus" data-content="Write skills in precise and specific way <br><br>Good example: Risk Management, Buyer Handling, AutoCAD etc.<br>Bad example: experience in risk management, safety etc." placeholder="Write Skills" type="text" name="txtSkill" id="txtSkill"  data-original-title="" title="" size="12" autocomplete="off">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <input type="hidden" name="txtSelectedSkillList" id="hidSelectedSkill" value="">
                                    <input type="hidden" name="txtSelectedSkillName" id="hidSelectedSkillName" value="">
                            
                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Additional Requirements</label>
                                        <div class="col-md-7">
                                        <textarea name="JobRequirements" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Write Additional Requirements" data-toggle="popover" data-trigger="focus" data-content="This will help to get your desired candidates.<br>*List your requirements (e.g. skills) precisely that you need from a candidate.<br>*Mention any other relevant skills that are preferred but not required." data-original-title="" title="">{{$job->additional_skills}}</textarea>
                                        </div>
                                        
                                    </div>

                                    <h6 class="form-subhead">Personal Information</h6>

                                    <div class="form-group row mb-20">
                                    <label class="col-md-3 col-form-label">Gender</label>
                                    <div class="col-md-7">          
                                            <!--
                                            <div class="btn-group btn-toggle-s-1" data-toggle="buttons">
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="optGender" id="optGenderM"  value="M"   autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Male
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="optGender" id="optGenderF" value="F"   autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Female
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="optGender" id="optGenderO" value="O"   autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Others
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="optGender" id="optGenderB" value="B"   autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Male & Female
                                                </label>
                                                <label class="btn btn-primary">
                                                    <input type="radio" name="optGender" id="optGenderA" value="A"  checked="checked"   autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Any
                                                </label>
                                            </div>
                                            -->
                                            <label id="" class="btn btn-s-1 btn-round checkbox-toggle">
                                                <input type="checkbox" id="optGenderM" name="optGender" value="1" class="hidden" autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Male
                                            </label>
                                            
                                            <label id="" class="btn btn-s-1 btn-round checkbox-toggle">
                                                <input type="checkbox" id="optGenderF" name="optGender" value="0" class="hidden" autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Female
                                            </label>
                                            
                                            <label id="" class="btn btn-s-1 btn-round checkbox-toggle">
                                                <input type="checkbox" id="optGenderO" name="optGender" value="2" class="hidden" autocomplete="off"><i class="icon-check-sign toggle"></i>&nbsp;Others
                                            </label>					
                                    </div>
                                    </div>
                                    <input type="hidden" name="optPreGender" id="optPreGender" value="">
                                    
                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Age</label>
                                        <div class="col-md-7">
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="" class="label-sm">Min</label>
                                                    <select name="cmbMinAge" id="cmbMinAge" class="form-control form-control-s-1 on-click-disabled">
                                                        <option value="-1">Any</option>
                                                        @for($min_age = 14; $min_age <= 90; $min_age++)
                                                            <option value="{{ $min_age }}">{{ $min_age }}</option>
                                                        @endfor
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="label-sm">Max</label>
                                                    <select name="cmbMaxAge" id="cmbMaxAge" class="form-control form-control-s-1 on-click-disabled">
                                                        <option value="-1">Any</option>
                                                        
                                                        @for($max_age = 14; $max_age <= 90; $max_age++)
                                                            <option value="{{ $max_age }}">{{ $max_age }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="alert-grey">
                                                        <i class="icon-exclamation"></i>Use both fields for range or use only one field.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-20">
                                    <label class="col-md-3 col-form-label">Preferred Retired Army Officer&nbsp;<i class="icon-question text-grey" data-container="body" data-toggle="popover" data-placement="top" data-content="Do you prefer &quot;Retired Army Officer&quot; for this position?" data-trigger="hover" data-original-title="" title=""></i></label>
                                    <div class="col-md-7">
                                        <label class="switch" id="RetiredArmyLB">                      
                                            <input name="chkRetiredArmy" id="chkRetiredArmy" type="checkbox" class="switch-input" value="1">
                                            <span class="switch-label" data-on="Yes" data-off="No"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        <div class="btn-group-right">
                                            <button type="submit" class="btn btn-success btn-lg jp1stDrftCont"
                                                actionval="0" id="HContinue">Save &
                                                Continue&nbsp;
                                                <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
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