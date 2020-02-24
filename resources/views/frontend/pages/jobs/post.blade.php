@extends('frontend.layouts.app')

@section('title')
Post Job | {{ config('app.name') }}
@endsection


@section('styles')

@endsection

@section('content')

<!-- Find a job area --> 
<section id="post-job-area" class="bp">
    <div class="container">
        <div class="single-job-post">

            <h3 class="job-post-title">
                Post New Job
            </h3>

            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Primary Information</div>
              </div>

              <div class="bs-wizard-step complete disabled">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">More Job Information</div>
              </div>

              <div class="bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Candidate Requirements</div>
              </div>

              <div class="bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Company Info Visibility
                  </div>
              </div>

              <div class="bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Matching Criteria
                  </div>
              </div>

              <div class="bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Preview
                  </div>
              </div>

              <div class="bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">&nbsp; </div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Complete
                  </div>
              </div>

          </div>
          <!-- End Wizard -->

          <!-- Content -->
          <div class="card-content">


            <input type="hidden" id="txtRegionalJob" name="txtRegionalJob" value="0">


            <!-- Job Classification -->

            <input type="hidden" id="JobClassification3" name="JClassification" value="J">

            <input type="Hidden" id="PostThisJobAsHotJob" name="PostThisJobAsHotJob" value="0">
            <div class="form-group row mb-20">
               <label class="col-md-3 col-form-label"><span id="HJobTitle">Job Title&nbsp;</span><span title="Required" class="required">*</span></label>
               <div class="col-md-7">

                  <input type="text" id="txtJobTitle" name="txtJobTitle" class="form-control form-control-s-1 popTips" value="" placeholder="Write Job Title" maxlength="100" data-toggle="popover" data-trigger="focus" data-content="This will appear in job search cart so write exact words. Exact job title will increase rate of your job view. <br>* Short and precise<br>* Help the job seekers to understand<br>seniority and job function easily.<br>Bad example: Manager, Executive<br>Good example: Marketing Manager, Finance Manager , Sales Executive" data-original-title="" title="">
                  <span onclick="changeLanguage()" id="bngStatus"></span>
              </div>
          </div>
          <div class="form-group row mb-20">
           <label class="col-md-3 col-form-label"><span id="HNoOfVac">No. of Vacancies&nbsp;</span><span title="Required" class="required">*</span></label>
           <div class="col-md-7">
              <div class="row checkbox-disabled  ">
                 <div class="col-md-5">
                    <input onkeypress="return blockNonNumbers(this, event, false, false, $('#chkVacancies').prop('checked'));" onchange="return CheckNumber(this.id, $('#chkVacancies').prop('checked'));" type="text" value="" id="txtVacancies" name="txtVacancies" maxlength="5" class="form-control form-control-s-1 popTips on-click-disabled " placeholder="Enter Vacancy Number" data-toggle="popover" data-trigger="focus" data-content="Please enter numbers only." data-original-title="" title="">
                </div>
                <div class="col-md-7">
                    <div class="md-checkbox">
                       <input name="chkVacancies" id="chkVacancies" type="checkbox">
                       <label for="chkVacancies" class=""><span id="HNA">&nbsp;NA</span></label>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="form-group row mb-20">
       <label class="col-md-3 col-form-label"><span id="HjobCategory">Job Category&nbsp;</span><span title="Required" class="required">*</span></label>


       <div class="col-md-7 jc-wrapper">

        <div class="row">
            <div class="col-md-12">
                <select name="category" id="" class="form-control select2">
                    <option value="1">Accounting/Finance</option>
                </select>
          {{-- <div id="jc-functional-list" class="radio-list jc-functional-list  ">


            <label class="radio"><input id="CatID1" value="1" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Accounting/Finance</label>

            <label class="radio"><input id="CatID26" value="26" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Agro (Plant/Animal/Fisheries)</label>

            <label class="radio"><input id="CatID2" value="2" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Bank/Non-Bank Fin. Institution</label>

            <label class="radio"><input id="CatID21" value="21" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Beauty Care/ Health &amp; Fitness</label>

            <label class="radio"><input id="CatID3" value="3" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Commercial/Supply Chain</label>

            <label class="radio"><input id="CatID16" value="16" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Customer Support/Call Centre</label>

            <label class="radio"><input id="CatID15" value="15" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Data Entry/Operator/BPO</label>

            <label class="radio"><input id="CatID18" value="18" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Design/Creative</label>

            <label class="radio"><input id="CatID25" value="25" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Driving/Motor Technician</label>

            <label class="radio"><input id="CatID4" value="4" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Education/Training</label>

            <label class="radio"><input id="CatID23" value="23" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Electrician/ Construction/ Repair</label>

            <label class="radio"><input id="CatID5" value="5" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Engineer/Architect</label>

            <label class="radio"><input id="CatID6" value="6" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Garments/Textile</label>

            <label class="radio"><input id="CatID7" value="7" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>General Management/Admin</label>

            <label class="radio"><input id="CatID20" value="20" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Hospitality/ Travel/ Tourism</label>

            <label class="radio"><input id="CatID17" value="17" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>HR/Org. Development</label>

            <label class="radio"><input id="CatID8" value="8" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>IT/Telecommunication</label>

            <label class="radio"><input id="CatID22" value="22" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Law/Legal</label>

            <label class="radio"><input id="CatID9" value="9" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Marketing/Sales</label>

            <label class="radio"><input id="CatID10" value="10" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Media/Advertisement/Event Mgt.</label>

            <label class="radio"><input id="CatID11" value="11" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Medical/Pharma</label>

            <label class="radio"><input id="CatID12" value="12" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>NGO/Development</label>

            <label class="radio"><input id="CatID19" value="19" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Production/Operation</label>

            <label class="radio"><input id="CatID13" value="13" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Research/Consultancy</label>

            <label class="radio"><input id="CatID14" value="14" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Secretary/Receptionist</label>

            <label class="radio"><input id="CatID24" value="24" type="radio" name="Category"><span class="outer"><span class="inner"></span></span>Security/Support Service</label>

            <label class="radio"><input id="CatID-10" type="radio" value="-10" name="Category"><span class="outer"><span class="inner"></span></span>Others</label>
        </div> --}}
    </div>
