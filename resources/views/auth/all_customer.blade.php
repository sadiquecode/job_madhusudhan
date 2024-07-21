@include('layouts.head')
<div class="main-wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">All Students</h4>
                </div>
                <?php if (Auth::user()->type == 'admin') { ?>
                <div class="col-sm-8 col-9 text-right m-b-20 d-none">
                    <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#add_customer"><i class="fa fa-plus"></i> Export CSV</a>
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
                                    <th>Status</th>
                                    <th>Date</th>
                                    {{-- <th class="text-right">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_cusromer as $index => $cusromer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ url('profile/'.Crypt::encrypt($cusromer->id)) }}">
                                            @if (empty($cusromer->profile_pic))
                                            <img src="{{ url('public/assets/img/user.jpg') }}" alt="Profile Pic" class="avatar">
                                            @else
                                            <img src="{{ url(env('img_path') . $cusromer->profile_pic) }}" alt="Profile Pic" class="avatar">
                                            @endif
                                            {{ $cusromer->name }}
                                        </a>
                                    </td>
                                    <td>{{ ucfirst($cusromer->role) }}</td>
                                    <td>{{ $cusromer->email }}</td>
                                    <td>{{ $cusromer->phone }}</td>
                                    <td>{{ ucfirst($cusromer->status) }}</td>
                                    <td>{{ date('d M, Y', strtotime($cusromer->created_at)) }}</td>
                                    {{-- <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('profile/'.Crypt::encrypt($cusromer->id)) }}"><i class="fas fa-eye m-r-5"></i> Profile</a>
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                                {{-- delete_ai_bot --}}
                                <div id="delete_user_{{ $cusromer->id }}" class="modal custom-modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content modal-md">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete AI Bot</h4>
                                            </div>
                                            <div class="modal-body card-box">
                                                <p>Are you sure you want to delete this User?</p>
                                                <div class="m-t-20">
                                                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                                    <form action="{{ route('users.destroy', ['user' => $cusromer->id]) }}" method="POST" style="display:inline">
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
                    {{-- {{ $all_cusromer->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    {{-- add_customer --}}
    <div id="add_customer" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="m-b-30">
                        <form action="{{ route('insert_customer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Name</label>
                                        <input type="text" class="form-control floating" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Email</label>
                                        <input type="text" class="form-control floating" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Phone</label>
                                        <input type="text" class="form-control floating" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label">Role</label>
                                        <select class="select form-control floating" name="type">
                                            @foreach ($role as $key =>$val)
                                            <option value="{{$val}}">{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Password</label>
                                        <input type="text" class="form-control floating" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Confirm Password</label>
                                        <input type="text" class="form-control floating" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary btn-lg">Create Customer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')