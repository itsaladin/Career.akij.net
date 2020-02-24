    <!-- footer area -->
    <section id="footer-area">
        <div class="container">
            <div class="row">
            
                <div class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                    <div class="quick-detail text-center">
                        <div class="first-widget">
                            <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" />
                            <h2>AKIJ GROUP</h2>
                            <p class="p-0 font-12">Welcome to our Service Center!</p>
                        </div>
                        <div class="social-widghet">
                            
                            <div class="social-link sociallink mt-5">
                                <p class="font-12 mb-0">
                                    Connect with Social Media
                                </p>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-linkedin"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="col-xl-4 col-lg-4 col-md-6  col-xs-6">
                    <div class="quick-address">
                        <h2>Contact us</h2>
                        <div class="quick-icon">
                            <ul>
                                <li> <span class="icon-call"> </span> +880 96131 16609 </li>
                                <li> <span class="icon-mail"> </span>  info@akij.net </li>
                                
                                <li> <span class="icon-location"> </span>  Akij House, 198 Bir Uttam, Mir Shawkat Sarak,Gulshan Link Road, Tejgaon, Dhaka-1208</span></li>

                                <li> <span class="icon-time"> </span> Sat to Thu - 9:00am to 6:00pm  (Friday Closed) </li>
                                <li> <i class="fab fa-google-play"></i> Download <img src="{{ asset('public/img/download-playstore.png') }}" class="download-play"></li>
                            </ul>
                             
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-6 col-xs-6">
                    <div class="quick-menu-footer">
                        <h2>Important Links</h2>
                    </div>
                    
                    <div class="single-widget--menu">
                        <div class="single-menu">
                            <ul>
                                <li><a href="">Contact Center</a></li>
                                <li><a href="">Trust</a></li>
                                <li><a href="">Video</a></li>
                                <li><a href="">Career</a></li>
                                <li><a href="">Book</a></li>
                                <li><a href="">Services Desk</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="single-widget--menu">
                        <div class="single-menu">
                            <ul>
                                <li><a href="">E-commerce Shop</a></li>
                                <li><a href="">Cloud Platforms</a></li>
                                <li><a href="">Learning</a></li>
                                <li><a href="">Akij Apps</a></li>
                                <li><a href="">Book</a></li>
                                <li><a href="">Survey</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- footer area -->    
     
    <!-- copy right area  -->
    <section id="copy-right">
        <div class="container">
            <div class="row">
            
                <div class="col-12">
                    <div class="copy-p">
                        <p>© Copyright © 2018 Akij Group. All rights reserved. Developed by <strong>AKIJ IT</strong></p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- copy right area  -->


    <!-- Modals -->
    @include('frontend.layouts.partials.modals.login-employeer')
    @include('frontend.layouts.partials.modals.login-jobseeker')
    @include('frontend.layouts.partials.modals.signup-jobseeker')
    <!-- Modals -->