</div>
</div>



</div> 

<div class="form-group row mb-20">
   <label class="col-md-3 col-form-label"><span id="HEmpStatus">Employment Status&nbsp;</span><span title="Required" class="required">*</span></label>
   <div class="col-md-7">
      <label class="btn btn-s-1 btn-round checkbox-toggle ">
        <input type="checkbox" id="EmploymentStatus1" name="EmploymentStatus" value="FullTime" class="hidden" autocomplete="off"><i class="fa fa-check toggle "></i>&nbsp;<span id="HFullTime">Full Time</span>
    </label>

    <label class="btn btn-s-1 btn-round checkbox-toggle ">
        <input type="checkbox" id="EmploymentStatus2" name="EmploymentStatus" value="PartTime" class="hidden" autocomplete="off"><i class="fa fa-check toggle "></i>&nbsp;<span id="HPartTime">Part Time</span>
    </label>

    <label class="btn btn-s-1 btn-round checkbox-toggle ">
        <input type="checkbox" id="EmploymentStatus3" name="EmploymentStatus" value="Contract" class="hidden" autocomplete="off"><i class="fa fa-check toggle "></i>&nbsp;<span id="HContractual">Contractual</span>
    </label>

    <label class="btn btn-s-1 btn-round checkbox-toggle ">
        <input type="checkbox" id="EmploymentStatus4" name="EmploymentStatus" value="Intern" class="hidden" autocomplete="off"><i class="fa fa-check toggle "></i>&nbsp;<span id="HInternship">Internship</span>
    </label>

    <label id="EmploymentStatus5" class="btn btn-s-1 btn-round checkbox-toggle ">
        <input type="checkbox" name="EmploymentStatus" value="Freelance" class="hidden" autocomplete="off"><i class="fa fa-check toggle "></i>&nbsp;<span id="HFreelance">Freelance</span>
    </label>
</div>
</div>
<div class="form-group row mb-20">
   <label class="col-md-3 col-form-label">
    <span id="HAppDeadLine">Application Deadline&nbsp;</span>
    <span title="Required" class="required">*</span>
