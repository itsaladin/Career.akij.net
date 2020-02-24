
<!-- The Login Modal (loginModalEmployeer) -->
<div class="modal loginModal" id="loginModalEmployeer">
  <div class="modal-dialog modal-dialog-centered">
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
          Employeer Login
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8">
            <form action="" method="post" id="employeerLoginForm">

              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-user"></i>
                  </span>
                </div>
                <input type="text" class="form-control bl-none" aria-label="" placeholder="Username">
              </div>

              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input type="text" class="form-control bl-none" aria-label="" placeholder="Password">
              </div>
              <div class="float-right mt-1 font-12">
                <a href="">Forgot Password</a>
              </div>
              <div class="clearfix"></div>

              <div class="form-group text-left font-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label mt-1" for="gridCheck">
                    Remember Me
                  </label>
                </div>
              </div>
              
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <button class="btn btn-primary btn-block" type="submit">
                    Submit
                  </button>
                  <div>
                    {{-- <p class="font-12 mt-1">
                      No account ? <a href="#" onclick="openSignupJobSeeker()" data-toggle="modal">Create One !</a>
                    </p> --}}
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div> <!-- End Employeer Login -->
