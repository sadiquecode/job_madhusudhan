@include('layouts.head')
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">All Results</h4>
</div>


<div class="col-sm-12 text-right m-b-20">
        <button type="button" class="btn-sm btn btn-secondary btn-rounded m-r-5" id="toggleSelectAll"><i class="fa fa-check"></i> Select All</button>
        <a href="#" class="btn-sm btn btn-primary btn-rounded float-right m-r-5" onclick="startBulkMessaging()"><i class="fa fa-share"></i> Bulk Message</a>
        <button type="button" class="btn-sm btn btn-danger btn-rounded float-right m-r-5" onclick="startBulkDelete()"><i class="fa fa-trash"></i> Bulk Delete</button>
        <a href="#" class="btn-sm btn btn-primary btn-rounded float-right m-r-5" data-toggle="modal" data-target="#add_results"><i class="fa fa-plus"></i> Add Results</a>
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


    @if (count($sresult) > 0)
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable" id="teachme_table">
                <thead>

                <tr class="">
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Select</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">S/L</th>
                <th style="width: 10%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">R Number</th>
                <th style="width: 15%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Name</th>
                <th style="width: 10%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Phone</th>
                <th style="width: 10%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Class</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">English</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Hindi</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Maths</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Physics</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Chemistry</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Biology</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Percentage</th>
                <th style="width: 10%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Message</th>
                <th style="width: 5%; border: 1px solid #dddddd; text-align: center; padding: 8px; background-color: #000; color: #fff;">Status</th>
                <th style="width: 10%; border: 1px solid #dddddd; text-align: right; padding: 8px; background-color: #000; color: #fff;">Action</th>
            </tr>

                </thead>
                <tbody>
                    @foreach ($sresult as $index => $result)
                    <tr>
                        <td>
                            <input type="checkbox" class="select-checkbox" data-id="{{ $result->id }}" />
                        </td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->s_registration_number }}</td>
                        <td>{{ $result->s_name }}</td>
                        <td>{{ $result->s_mobile_number }}</td>
                        <td>{{ $result->s_class_section }}</td>
                        <td>{{ $result->s_subject_1 }}</td>
                        <td>{{ $result->s_subject_2 }}</td>
                        <td>{{ $result->s_subject_3 }}</td>
                        <td>{{ $result->s_subject_4 }}</td>
                        <td>{{ $result->s_subject_5 }}</td>
                        <td>{{ $result->s_subject_6 }}</td>
                        <td>{{ $result->s_percentage }}</td>
                        <td>{{ $result->s_other_message }}</td>
                        <td>
                        @if($result->status === 'active')
                            <a href="javascript:void(0)" class="p-2 badge badge-primary">Active</a>
                        @else
                        <span class="p-2 badge badge-secondary">Send</span>
                        @endif
                        </td>
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_result_{{ $result->id }}"><i class="fas fa-pen m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_result_{{$result->id}}"><i class="far fa-trash-alt m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>


                <div id="delete_result_{{$result->id}}" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content modal-md">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Result</h4>
                                </div>
                            <form action="{{ route('result.destroy', $result->id) }}" method="POST" class="d-inline">
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


                <div id="edit_result_{{ $result->id }}" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-content modal-lg">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Result</h4>
                            </div>
                            <div class="modal-body">
                                
                                <form class="m-b-30" action="{{ route('result.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">R Number<span class="text-danger">*</span></label>
                                                <input type="text" name="s_registration_number" class="form-control" value="{{$result->s_registration_number}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">S Name<span class="text-danger">*</span></label>
                                                <input type="text" name="s_name" class="form-control" value="{{$result->s_name}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">S Phone<span class="text-danger">*</span></label>
                                                <input type="text" name="s_mobile_number" class="form-control" value="{{$result->s_mobile_number}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">S Class<span class="text-danger">*</span></label>
                                                <input type="text" name="s_class_section" class="form-control" value="{{$result->s_class_section}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">SU 1<span class="text-danger">*</span></label>
                                                <input type="text" name="s_subject_1" class="form-control" value="{{$result->s_subject_1}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">SU 2<span class="text-danger">*</span></label>
                                                <input type="text" name="s_subject_2" class="form-control" value="{{$result->s_subject_2}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">SU 3<span class="text-danger">*</span></label>
                                                <input type="text" name="s_subject_3" class="form-control" value="{{$result->s_subject_3}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">SU 4<span class="text-danger">*</span></label>
                                                <input type="text" name="s_subject_4" class="form-control" value="{{$result->s_subject_4}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">SU 5<span class="text-danger">*</span></label>
                                                <input type="text" name="s_subject_5" class="form-control" value="{{$result->s_subject_5}}">
                                            </div>
                                        </div>
                                     
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">SU 6<span class="text-danger">*</span></label>
                                                <input type="text" name="s_subject_6" class="form-control" value="{{$result->s_subject_6}}">
                                            </div>
                                        </div>
                                      
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Percentage<span class="text-danger">*</span></label>
                                                <input type="text" name="s_percentage" class="form-control" value="{{$result->s_percentage}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Message<span class="text-danger">*</span></label>
                                                <textarea name="s_other_message" class="form-control"><?=$result->s_other_message?></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="m-t-20 text-center mb-5">
                                        <button type="submit" class="btn btn-primary btn-lg">Update Result</button>
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
    {{-- {{ $sresult->links() }} --}}
</div>
@else
<p class="p-4">{{'Results Not Found!'}}</p>
@endif


<!-- Progress Modal -->
<div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="progressModalLabel">Sending Messages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p id="progressText">0% Completed</p>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
</div>
<div id="add_results" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="modal-content modal-lg">
<div class="modal-header">
<h4 class="modal-title">Add Results</h4>
</div>
<div class="modal-body">
<form class="m-b-30" action="{{ route('result.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="col-form-label">Add CSV or XLSX File <span class="text-danger">*</span></label>
                <input type="file" name="result_file" class="form-control" required>
            </div>
        </div>
        
    </div>
    <div class="m-t-20 text-center mb-5">
        <button type="submit" class="btn btn-primary btn-lg">Upload Results</button>
    </div>
</form>
</div>
</div>
</div>
</div>
@include('layouts.footer')