</label>
<div class="col-md-7">
  <div class="row">
     <div class="col-md-5">
        <div class="inner-addon left-addon">
           <input type="text" class="form-control form-control-s-1 input-group date" id="txtDeadline" name="txtDeadline" value="" placeholder="Select Application Deadline"/>
       </div>
   </div>
   <div class="col-md-7">

   </div>
</div>
</div>
</div>


<div class="form-group row mb-20">
   <label class="col-md-3 col-form-label"><span id="HResRecOpt">Resume Receiving Option&nbsp;</span><span title="Required" class="required">*</span></label>

   <div class="col-md-7">

    <div class="row">
        <div class="col-md-12">

            <label class="btn btn-s-1 btn-round checkbox-toggle">
                <input class="hidden" autocomplete="off" id="chkCVReceiveOptionApply" name="chkCVReceiveOption" value="1" type="checkbox">
                <i class="fa fa-check toggle"></i><span id="HAppOnline">&nbsp;Apply Online</span>
            </label>

            <div class="btn-group checkbox-toggle-group resume-receiving-tab" id="cvReceivingOption">
                <label class="btn btn-s-1 btn-round checkbox-toggle cvr-email" type="button" data-toggle="collapse" data-target="#collapseCvEmail">
                    <input type="checkbox" class="hidden" name="chkCVReceiveOption" id="chkCVReceiveOptionEmail" value="2" autocomplete="off">
                    <i class="fa fa-check toggle "></i><span class="HEmail">&nbsp;Email</span>
                </label>
                <label class="btn btn-s-1 btn-round checkbox-toggle cvr-hc" type="button" data-toggle="collapse" data-target="#collapseHC">
                    <input type="checkbox" class="hidden" name="chkCVReceiveOption" id="chkCVReceiveOptionHard" value="3" autocomplete="off">
                    <i class="fa fa-check toggle "></i><span class="HHardCopy">&nbsp;Hard Copy</span>
                </label>
                <label class="btn btn-s-1 btn-round checkbox-toggle cvr-wi" type="button" data-toggle="collapse" data-target="#collapseWI">
                    <input type="checkbox" class="hidden" name="chkCVReceiveOption" id="chkCVReceiveOptionWalk" value="4" autocomplete="off">
                    <i class="fa fa-check toggle "></i><span class="HWalkInInterv">&nbsp;Walk in Interview</span>
                </label>
            </div>

        </div>
    </div>
    <div class="row resume-receiving-fields">


     <div class="col-md-12">
        <div class="form-group mb-0">
            <!-- -- 0-->
            <div class="collapse " id="collapseCvEmail" aria-expanded="false">
                <label for="" class="col-form-label label-sm HEmail">&nbsp;Email</label>
                <input type="email" class="form-control form-control-s-1" name="AppliedEmail" id="AppliedEmail" value="" maxlength="60" placeholder="Write Email Address">

                <input type="hidden" class="form-control form-control-s-1" name="CompanyEmail" id="CompanyEmail" value="career@akij.net" placeholder="Write Email Address">
                <input type="hidden" class="form-control form-control-s-1" name="hidCompanyEmail" id="hidCompanyEmail" value="career@akij.net">

                <div class="md-checkbox">
                    <input name="emailoptionUseFormate" value="1" id="emailoptionUseFormate" checked="checked" type="checkbox">
                    <label for="emailoptionUseFormate" class=""><span id="HNA">&nbsp;Applicant can use bdjobs email system</span></label>
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-0">

            <div class="collapse " id="collapseHC" aria-expanded="false">
                <label for="" class="col-form-label label-sm HHardCopy">&nbsp;Hard Copy</label>
                <textarea name="txtHardCopy" id="txtHardCopy" maxlength="4000" rows="6" class="form-control form-control-s-1 popTips" placeholder="Write Information for Hard Copy" data-toggle="popover" data-trigger="focus" data-content="Please write only hard copy related instruction ex. <br>Company address to send resume, photo related instruction etc." data-original-title="" title=""></textarea>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-0">

            <div class="collapse " id="collapseWI" aria-expanded="false">
                <label for="" class="col-form-label label-sm HWalkInInterv">&nbsp;Walk in Interview</label>
                <textarea name="txtWalkingInterview" maxlength="4000" id="txtWalkingInterview" rows="6" class="form-control form-control-s-1 popTips" placeholder="Write Information for Walk in Interview" data-toggle="popover" data-trigger="focus" data-content="Please write precisely Interview date, address and documents to bring at interview place or others instructions." data-original-title="" title=""></textarea> 
            </div>

        </div>
    </div>

