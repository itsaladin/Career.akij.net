
<!-- The Login Modal (loginModalJobSeeker) -->
<div class="modal loginModal" id="signupModalJobSeeker">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body text-center">
        
        <button type="button" class="close-modals close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <div>
          <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" style="width: 50px">
        </div>
        <h5 class="title">AKIJ GROUP</h5>
        <p class="text-muted">
          CAREER
        </p>

        <div class="login-title">
          Sign Up - JobSeeker
        </div>
        
        <div id="form_result"></div>
        
        {{-- @include('backend.layouts.partials.messages') --}}

        <div class="row justify-content-center">
          <div class="col-md-10">
          
          <form action="{{ route('job_seeker.signup')}}" method="post" id="jobSeekerSignupForm" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="row">
                <div class="col-md-6">

                  <input type="text" name="fName" class="form-control mt-4" aria-label="" placeholder="First Name">
                  <input type="text" name="lName" class="form-control mt-2" aria-label="" placeholder="Last Name">

                  <input type="text" name="userName" class="form-control mt-2" aria-label="" placeholder="Username">

                  <input type="email" name="email" class="form-control mt-2" aria-label="" placeholder="Email">

                  <div class="row text-left mt-2">
                    <div class="col-6"> 
                      <label for="gender"><input type="radio" name="gender" id="gender" value="1"> Male</label>
                    </div>
                    <div class="col-6">
                      <label for="gender-female"><input type="radio" name="gender" id="gender-female" value="0"> Female</label>
                    </div>
                  </div>

                  <input type="text" name="password" class="form-control mt-1" aria-label="" placeholder="Password">

                  <input type="text" name="rePassword" class="form-control mt-2" aria-label="" placeholder="Confirm Password">
                </div>
                <div class="col-md-6">
                  <div class="row mt-4">
                    <div class="col-6">
                      <img src="{{ asset('public/img/capcha.png') }}" alt="">
                    </div>
                    <div class="col-6 mt-2">
                      <i class="fa fa-redo font-20 mb-2"></i>
                      <br>
                      Refresh
                    </div>
                    <div class="col-12 mt-2">
                      <input type="text" name="captureCode" class="form-control p-2" placeholder="Type Captcha Code">
                    </div>
                  </div>

                  <div class="form-group text-left font-12 mt-5">
                    <div class="form-check">
                      <input class="form-check-input" name="termsCondition" type="checkbox" id="agree-terms-signup">
                      <label class="form-check-label mt-1" for="agree-terms-signup">
                        I agree to the terms and conditions
                      </label>
                    </div>
                  </div>
                  <div>
                    <button class="btn btn-primary btn-block" type="submit">
                      Submit
                    </button>
                    <p class="font-12 mt-1">
                      Already have an account <a onclick="openLoginJobSeeker()" href="#" data-toggle="modal">Login !</a>
                    </p>
                  </div>

                </div>
              </div>

            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div> <!-- End Job Seeker Login -->

{{-- @section('scripts') --}}

 {{-- @endsection --}}