<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper"><a href="index.html"><img src="{{ asset('public/backend/images/logo-sm.png') }}" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
        <div><img class="img-60 rounded-circle" src="{{ asset('public/backend/images/user/1.jpg') }}" alt="#">
        <div class="profile-edit"><a href="#" target="_blank"><i data-feather="edit"></i></a></div>
        </div>
        <h6 class="mt-3 f-14">{{ Auth::guard('admin')->user()->name }}</h6>
        <p></p>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ Route::is('admin.index') ? 'active' : '' }}"><a class="sidebar-header" href="{{ route('admin.index') }}"><i data-feather="home"></i><span> Dashboard</span></a></li>

        <li class="{{ (Route::is('admin.employers.index')) || (Route::is('admin.employers.create')) ? 'active' : '' }}"><a class="sidebar-header" href="#"><i data-feather="user"></i><span>Employers</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li class="{{ (Route::is('admin.employers.index')) ? 'active' : '' }}"><a href="{{ route('admin.employers.index') }}" ><i class="fa fa-chevron-right"></i> Employer List</a></li>
                <li class="{{ (Route::is('admin.employers.create')) ? 'active' : '' }}"><a href="{{ route('admin.employers.create') }}" ><i class="fa fa-chevron-right"></i> Add New Employer</a></li>
            </ul>
        </li>

        <li class="{{ (Route::is('admin.jobs.index')) || (Route::is('admin.jobs.create')) ? 'active' : '' }}"><a class="sidebar-header" href="#"><i data-feather="chevron-right"></i><span>Jobs</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li class="{{ (Route::is('admin.jobs.index')) ? 'active' : '' }}"><a href="{{ route('admin.jobs.index') }}" ><i class="fa fa-chevron-right"></i> All Job List</a></li>
                <li class="{{ (Route::is('admin.jobs.create')) ? 'active' : '' }}"><a href="{{ route('admin.jobs.create') }}" ><i class="fa fa-chevron-right"></i> Add New Job</a></li>
            </ul>
        </li>

        <li class="{{ (Route::is('admin.category.index')) || (Route::is('admin.category.create')) ? 'active' : '' }}"><a class="sidebar-header" href="#"><i data-feather="chevron-right"></i><span>Manage Category</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li class="{{ (Route::is('admin.category.index')) ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}" ><i class="fa fa-chevron-right"></i> All Category List</a></li>
                <li class="{{ (Route::is('admin.category.create')) ? 'active' : '' }}"><a href="#" ><i class="fa fa-chevron-right"></i> Add New Category</a></li>
            </ul>
        </li>

        {{-- <li class=" "><a class="sidebar-header" href="#"><i data-feather="chevron-right"></i><span>Manage Category</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li class=""><a href="{{ route('admin.category.index') }}" ><i class="fa fa-chevron-right"></i> All Category List</a></li>
                <li class=""><a href="{{ route('admin.category.create') }}" ><i class="fa fa-chevron-right"></i> Add New Category</a></li>
            </ul>
        </li> --}}

        <li class=" "><a class="sidebar-header" href="#"><i data-feather="chevron-right"></i><span>Job Qualifications</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li class=""><a href="{{ route('admin.degree_level.index') }}" ><i class="fa fa-chevron-right"></i> Degree levels</a></li>
                <li class=""><a href="{{ route('admin.degree.index') }}" ><i class="fa fa-chevron-right"></i> Degrees</a></li>
            </ul>
        </li>

        <li><a class="sidebar-header" href="" target="_blank"><i data-feather="settings"></i><span> Settings</span></a></li>
    </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->