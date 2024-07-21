<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('dashboard') }}"><i class="fa fa-home back-icon"></i> Back to Home</a>
                </li>
                <li class="menu-title">Settings</li>
                <li class="@if ($url == 'general-settings') {{'active'}} @endif">
                    <a href="{{url('dashboard/settings/general-settings')}}">General</a>
                </li>
            </ul>
        </div>
    </div>
</div>