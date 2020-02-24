@extends('backend.layouts.app')

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>Add New Employer</h3>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('admin-content')

<div class="row">
    <div class="col-xl-12 xl-100">
        <div class="card">
            <div class="card-header">
                <h5>Edit Employer - <span class="badge badge-info badge-lg">{{ $employer->name }}</span></h5>
            </div>
            <div class="card-body">
                    <div class="employer-create-form">
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('admin.employers.update', $employer->id) }}" method="post" enctype="multipart/form-data" id="employerAdd" data-parsley-validate>
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Name <span class="text-danger">*</span></label>
                                        <input class="form-control btn-square" id="name" name="name" type="text" placeholder="Enter Company Name" value="{{ $employer->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_bn">Company Name (Bangla)</label>
                                        <input class="form-control btn-square" id="name_bn" name="name_bn" type="text" placeholder="Enter Company Name in Bangla" value="{{ $employer->name_bn }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name_bn">Company Address</label>
                                        <select name="country_id" id="country_id" class="form-control country_select2" required>
                                            <option></option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" {{ $employer->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="district_id" id="district_id" class="form-control district_select2" required>
                                            <option></option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" {{ $employer->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="upazilla_id" id="upazilla_id" class="form-control upazilla_select2" required>
                                            <option></option>
                                            @foreach ($upazillas as $upazilla)
                                                <option value="{{ $upazilla->id }}" {{ $employer->upazilla_id == $upazilla->id ? 'selected' : '' }}>{{ $upazilla->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="address" id="address"  rows="3" class="form-control" placeholder="Address in English" required maxlength="190">{{ $employer->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="address_bn" id="address_bn"  rows="3" class="form-control" placeholder="Address in Bangla" required maxlength="190">{{ $employer->address_bn }}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Industry Primary Category <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control category_select2" required>
                                            <option></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"  {{ $employer->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label for="types">Industry Types <span class="text-info font-10">(optional)</span></label>
                                        <select name="types[]" id="types" class="form-control types_select_multi" multiple>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}" {{ $employer->hasType($employer->id, $type->id) ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="business_description">Business Description</label>
                                        <textarea name="business_description" id="business_description"  rows="3" class="form-control" placeholder="Write Business Description" required maxlength="190">{{ $employer->business_description }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_trade_licence">Business / Trade License No </label>
                                        <input class="form-control btn-square" name="business_trade_licence" id="business_trade_licence" type="text" value="{{  $employer->business_trade_licence }}" placeholder="Type Business / Trade License No" maxlength="190">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_rl_no">RL No (For Recreuting Agency)</label>
                                        <input class="form-control btn-square" name="business_rl_no" id="business_rl_no" type="number" value="{{ $employer->business_rl_no }}" placeholder="Enter RL No" maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="website">Website URL</label>
                                        <input class="form-control btn-square" name="website" id="website" type="url" value="{{  $employer->website }}" placeholder="Enter company website URL" maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo">Company Logo</label>
                                        <input class="form-control btn-square" name="logo" id="logo" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePassword" id="collapsePasswordButton" aria-expanded="false" aria-controls="collapseExample">
                                  <i class="fa fa-chevron-down"></i>  Change Password
                                </button>

                                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePrimaryContact" id="collapsePrimaryContactButton" aria-expanded="false" aria-controls="collapseExample">
                                  <i class="fa fa-chevron-down"></i>  Change Primary Contact Information
                                </button>
                                
                                <div class="collapse" id="collapsePassword">
                                    <div class="card card-body change-password">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">
                                                        Password 
                                                        <a title="Click to auto generate random password" id="autogeneratePassword" class=""><i class="fa fa-refresh btn btn-info btn-sm p-1"> Auto Generate</i></a></label>
                                                        <input class="form-control btn-square" name="password" value="" id="password" type="text" placeholder="Type Password" data-parsley-equalto="#password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password </label>
                                                    <input class="form-control btn-square" name="password_confirmation" value="" id="password_confirmation" type="text" placeholder="Type Confirm Password" data-parsley-equalto="#password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="collapse" id="collapsePrimaryContact">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_name">Contact Name: <span class="text-danger">*</span></label>
                                                    <input class="form-control btn-square" id="contact_name" name="contact_name" value="{{ $primary_contact->name }}" type="text" placeholder="Enter Contact Name" required >
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_email">Primary Email: <span class="text-danger">*</span></label>
                                                    <input class="form-control btn-square" id="contact_email" name="contact_email" value="{{ $primary_contact->email }}" type="text" placeholder="Enter Contact Email" required>
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_phone">Phone No: <span class="text-danger">*</span></label>
                                                    <input class="form-control btn-square" id="contact_phone" name="contact_phone" value="{{ $primary_contact->phone }}" type="text" placeholder="Enter Contact Phone No" required>
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_designation">Designation <span class="text-danger">*</span></label>
                                                    <input class="form-control btn-square" id="contact_designation" name="contact_designation" value="{{  $primary_contact->designation }}" type="text" placeholder="Enter Contact Designation" required>
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            
                    {{--    <div class="card card-body">
                                <h5>Primary Contact Information: <span class="text-danger">(*)</span></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_name">Contact Name: <span class="text-danger">*</span></label>
                                            <input class="form-control btn-square" id="contact_name" name="contact_name" value="{{  $employer->contact_name }}" type="text" placeholder="Enter Contact Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_email">Primary Email: <span class="text-danger">*</span></label>
                                            <input class="form-control btn-square" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" type="text" placeholder="Enter Contact Email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Phone No: <span class="text-danger">*</span></label>
                                            <input class="form-control btn-square" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" type="text" placeholder="Enter Contact Phone No" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_designation">Designation <span class="text-danger">*</span></label>
                                            <input class="form-control btn-square" id="contact_designation" name="contact_designation" value="{{ old('contact_designation') }}" type="text" placeholder="Enter Contact Designation" required>
                                        </div>
                                    </div>

                                </div>
                            </div>  --}}

                            <button class="btn btn-success mt-2" type="submit">
                                <i class="fa fa-check"></i>   Save Information
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $("#autogeneratePassword").click(function(e){
            let password = randomPasswordGenerator(16,8);
            $("#password").val(password);
            $("#password_confirmation").val(password);
            copyStringToClipboard(password);
            new Noty({
                theme: 'relax',
                type: 'success',
                timeout: 2000,
                text: 'Password is copied to clipboard'
            }).show();
        });

        $(".types_select_multi").select2({ placeholder: "Please select business types", allowClear: true });
        $(".category_select2").select2({ placeholder: "Please select a category"});
        $(".country_select2").select2({ placeholder: "Please select a country"});
        $(".district_select2").select2({ placeholder: "Please select a district"});
        $(".upazilla_select2").select2({ placeholder: "Please select an upazilla"});

        // Collapse
        $("#collapsePasswordButton").click(function(){
           $("#collapsePrimaryContact").removeClass('show');
        });

        $("#collapsePrimaryContactButton").click(function(){
            $("#collapsePassword").removeClass('show');
        })
    </script>
@endsection