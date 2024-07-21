@include('layouts.head')
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-sm-4 col-3">
    <h4 class="page-title">All Tutors</h4>
</div>
<?php if (Auth::user()->type == 'admin') { ?>
<div class="col-sm-8 col-9 text-right m-b-20 d-none">
    <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#add_customer"><i class="fa fa-plus"></i> Add Tutors</a>
    <div class="view-icons d-none">
        <a href="clients.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
        <a href="clients-list.html" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
    </div>
</div>
<?php } ?>
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
<form method="GET" action="{{ url('dashboard/customers') }}" class="d-none">
<div class="row filter-row">
<div class="col-sm-6 col-md-9">
    <div class="form-group form-focus">
        <label class="focus-label">Search by Name, Email and phone</label>
        <input type="text" class="form-control floating" name="search">
    </div>
</div>
<div class="col-sm-6 col-md-3">
    <button class="btn btn-success btn-block"> Search </button>
</div>
</div>
</form>

<div class="row staff-grid-row">
<div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable" id="teachme_table">
                            <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Approval Status</th>
                                    {{-- <th>Verification Status</th> --}}
                                    <th>Date</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutors as $index => $tutor)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ url('profile/'.Crypt::encrypt($tutor->id)) }}">
                                        @if (empty($tutor->profile_pic))
                                        <img src="{{ url('public/assets/img/user.jpg') }}" alt="Profile Pic" class="avatar">
                                        @else
                                        <img src="{{ url(env('img_path') . $tutor->profile_pic) }}" alt="Profile Pic" class="avatar">
                                        @endif
                                        {{ $tutor->name }}
                                        </a>
                                    </td>
                                    <td>{{ ucfirst($tutor->role) }}</td>
                                    <td>{{ $tutor->email }}</td>
                                    <td>{{ $tutor->phone }}</td>
                        <td>
                            @if ($tutor->askforapproval == 'ask')
                                <span class="bg-secondary p-1 text-white">Process</span>
                            @elseif($tutor->askforapproval == 'asked')
                            <span class="bg-warning p-1 text-white">Approval Requested</span>
                            @else
                            <span class="bg-success p-1 text-white">Approved</span>
                            @endif
                        </td>
                        {{-- <td>
                            @if ($tutor->verification_status == 0)
                                <span class="bg-secondary p-1 text-white">Unverified</span>
                            @else
                            <span class="bg-info p-1 text-white">Verified</span>
                            @endif
                        </td> --}}
                                    <td>{{ date('d M, Y', strtotime($tutor->created_at)) }}</td>


                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('profile/'.Crypt::encrypt($tutor->id)) }}"><i class="fas fa-eye m-r-5"></i> Profile</a>

                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user_{{$tutor->id}}"><i class="far fa-trash-alt m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


{{-- delete_ai_bot --}}
<div id="delete_user_{{ $tutor->id }}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Delete Tutor</h4>
            </div>
            <div class="modal-body card-box">
                <p>Are you sure you want to delete this Tutor?</p>
                <div class="m-t-20">
                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <form action="{{ route('tutor.destroy', ['tutor' => $tutor->id]) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
                {{-- {{ $tutors->links() }} --}}
            </div>

</div>

</div>
</div>

</div>
@include('layouts.footer')



