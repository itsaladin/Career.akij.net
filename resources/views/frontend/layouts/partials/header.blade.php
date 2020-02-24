
<!-- Header top area start -->
<section id="header-top-area">
    <div class="container">
        <div class="row">

            <!--  follo us -->
            <div class="col-xl-6 col-lg-6 col-md-7 col-7">
                <div class="left-side">
                    <p class="font-12 font-weight-light-bold">Follow Us</p>
                </div>
                <div class="right-side">
                    <div class="follow-us"> 
                        <a href=""><i class="fab fa-facebook-f header-facebook-icon"></i></a>
                        <a href=""><i class="fab fa-twitter light-gray"></i></a>
                        <a href=""><i class="fab fa-linkedin-in light-gray"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- language change -->
            <div class="col-xl-6 col-lg-6 col-md-5 col-5">
                <div class="float-right pointer" onclick="location.href='https://webmail.career.akij.net'">
                    <i class="fa fa-envelope header-webmail-icon"></i> 
                    <span class="font-12 font-weight-light-bold">
                        Webmail
                    </span>
                </div>
                <div class="clearfix"></div>
            </div>
            
        </div>
    </div>
</section>
<!-- Header top area end -->


<!-- logo area start here -->
<section id="logo-area">
    <div class="container">
        <div class="row">

            <!-- logo here -->
            <div class="col-xl-5 col-lg-5 col-md-4  col-sm-12 col-4">
                <div class="logo-here">
                    <img src="{{ asset('public/img/akij-group-logo.png') }}" class="pointer" onclick="location.href='{{ route('index') }}'"/>
                    <h2 class="pointer" onclick="location.href='{{ route('index') }}'">AKIJ CARRIER</h2>
                </div>
            </div>
            
            <!-- addres area -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-4"> 
                <div class="address-box">
                    <div class="here-icon d-none d-sm-block">
                        <span class="icon-call">  </span>
                    </div>
                    <div class="icon-detail">
                        <p>Toll Free: 08000016609</p>
                        <h3>Hot Line:16609</h3>
                    </div>
                </div> 
                <div class="address-box">
                    <div class="here-icon d-none d-sm-block"> <i class="fas fa-envelope"></i></div>

                    <div class="icon-detail">
                        <p>Email us</p>
                        <h3>career@akij.net</h3>
                    </div>
                </div>  
            </div>
            
            <!-- register/login area -->
            <div class="col-xl-3 col-lg-3 space col-md-2 col-4">
                <div class="login-area">

                    <div class="dropdown float-left">
                        <button class="btn-send btn-login" id="login-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                            <span class="icon-icon-login"></span> <span>login</span> 
                        </button>

                        <div class="dropdown-menu login-dropdown-menu" aria-labelledby="login-dropdown">
                            <a class="dropdown-item jobseeker-signin-button" href="#">
                                <span class="float-left login-left-icon">
                                    <i class="fas fa-user nav-login-icon-jobseeker"></i>
                                </span>
                                <span class="login-text">
                                    JobSeeker Login 
                                </span>
                                <i class="float-right fa fa-chevron-circle-right nav-login-icon-arrow login-right-icon "></i>
                            </a>

                            <a class="dropdown-item employeer-signin-button" href="#">
                                <span class="float-left login-left-icon">
                                    <i class="fas fa-user-tie nav-login-icon-employeer"></i>
                                </span>
                                <span class="login-text">
                                    Employeer Login 
                                </span>
                                <i class="float-right fa fa-chevron-circle-right nav-login-icon-arrow login-right-icon "></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="dropdown float-left">
                        <button class="btn-send users btn-signup" id="signup-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <span class="icon-icon-user"></span> Sign Up
                        </button>
                        <div class="dropdown-menu signup-dropdown-menu" aria-labelledby="signup-dropdown">
                            <a class="dropdown-item jobseeker-signup-button" href="#">
                                <span class="float-left signup-left-icon">
                                    <i class="fas fa-user nav-signup-icon-jobseeker"></i>
                                </span>
                                <span class="signup-text">
                                    JobSeeker Signup 
                                </span>
                                <i class="float-right fa fa-chevron-circle-right nav-signup-icon-arrow signup-right-icon "></i>
                            </a>

                            {{-- <a class="dropdown-item" href="#">
                                <span class="float-left signup-left-icon">
                                    <i class="fas fa-user-tie nav-signup-icon-employeer"></i>
                                </span>
                                <span class="signup-text">
                                    Employeer Signup 
                                </span>
                                <i class="float-right fa fa-chevron-circle-right nav-signup-icon-arrow signup-right-icon "></i>
                            </a> --}}
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- logo area end here -->
