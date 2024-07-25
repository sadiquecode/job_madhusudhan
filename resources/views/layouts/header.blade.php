<div class="header">
    <div class="header-left">
        <a href="{{url('/dashboard')}}" class="logo" style="color:black; font-size:30px;font-family: Arial, sans-serif; font-wfont-weight:bold;">
        Jobee!
            <!-- <img src="" width="100" height="50" alt=""> -->
        </a>
    </div>
    <div class="page-title-box float-left d-none">
        <h3>hello</h3>
    </div>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <ul class="nav user-menu float-right">
        
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    @if (empty(Auth::user()->profile_pic))
                    <img class="rounded-circle" src="{{ url('public/assets/img/user.jpg') }}" width="40" alt="Admin">
                    @else
                    <img class="rounded-circle" src="{{ url(env('img_path'). Auth::user()->profile_pic) }}" width="40" height="40" alt="Admin">
                    @endif
                    
                    <span class="status online"></span>
                </span>
                <span><?=ucfirst(Auth::user()->name)?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('edit-profile/'.encrypt(Auth::user()->id)) }}">Account Setting</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ url('edit-profile/'.encrypt(Auth::user()->id)) }}">Account Setting</a>
            <a class="dropdown-item" href="{{ url('public/profile/login') }}">Logout</a>
        </div>
    </div>
</div>