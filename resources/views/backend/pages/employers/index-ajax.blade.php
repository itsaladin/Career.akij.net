@extends('backend.layouts.app')

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>Employer Lists</h3>
            </div>
            <div class="float-right">
                <a href="{{ route('admin.employers.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> Add New Employer
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
@endsection

@section('admin-content')

<div class="row">
    <div class="col-xl-12 xl-100">
            <div class="table-responsive product-table">
                <table class="display" id="emploersDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var datatable = $('#emploersDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('api.all_employers_data') }}",
            columnDefs: [
                {
                    "targets": [2,3],
                    "orderable": false,
                    "searchable": false
                } 
            ],
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                {
                    data: 'logo',
                    "render": function(data, type, row) {
                            return '<img src="'+data+'" class="img img-thumbnail" style="width: 100px"/>';
                        }
                },
                { data: 'email', name: 'email' },
                { data: 'address', name: 'address' },
                { data: 'action', name: 'action'}
            ]
        });
        
    </script>
@endsection