</div>
</div>
</div>

<div class="form-group row mb-20">
   <label class="col-md-3 col-form-label" id="HSpJobSeek">Special Instruction for Job Seekers</label>

   <div class="col-md-7">
      <textarea name="SpecialNotesforApply" id="SpecialNotesforApply" cols="30" rows="4" maxlength="4000" class="form-control form-control-s-1 popTips" placeholder="Write Special Instruction for Job Seekers" data-toggle="popover" data-trigger="focus" data-content="* Precise &amp; meaningful.<br>* Make your instruction explicit so that job seekers can apply easily.<br>Example: Please mail your CV with cover letter and write &quot;xyz&quot; as subject of your mail." data-original-title="" title=""></textarea>
  </div>

  <div class="col-md-2">
      <a href="javascript:void(0)" class="btn btn-s-2 jobboard-import " width="60%" height="80%" data-request="applyinstruction">
          <i class="icon-download"></i>&nbsp;Import
      </a>
  </div>

</div>
<div class="form-group row mb-20">
   <label class="col-md-3 col-form-label" id="HPhotoRes">
    Photograph (Enclose with resume)
</label>
<div class="col-md-7">
  <label class="switch" id="PhotographLB">
      <input name="Photograph" id="Photograph" value="1" type="checkbox" class="switch-input">
      <span class="switch-label" data-on="Yes" data-off="No"></span>
      <span class="switch-handle"></span>
  </label>
</div>
</div>

<div class="card-footer">
    <div class="float-right">
     <div class="btn-group-right">
        <a href="javascript:void(0)" class="btn btn-grey btn-lg" actionval="1" id="HSaveButton">
            <i class="fa fa-check"></i> &nbsp;Save </a>

            <a href="javascript:void(0)" class="btn btn-success btn-lg jp1stDrftCont" actionval="0" id="HContinue"> Continue&nbsp;
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<form action="Job_Posting_Board_step2.asp" method="post" id="frmJObposting1st" name="frmJObposting1st">
    <input type="hidden" name="RepostJoBNo" id="RepostJoBId" value="">
    <input type="hidden" name="JobNo" id="JobNo" value="">
    <input type="hidden" name="vType" id="vType" value="">                    
    <input type="hidden" name="rType" id="rType" value="">
    <input type="hidden" name="hdJobPublishdate" id="hdJobPublishdate" value="">
    <input type="hidden" name="frmsetmylanguage" id="frmsetmylanguage" value="EN">
    <input type="hidden" name="processType" id="processType" value="I">
    <input type="hidden" name="jobCategory" id="jobCategory" value="0">
</form>
</div>
<!-- Content -->

</div>
</div>
</div>
</section> 
<!-- Find a job area --> 


@endsection

@section('scripts')
<script src="{{ asset('public/js/pages/job-post.js') }}"></script>
<script>


// Experience tab enabled/ disabled
$(document).on('click', '.exp-tab .exp', function() {
    $('.experience-filter').removeClass('row-disabled');
});
$(document).on('click', '.exp-tab .no-exp', function() {
    $('.experience-filter').addClass('row-disabled');
    $('.experience-filter select').val('-1');
    $('.experience-filter .well').remove();
    $('#hidSelectedExperience,#hidSelectedExperienceName,#hidSelectedBusiness,#hidSelectedBusinessName').val('');
    //$('#hidSelectedExperience').val('');
    //$('#hidSelectedExperienceName').val('');
    $('.experience-filter').find('input').removeAttr('checked');

    //$('.area-of-experience-items .well').remove();
});


// Radio Salary and Lunch toggle button
$(document).on('click', '.checkbox-toggle-group .btn', function() {
    $(this).prevAll('.btn').find('input').removeAttr('checked');
    $(this).nextAll('.btn').find('input').removeAttr('checked');
    $(this).parents('.checkbox-toggle-group').find('.btn.active').removeClass('active');
});

