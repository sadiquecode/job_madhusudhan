@include('layouts.head')
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
        <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Edit Profile</h4>
                </div>
            </div>


            @include('theme_1.userprofile.message')


            <form action="{{ route('update_profile.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="param" value="main">
                <input type="hidden" name="description" value="">
                <input type="hidden" name="video_url" value="">
                <input type="hidden" name="virtual_mode" value="">
                <input type="hidden" name="in_person_mode" value="">
                <input type="hidden" name="zip_code" value="">
                <div class="card-box">
                    <h3 class="card-title">Basic Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                            @if (empty($user->profile_pic))
                                <img class="inline-block" src="{{ url('public/assets/img/user.jpg') }}" alt="user">
                                @else
                                <img class="inline-block" src="{{ url(env('img_path'). $user->profile_pic) }}" alt="user" id="preview">
                                @endif
                                <div class="fileupload btn">
                                    <span class="btn-text">Change</span>
                                    <input class="upload" type="file" name="profile_pic" onchange="previewImage(event, 'preview')">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">First Name</label>
                                            <input type="text" name="name" class="form-control floating" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control floating" value="{{$user->lname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Email</label>
                                            <input type="email" class="form-control floating" name="email" value="{{$user->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Phone</label>
                                            <input type="text" class="form-control floating" name="phone" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right m-t-20 mb-4">
                    <button class="btn btn-primary btn-lg" type="submit">Update Profile</button>
                </div>
            </form>

                <form action="{{ route('update_profile.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="param" value="reset_password">
                <div class="card-box">
                    <h3 class="card-title">Reset Password</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-focus">
                                <label class="focus-label">Old Password</label>
                                <input type="password" class="form-control floating" name="oldpassword" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-focus">
                                <label class="focus-label">New Password</label>
                                <input type="password" class="form-control floating" name="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-focus">
                                <label class="focus-label">Confirm Password</label>
                                <input type="password" class="form-control floating" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text-right m-t-20">
                    <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>



@include('layouts.footer')