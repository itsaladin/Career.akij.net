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

                                <form action="{{ route('admin.jobs.update_step2', $job->id) }}" method="post"
                                    enctype="multipart/form-data" id="jobAdd" data-parsley-validate>
                                    @csrf

                                    <h5 class="mb-4">
                                        More Job Information
                                    </h5>

                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Job Level&nbsp;<span title="Required"
                                                class="required">*</span></label>
                                        <div class="col-md-7">

                                            <div class="btn-group btn-group-toggle radio-toggle" data-toggle="buttons">
                                                @foreach ($levels as $level)
                                                <label
                                                    class="btn btn-primary mr-2 {{ $job->job_level_id == $level->id ? 'active' : '' }}">
                                                    <input type="radio" name="job_level_id" id="level{{ $level->id }}"
                                                        autocomplete="off" checked value="{{ $level->id }}">
                                                    {{ $level->name }}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Job Context</label>
                                        <div class="col-md-7">
                                            <textarea name="job_context" id="JobContext" maxlength="4000" cols="30"
                                                rows="4" class="form-control form-control-s-1 popTips "
                                                placeholder="Write Job Context" data-toggle="popover"
                                                data-trigger="focus"
                                                data-content="* Write precisely terms or conditions of your job.<br>* Write whether this job is project based or contractual here.<br>Example: Contract Duration: 6- months."
                                                data-original-title="" title="">{!! $job->job_context !!}</textarea>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-s-2 jobboard-import" width="60%"
                                                height="80%" data-request="context">
                                                <i class="icon-download"></i>&nbsp;Import
                                            </a>
                                        </div>

                                    </div>



                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Job Responsibilities&nbsp;<span
                                                title="Required" class="required">*</span></label>
                                        <div class="col-md-7">
                                            <textarea name="job_responsibility" id="JobResponsibilities" cols="30"
                                                rows="4" class="form-control form-control-s-1 popTips "
                                                placeholder="Write Job Responsibilities" data-toggle="popover"
                                                data-trigger="focus"
                                                data-content="Candidates read job responsibilities to understand job role.<br>*Describe task: daily duties, key tasks, and major responsibilities.<br>*Briefly explain where this role fits within the team or company.<br>*Provide information on career development.<br>*Describe working area if needed."
                                                data-original-title=""
                                                title="">{!! $job->job_responsibility !!}</textarea>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-s-2 jobboard-import" width="60%"
                                                height="80%" data-request="description">
                                                <i class="icon-download"></i>&nbsp;Import
                                            </a>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Job Location&nbsp;<span title="Required"
                                                class="required">*</span></label>

                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group btn-group-toggle radio-toggle"
                                                        data-toggle="buttons">
                                                        <label class="btn btn-primary mr-2 active">
                                                            <input type="radio" value="1" name="job_location"
                                                                id="job_location1" autocomplete="off" checked>
                                                            Inside Bangladesh
                                                        </label>

                                                        <label class="btn btn-primary mr-2">
                                                            <input type="radio" value="0" name="job_location"
                                                                id="job_location0" autocomplete="off">
                                                            Outside Bangladesh
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input name="job_location_details" id="job_location_details"
                                                            class="form-control mt-1 form-control-s-1 no-border txt-add-locatio ui-autocomplete-input"
                                                            placeholder="Write Job Location Details " type="text"
                                                            autocomplete="off"
                                                            value="{!! $job->job_location_details !!}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Salary&nbsp;<span title="Required"
                                                class="required">*</span></label>
                                        <div class="col-md-7">
                                            <div class="row checkbox-disabled  clicked ">
                                                <div class="col-md-3 salary-min">
                                                    <input type="number" id="MinSalary" maxlength="7" name="min_salary"
                                                        class="form-control form-control-s-1 on-click-disabled"
                                                        placeholder="Minimum Salary" value="{{ $job->min_salary }}"
                                                        {{ $job->is_salary_negotiable ? 'disabled' : '' }}><span
                                                        id="errmsg"></span>
                                                </div>
                                                <div class="col-md-3 salary-max">
                                                    <input type="number" id="MaxSalary" maxlength="7" name="max_salary"
                                                        class="form-control form-control-s-1 on-click-disabled"
                                                        placeholder="Maximum Salary" value="{{ $job->max_salary }}"
                                                        {{ $job->is_salary_negotiable ? 'disabled' : '' }}><span
                                                        id="errmsg2"></span>
                                                </div>
                                                <div class="col-md-3 salary-month">
                                                    <select name="salary_type" id="SalaryPaid"
                                                        class="form-control form-control-s-1 on-click-disabled"
                                                        {{ $job->is_salary_negotiable ? 'disabled' : '' }}>
                                                        <option value="1"
                                                            {{ $job->salary_type == 1 ? 'selected' : '' }}>Hourly
                                                        </option>
                                                        <option value="2"
                                                            {{ $job->salary_type == 2 ? 'selected' : '' }}>Daily
                                                        </option>
                                                        <option value="3"
                                                            {{ $job->salary_type == 3 ? 'selected' : '' }}>Monthly
                                                        </option>
                                                        <option value="4"
                                                            {{ $job->salary_type == 4 ? 'selected' : '' }}>Yearly
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="md-checkbox">
                                                        <input name="is_salary_negotiable" id="SalaryNegotiable"
                                                            type="checkbox"
                                                            class="{{ $job->is_salary_negotiable ? 'clicked' : '' }}"
                                                            {{ $job->is_salary_negotiable ? 'checked' : '' }} value="1">
                                                        <label for="SalaryNegotiable" class="">Negotiable</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-group row mb-20">
                                        <label class="col-md-3 col-form-label">Additional Salary Info.</label>
                                        <div class="col-md-7">
                                            <textarea name="additional_salary_info" maxlength="550" id="SalaryDetails"
                                                cols="30" rows="4" class="form-control form-control-s-1 popTips"
                                                placeholder="Write Additional Salary Information" data-toggle="popover"
                                                data-trigger="focus"
                                                data-content="* Do not write benefits or compensation in this field<br>* Write exactly that is related to employee's salary"
                                                data-original-title=""
                                                title="">{!! $job->additional_salary_info !!}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-20 compensation">
                                        <label class="col-md-3 col-form-label">Compensation &amp; other benefits</label>

                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">

                                                    <div class="btn-group btn-group-toggle radio-toggle"
                                                        data-toggle="buttons">
                                                        <label
                                                            class="btn btn-primary no-options mr-2 {{ !$job->has_benefits ? 'active' : '' }}">
                                                            <input type="radio" value="0" name="has_benefits"
                                                                id="optOtherBefits1" autocomplete="off"
                                                                {{ !$job->has_benefits ? 'checked' : '' }}>
                                                            N/A
                                                        </label>

                                                        <label
                                                            class="btn btn-primary all-options mr-2 {{ $job->has_benefits ? 'active' : '' }}">
                                                            <input type="radio" value="1" name="has_benefits"
                                                                id="optOtherBefits2" autocomplete="off"
                                                                {{ $job->has_benefits ? 'checked' : '' }}>
                                                            Select Option
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            @foreach ($benefit_types as $type)
                                            <div class="row  {{ $job->has_benefits ? 'row-enabled' : 'row-disabled' }}">
                                                <div class="col-md-12 mt-10">
                                                    @if ($loop->index != 0)
                                                    <h6>{{ $type->name }}</h6>
                                                    @endif
                                                    @foreach ($type->benefits as $bnft)
                                                    <label class="btn btn-s-1 btn-round checkbox-toggle">
                                                        <input type="checkbox" id="OtherBebefits{{ $bnft->id }}"
                                                            name="job_benefits[]" value="{{ $bnft->id }}" class="hidden"
                                                            autocomplete="off"
                                                            {{ App\Models\Job::hasBenefit($job->id, $bnft->id) ? 'checked' : '' }}>
                                                        <i class="fa fa-check toggle"></i>&nbsp;{{ $bnft->name }}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div> <!-- row -->
                                            @endforeach

                                            <div class="row {{ $job->has_benefits ? 'row-enabled' : 'row-disabled' }}">
                                                <div class="col-md-12 mt-10">
                                                    <h6>Festival Bonus</h6>
                                                    <select name="festival_bonus" id="txtFestivalBonus"
                                                        class="form-control form-control-s-1" data-value="16"
                                                        data-id="">
                                                        <option value="">Select number of festival bonus</option>
                                                        <option value="1"
                                                            {{ $job->festival_bonus == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2"
                                                            {{ $job->festival_bonus == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3"
                                                            {{ $job->festival_bonus == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4"
                                                            {{ $job->festival_bonus == 4 ? 'selected' : '' }}>4</option>
                                                    </select>
                                                </div>
                                            </div> <!-- row -->

                                            <div class="row {{ $job->has_benefits ? 'row-enabled' : 'row-disabled' }}">
                                                <div class="col-md-12 mt-10">
                                                    <h6>Others </h6>
                                                    <textarea name="other_bonus" id="other_bonus" cols="30" rows="3"
                                                        class="form-control">{!! $job->other_bonus !!}</textarea>
                                                </div>
                                            </div> <!-- row -->
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
<script src="{{ asset('public/js/pages/job-post.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous">
</script>
@include('backend.pages.jobs.partials.job-posting-js');
@endsection