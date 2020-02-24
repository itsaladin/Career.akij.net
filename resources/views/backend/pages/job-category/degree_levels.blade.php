@extends('backend.layouts.app')

@section('top-content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <div class="page-header-left float-left">
                <h3>Degree Level List</h3>
            </div>
            <div class="float-right">
                <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                    <i class="fa fa-plus-circle"></i> Add New Degree Levels
                </a>

                <!-- Modal HTML Markup -->
                <div id="ModalLoginForm" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Degree Level </h3>category
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="{{ route('admin.degree_level.create') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="control-label"> Add Level</label>
                                        <div>
                                            <input type="text" class="form-control input-lg" name="name" placeholder="Level Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-success" >
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
@endsection

@section('admin-content')

<div class="row">
    <div class="col-xl-12 xl-100">
            @include('backend.layouts.partials.messages')
            <div class="table-responsive product-table">
                <table class="display" id="emploersDataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Degree Levels Name</th>
                            <th> Action  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($degreelevel as $dgree_levels)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $dgree_levels->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#EditModal{{ $dgree_levels->id }}" data-toggle="modal" ><i class="fa fa-edit"></i> Edit</a>
                                      <a class="dropdown-item" href="#"><i class="fa fa-print"></i>   Print</a>
                                      <a class="dropdown-item" href="#deleteModal{{ $dgree_levels->id }}" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>

                        <!-- Edit Modal  -->
                        <div id="EditModal{{  $dgree_levels->id }}" class="modal fade active">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add New Degree  </h3>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="POST" action="{{ route('admin.degree_level.update',$dgree_levels->id) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('put')
                                            <div class="form-group">
                                                <label class="control-label">Degree Levels Name</label>
                                                <div>
                                                <input type="text" value="{{ $dgree_levels->name}}" class="form-control input-lg" name="name" placeholder="degree Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success" >
                                                        Update Degree Level
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Edit modal-->

                        <!-- Delete Modal -->
                        <div class="modal fade delete-modal" id="deleteModal{{ $dgree_levels->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Employer all informations (employer profile and jobs) will be deleted. Please be sure first to delete.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.degree_level.destroy', $dgree_levels->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i> Confirm Delete</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    </form>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal -->

                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('#emploersDataTable').DataTable();
    </script>
@endsection