var strConfimationMessage = "";
strConfimationMessage += "<div class=\"confirmation-message\">";
strConfimationMessage += "    <button type=\"button\" class=\"close\"><span aria-hidden=\"true\">&times;<\/span><\/button>";
strConfimationMessage += "    <span id=\"\">Job information has been saved.<\/span>";
strConfimationMessage += "<\/div>";

function blockNonNumbers(obj, e, allowDecimal, allowNegative, isDependent) {
    var key;
    var isCtrl = false;
    var keychar;
    var reg;

    if (isDependent == false) {
        if (window.event) {
            key = e.keyCode;
            isCtrl = window.event.ctrlKey;
        } else if (e.which) {
            key = e.which;
            isCtrl = e.ctrlKey;
        }

        if (isNaN(key)) return true;

        keychar = String.fromCharCode(key);

        // CHECK FOR BACKSPACE OR DELETE, Ctrl 
        if (key == 8 || isCtrl) {
            return true;
        }

        reg = /\d/;
        var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
        var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;

        return isFirstN || isFirstD || reg.test(keychar);
    }
}

function CheckNumber(svalue, isDependent) {

    var val = document.getElementById(svalue).value;
    var l = val.length;
    var blnState = false;
    //var isChkval = $('#chkVacancies').prop('checked');

    if (isDependent == false) {
        for (i = 0; i < l; i++) {
            if (!(val.charCodeAt(i) >= 48 && val.charCodeAt(i) <= 57))
                blnState = true;

        }
        if (blnState == true) {
            alert("Please enter numeric value only.");
            document.getElementById(svalue).value = "";
            document.getElementById(svalue).focus();
            return false;
        }
    }
}


/*$(document).on('click','#optExperienceNotRequired input[type=checkbox]', function(){
    $(this).parents('.card-content').find('.slider-container').toggleClass('disabled');
});*/
$(document).on('click', 'input#optExperienceNotRequired[type=checkbox]', function() {
    $(this).parents('.form-group').find('.slider-container').toggleClass('disabled');
    $(this).parents('.form-group').find('.salary-type').toggleClass('disabled');
    $(this).parents('.card-content').find('#areaExperiance').toggleClass('disabled');
    $(this).parents('.card-content').find('#areaBusiness').toggleClass('disabled');
});

function UpdateChangedFields(fieldNumber) {
    var previousFieldNumbers = document.getElementById("changedFields").value;
    var arrPreviousFieldNumbers = previousFieldNumbers.split(",");
    if (!inArray(arrPreviousFieldNumbers, fieldNumber))
        document.getElementById("changedFields").value = previousFieldNumbers + "," + fieldNumber;
    var input = document.querySelectorAll('input[type=text],textarea');
    for (var i = 0; i < input.length; i++) {

        (input[i]);
    }
}

function inArray(array, str) {
    var isExist = false;
    for (var i = 0; i < array.length; i++) {
        if (array[i] == str) {
            isExist = true;
            break;
        }
    }
    return isExist;
}

// Device control
$(document).on('click', '.btn-mobile', function() {
    $('.device-container').removeClass('desktop').addClass('mobile');
});

$(document).on('click', '.btn-desktop', function() {
    $('.device-container').removeClass('mobile').addClass('desktop');
});


// SEARCH VIEW AND DETAILS VIEW TOGGLE FOR DESKTOP VIEW
$(document).on('click', '.btn-details-view', function() {
    $('.device-container').find('.details-view').removeClass('hidden');
    $('.device-container').find('.search-view').addClass('hidden');
});

$(document).on('click', '.btn-search-view', function() {
    $('.device-container').find('.search-view').removeClass('hidden');
    $('.device-container').find('.details-view').addClass('hidden');
});
$('.popTips').popover({ html: true });
// End Device control
// DISABLING POPOVER IN MOBILE
$(document).ready(function() {
    var winWidth = window.innerWidth;
    if (winWidth <= 767) {
        $(".container").on("mouseenter", ".popTips", function() {
            $(this).popover('destroy');
        });
    }
});
// End DISABLING POPOVER IN MOBILE

</script>
@endsection