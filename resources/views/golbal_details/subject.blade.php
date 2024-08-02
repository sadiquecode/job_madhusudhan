@include('layouts.head')
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">All Subject</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#add_subject"><i class="fa fa-plus"></i> Add Subject</a>
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
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    @if (count($TeachmeSubject) > 0)
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable" id="teachme_table">
                <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Type</th>
                        <th>Speciality</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TeachmeSubject as $index => $subject)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $subject->speciality->dataType->title }}</td>
                    <td>{{ $subject->speciality->title }}</td>
                    <td>{{ $subject->title }}</td>
                        <td>
                            @if($subject->status === 'active')
                            <span class="p-2 badge badge-primary">Active</span>
                            @else
                            <span class="p-2 badge badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_subject_{{ $subject->id }}"><i class="fas fa-pen m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_subject_{{$subject->id}}"><i class="far fa-trash-alt m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div id="delete_subject_{{$subject->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content modal-md">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Subject</h4>
                                </div>
                                <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" class="d-inline">
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

                <div id="edit_subject_{{ $subject->id }}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Subject</h4>
            </div>
            <div class="modal-body">
                <form class="m-b-30" action="{{ route('subject.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Type</label>
                                <select class="select floating" name="data_types_id" id="data_types_id_{{ $subject->id }}">
                                    @foreach ($Datatypes as $key)
                                        <option value="{{ $key->id }}" @if ($subject->data_types_id == $key->id) selected @endif>{{ ucfirst($key->title) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Speciality</label>
                                <select class="select floating" name="speciality_id" id="speciality_id_{{ $subject->id }}">
                                    @foreach ($Speciality as $key)
                                        @if ($key->data_types_id == $subject->data_types_id)
                                            <option value="{{ $key->id }}" @if ($subject->speciality_id == $key->id) selected @endif>{{ ucfirst($key->title) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $subject->title }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="select floating">
                                    <option value="active" @if($subject->status === 'active') selected @endif>Active</option>
                                    <option value="inactive" @if($subject->status === 'inactive') selected @endif>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center mb-5">
                        <button type="submit" class="btn btn-primary btn-lg">Update Subject</button>
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
    {{-- {{ $TeachmeSubject->links() }} --}}
</div>
@else
<p class="p-4">{{'Subject Not Found!'}}</p>
@endif
</div>
</div>
</div>
</div>
<div id="add_subject" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="modal-content modal-lg">
<div class="modal-header">
<h4 class="modal-title">Add Subject</h4>
</div>
<div class="modal-body">
<form class="m-b-30" action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">



       
<div class="col-sm-12">
    <div class="form-group form-focus select-focus">
        <label class="focus-label">Type</label>
        <select class="select floating" name="data_types_id" id="data_types_id">
            <option value="" disabled selected>Select Type</option>
            @foreach ($Datatypes as $datatype)
                <option value="{{ $datatype->id }}">{{ ucfirst($datatype->title) }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group form-focus select-focus">
        <label class="focus-label">Speciality</label>
        <select class="select floating" name="speciality_id" id="speciality_id">
            <option value="" disabled selected>Select Speciality</option>
            <!-- Options will be populated dynamically -->
        </select>
    </div>
</div>


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
        <button type="submit" class="btn btn-primary btn-lg">Create Subject</button>
    </div>
</form>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if(isset($subject))
<script>
    $(document).ready(function() {
        $('#data_types_id_{{ $subject->id }}').on('change', function() {
            loadSpecialities({{ $subject->id }});
        });
    });
</script>
@endif

<script>

    function loadSpecialities(subjectId) {
        const dataTypeId = $(`#data_types_id_${subjectId}`).val();
        const base_url = "{{ url('/') }}";
        
        if (dataTypeId) {
            $.ajax({
                url: `${base_url}/get-specialities/${dataTypeId}`,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $(`#speciality_id_${subjectId}`).empty();
                    $(`#speciality_id_${subjectId}`).append('<option value="" disabled selected>Select Speciality</option>');
                    $.each(data, function(key, value) {
                        $(`#speciality_id_${subjectId}`).append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        } else {
            $(`#speciality_id_${subjectId}`).empty();
            $(`#speciality_id_${subjectId}`).append('<option value="" disabled selected>Select Speciality</option>');
        }
    }
</script>



@include('layouts.footer')