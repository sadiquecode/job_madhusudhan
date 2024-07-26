@include('layouts.head')
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-sm-4 col-3">
    <h4 class="page-title">All Academic</h4>
</div>
<div class="col-sm-8 col-9 text-right m-b-20">
    <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#add_grade"><i class="fa fa-plus"></i> Add Academic</a>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="row">
@if (count($academic) > 0)
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped custom-table datatable"  id="teachme_table">
            <thead>
                <tr>
                    <th>S/L</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($academic as $index => $grade)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $grade->title }}</td>
                    <td>
                        @if($grade->status === 'active')
                        <span class="p-2 badge badge-primary">Active</span>
                        @else
                        <span class="p-2 badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_grade_{{ $grade->id }}"><i class="fas fa-pen m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_grade_{{$grade->id}}"><i class="far fa-trash-alt m-r-5"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <div id="delete_grade_{{$grade->id}}" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content modal-md">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Academic</h4>
                            </div>
                            <form action="{{ route('academic.destroy', $grade->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body card-box">
                                    <p>Are you sure want to delete this?</p>
                                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="edit_grade_{{ $grade->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Academic</h4>
                        </div>
                        <div class="modal-body">
                            
                            <form class="m-b-30" action="{{ route('academic.update', $grade->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control" value="{{$grade->title}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="select floating">
                                                <option value="active" @if($grade->status === 'active') selected @endif>Active</option>
                                                <option value="inactive" @if($grade->status === 'inactive') selected @endif>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-20 text-center mb-5">
                                    <button type="submit" class="btn btn-primary btn-lg">Update Academic</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
{{-- {{ $academic->links() }} --}}
</div>
@else
<p class="p-4">{{'Academic Not Found!'}}</p>
@endif
</div>
</div>
</div>
</div>
<div id="add_grade" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="modal-content modal-lg">
<div class="modal-header">
<h4 class="modal-title">Add Academic</h4>
</div>
<div class="modal-body">
<form class="m-b-30" action="{{ route('academic.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="col-form-label">Title<span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control">
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="form-group form-focus select-focus">
            <label class="focus-label">Status</label>
            <select class="select floating" name="status">
                <option value="active">Enable</option>
                <option value="inactive">Disable</option>
            </select>
        </div>
    </div>
</div>
<div class="m-t-20 text-center mb-5">
    <button type="submit" class="btn btn-primary btn-lg">Create Academic</button>
</div>
</form>
</div>
</div>
</div>
</div>
@include('layouts.footer')