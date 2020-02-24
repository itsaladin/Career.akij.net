{{-- 
<!-- Navigation area start here -->
<section id="navigation-area" class="navigation">
    <div class="container">
        <div class="row">

            <!-- Navegation here -->
            <div class="col-xl-8 col-lg-8 col-md-9">
                <ul id="menu" class="menu">
                    <li><a class="{{ Route::is('index') ? 'actives' : '' }}" href="{{ route('index') }}"> Home </a></li>
                    <li><a class="{{ Route::is('jobs') ? 'actives' : '' }}" href="{{ route('jobs') }}">Find a job</a></li>
                    <li><a class="{{ Route::is('jobs.post') ? 'actives' : '' }}" href="#">Post a job</a></li>
                    <li><a class="{{ Route::is('trainings') ? 'actives' : '' }}" href="{{ route('trainings') }}">Training</a></li>
                    <li><a class="{{ Route::is('abouts') ? 'actives' : '' }}" href="{{ route('abouts') }}">About us</a></li>
                    <li><a class="{{ Route::is('contacts') ? 'actives' : '' }}" href="{{ route('contacts') }}">Contact us</a></li>
                </ul>
            </div>
            <!-- Navigation here -->

            <!-- social here -->
            <div class="col-xl-4 col-lg-4 col-md-3">
                <div class="social-link">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-linkedin"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <!-- social here -->

        </div>
    </div>
</section>
<!-- Navegation area end here --> --}}


<section id="navigation-area" class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('index') }}"><i class="fa fa-home"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars text-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
          {{-- <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> --}}

        <li class="nav-item"><a class="nav-link {{ Route::is('index') ? 'actives' : '' }}" href="{{ route('index') }}"> Home </a></li>
        <li><a class="nav-link {{ Route::is('jobs') ? 'actives' : '' }}" href="{{ route('jobs') }}">Find a job</a></li>
        <li><a class="nav-link {{ Route::is('jobs.post') ? 'actives' : '' }}" href="{{ route('jobs.post') }}">Post a job</a></li>
        <li><a class="nav-link {{ Route::is('trainings') ? 'actives' : '' }}" href="{{ route('trainings') }}">Training</a></li>
        <li><a class="nav-link {{ Route::is('abouts') ? 'actives' : '' }}" href="{{ route('abouts') }}">About us</a></li>
        <li><a class="nav-link {{ Route::is('contacts') ? 'actives' : '' }}" href="{{ route('contacts') }}">Contact us</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        
    </ul>
</div>
</nav>
</div>
</section>