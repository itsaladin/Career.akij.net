@extends('backend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/add-job.css') }}">
@endsection

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>Add New Job</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('admin-content')

<div class="row">
    <div class="col-xl-12 xl-100">
        <div class="card">
            {{--  <div class="card-header">
                <h5>Add New Job </h5>
            </div>  --}}
            <div class="card-body">
                    <div class="job-create-form">
                        
                        @include('backend.layouts.partials.messages')
              
                        <!-- Find a job area --> 
                        <section id="post-job-area" class="bp">
                            <div class="container">
                                <div class="single-job-post">
                                    @include('backend.pages.jobs.partials.job-options')
                                <!-- End Wizard -->

                                <form action="{{ route('admin.jobs.store') }}" method="post" enctype="multipart/form-data" id="employerAdd" data-parsley-validate>
                                    @csrf 
                                    <div class="card-content">
                                        <h5 class="mb-4">
                                            Job Primary Information
                                        </h5>
                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label"><span id="HJobTitle">Job Title&nbsp;</span><span title="Required" class="required">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" id="title" name="title" class="form-control form-control-s-1 popTips" value="" placeholder="Write Job Title" maxlength="100" data-toggle="popover" data-trigger="focus" data-content="This will appear in job search cart so write exact words. Exact job title will increase rate of your job view. <br>* Short and precise<br>* Help the job seekers to understand<br>seniority and job function easily.<br>Bad example: Manager, Executive<br>Good example: Marketing Manager, Finance Manager , Sales Executive" data-original-title="" title="">
                                            </div>
                                        </div> <!-- Job Title -->
                                        
                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label">
                                                Company <span title="Required" class="required">*</span>
                                            </label>
                                            
                                            <div class="col-md-7">
                                                <select name="employer_id" id="employer_id" class="form-control">
                                                    <option value="">Select Company</option>
                                                    @foreach ($employers as $employer)
                                                        <option value="{{ $employer->id }}">{{ $employer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> <!-- Job Title -->

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label">
                                                <span id="HNoOfVac">No. of Vacancies&nbsp;</span>
                                                <span title="Required" class="required">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="row checkbox-disabled  ">
                                                    <div class="col-md-5">
                                                        <input onkeypress="return blockNonNumbers(this, event, false, false, $('#chkVacancies').prop('checked'));" onchange="return CheckNumber(this.id, $('#chkVacancies').prop('checked'));" type="text" value="" id="txtVacancies" name="no_vacancy" maxlength="5" class="form-control form-control-s-1 popTips on-click-disabled " placeholder="Enter Vacancy Number" data-toggle="popover" data-trigger="focus" data-content="Please enter numbers only." data-original-title="" title="">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="md-checkbox">
                                                            <input name="chkVacancies" id="chkVacancies" type="checkbox">
                                                            <label for="chkVacancies" class=""><span id="HNA">&nbsp;NA</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- No of Vacancy -->

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label"><span id="HjobCategory">Job Category&nbsp;</span><span title="Required" class="required">*</span></label>
                                            <div class="col-md-7 jc-wrapper">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select name="category_id" id="" class="form-control select2">
                                                            <option value="">Please select a primary category for this job</option>
                                                            @foreach ($categories as $cat)
                                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  <!-- Job Primary Category -->

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label"><span id="HEmpStatus">Employment Status&nbsp;</span><span title="Required" class="required">*</span></label>
                                            <div class="col-md-8">
                                                
                                                @foreach ($statuses as $status)
                                                <label class="btn btn-s-1 btn-round checkbox-toggle ">
                                                    <input type="checkbox" id="EmploymentStatus{{ $status->id }}" name="status_id[]" 
                                                    value="{{ $status->id }}" class="hidden" autocomplete="off">
                                                    <i class="fa fa-check toggle "></i>&nbsp;
                                                    <span id="jobStatus{{ $status->id }}">{{ $status->name }}</span>
                                                </label>
                                                @endforeach
                                                
                                            </div>
                                        </div> <!-- Employment Status -->

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label">
                                                <span id="HAppDeadLine">Application Deadline&nbsp;</span>
                                                <span title="Required" class="required">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="inner-addon left-addon">
                                                            <input type="text" autocomplete="off" class="form-control form-control-s-1 input-group date" id="txtDeadline" name="deadline" value="" placeholder="Select Application Deadline"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- Application Deadline -->
                                        
                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label"><span id="HResRecOpt">Resume Receiving Option&nbsp;</span><span title="Required" class="required">*</span></label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-12">
                
                                                        <label class="btn btn-s-1 btn-round checkbox-toggle">
                                                            <input class="hidden" autocomplete="off" id="chkCVReceiveOptionApply" name="resume_receiving_option_online" value="1" type="checkbox">
                                                            <i class="fa fa-check toggle"></i>
                                                            <span id="HAppOnline">&nbsp;Apply Online</span>
                                                        </label>
                
                                                        <div class="btn-group checkbox-toggle-group resume-receiving-tab" id="cvReceivingOption">
                                                            <input type="hidden" name="resume_receiving_option" id="resume_receiving_option" value="">

                                                            <label class="btn btn-s-1 btn-round checkbox-toggle cvr-email" type="button" data-toggle="collapse" data-target="#collapseCvEmail">
                                                                <input type="checkbox" class="hidden" name="" id="chkCVReceiveOptionEmail" value="1" autocomplete="off">
                                                                <i class="fa fa-check toggle "></i><span class="HEmail">&nbsp;Email</span>
                                                            </label>

                                                            <label class="btn btn-s-1 btn-round checkbox-toggle cvr-hc" type="button" data-toggle="collapse" data-target="#collapseHC">
                                                                <input type="checkbox" class="hidden" name="" id="chkCVReceiveOptionHard" value="2" autocomplete="off">
                                                                <i class="fa fa-check toggle "></i><span class="HHardCopy">&nbsp;Hard Copy</span>
                                                            </label>

                                                            <label class="btn btn-s-1 btn-round checkbox-toggle cvr-wi" type="button" data-toggle="collapse" data-target="#collapseWI">
                                                                <input type="checkbox" class="hidden" name="" id="chkCVReceiveOptionWalk" value="3" autocomplete="off">
                                                                <i class="fa fa-check toggle "></i><span class="HWalkInInterv">&nbsp;Walk in Interview</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="row resume-receiving-fields">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0">
                                                            <div class="collapse " id="collapseCvEmail" aria-expanded="false">
                                                                <label for="" class="col-form-label label-sm HEmail">&nbsp;Email</label>
                                                                <input type="email" class="form-control form-control-s-1" name="AppliedEmail" id="AppliedEmail" value="" maxlength="60" placeholder="Write Email Address">
                                                            {{-- 
                                                                <input type="hidden" class="form-control form-control-s-1" name="CompanyEmail" id="CompanyEmail" value="career@akij.net" placeholder="Write Email Address">
                                                                <input type="hidden" class="form-control form-control-s-1" name="hidCompanyEmail" id="hidCompanyEmail" value="career@akij.net">
                                                            --}}
                                                            </div>
                
                                                        </div>
                                                    </div>
                
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0">
                
                                                            <div class="collapse " id="collapseHC" aria-expanded="false">
                                                                <label for="" class="col-form-label label-sm HHardCopy">&nbsp;Hard Copy</label>
                                                                <textarea name="textHardcopy" id="txtHardCopy" maxlength="4000" rows="6" class="form-control form-control-s-1 popTips" placeholder="Write Information for Hard Copy" data-toggle="popover" data-trigger="focus" data-content="Please write only hard copy related instruction ex. <br>Company address to send resume, photo related instruction etc." data-original-title="" title=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0">
                
                                                            <div class="collapse " id="collapseWI" aria-expanded="false">
                                                                <label for="" class="col-form-label label-sm HWalkInInterv">&nbsp;Walk in Interview</label>
                                                                <textarea name="textWalkingInterview" maxlength="4000" id="txtWalkingInterview" rows="6" class="form-control form-control-s-1 popTips" placeholder="Write Information for Walk in Interview" data-toggle="popover" data-trigger="focus" data-content="Please write precisely Interview date, address and documents to bring at interview place or others instructions." data-original-title="" title=""></textarea> 
                
                                                            </div>
                
                                                        </div>
                                                    </div>
                
                                                </div>
                                            </div>
                                        </div> <!-- Resume receving options -->

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label" id="HSpJobSeek">Special Instruction for Job Seekers</label>
                                            <div class="col-md-7">
                                                <textarea name="special_instruction" id="special_instruction" cols="30" rows="4" maxlength="4000" class="form-control form-control-s-1 popTips" placeholder="Write Special Instruction for Job Seekers" data-toggle="popover" data-trigger="focus" data-content="* Precise &amp; meaningful.<br>* Make your instruction explicit so that job seekers can apply easily.<br>Example: Please mail your CV with cover letter and write &quot;xyz&quot; as subject of your mail." data-original-title="" title=""></textarea>
                                            </div>
                
                                            <div class="col-md-2">
                                                <a href="javascript:void(0)" class="btn btn-s-2 jobboard-import " width="60%" height="80%" data-request="applyinstruction">
                                                    <i class="icon-download"></i>&nbsp;Import
                                                </a>
                                            </div>
                                        </div> <!-- Special Instruction -->

                                        <div class="form-group row mb-20">
                                            <label class="col-md-3 col-form-label" id="HPhotoRes">
                                                Photograph (Enclose with resume)
                                            </label>
                                            <div class="col-md-7">
                                                <label class="switch" id="PhotographLB">
                                                    <input name="is_photograph_enclose" id="Photograph" value="1" type="checkbox" class="switch-input">
                                                    <span class="switch-label" data-on="Yes" data-off="No"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                            </div>
                                        </div> <!-- Photograph included -->

                                        <div class="card-footer">
                                            <div class="float-right">
                                                <div class="btn-group-right">
                                                    <button href="javascript:void(0)" type="submit" class="btn btn-success btn-lg jp1stDrftCont" actionval="0" id="HContinue">Save & Continue&nbsp;
                                                        <i class="fa fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Content -->
                                <div class="card-content">
                                    {{--  <form action="Job_Posting_Board_step2.asp" method="post" id="frmJObposting1st" name="frmJObposting1st">
                                        <input type="hidden" name="RepostJoBNo" id="RepostJoBId" value="">
                                        <input type="hidden" name="JobNo" id="JobNo" value="">
                                        <input type="hidden" name="vType" id="vType" value="">                    
                                        <input type="hidden" name="rType" id="rType" value="">
                                        <input type="hidden" name="hdJobPublishdate" id="hdJobPublishdate" value="">
                                        <input type="hidden" name="frmsetmylanguage" id="frmsetmylanguage" value="EN">
                                        <input type="hidden" name="processType" id="processType" value="I">
                                        <input type="hidden" name="jobCategory" id="jobCategory" value="0">
                                    </form>  --}}
                                </div>
                                <!-- Content -->

                            </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/js/pages/job-post.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
@include('backend.pages.jobs.partials.job-posting-js');
@endsection