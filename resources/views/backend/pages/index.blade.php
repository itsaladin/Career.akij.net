@extends('backend.layouts.app')

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left">
                <h3>Admin Dashboard</h3>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i data-feather="home"></i></a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('admin-content')

{{-- if (!auth()->user()->can('superadmin_dashboard.view')) {
    abort(403, 'Unauthorized action.');
} --}}
    
<div class="row">
    <div class="col-xl-8 xl-100">
        <div class="row">
        <div class="col-md-4">
            <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                <div class="media">
                    <div class="media-body">
                    <h5 class="mt-0 mb-0 f-w-600"><span class="counter">5789</span></h5>
                    <p>Total Jobs</p>
                    </div><i data-feather="tag"></i>
                </div>
                <div class="dashboard-chart-container">
                    <div class="small-chart-gradient-1"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div> <!-- end .row -->

@endsection