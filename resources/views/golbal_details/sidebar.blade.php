<div class="sidebar" id="sidebar"> 
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="">
                <li class="">
                    <a href="{{url('/')}}" target="_blank"><i class="fa fa-globe"></i>Website</a>
                </li>
            </ul>
            <!-- Supper admin -->
            <ul>
                <li class="menu-title">MAIN</li>
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>


                <li class="menu-title">USERS</li>
                <li class="{{ request()->is('dashboard/customers') ? 'active' : '' }}">
                    <a href="{{url('dashboard/customers')}}"><i class="fas fa-users"></i> Students</a>
                </li>
                <li class="{{ request()->is('dashboard/tutor') ? 'active' : '' }}">
                    <a href="{{url('dashboard/tutor')}}"><i class="fas fa-graduation-cap"></i> Tutors</a>
                </li>

                <li class="menu-title">Global</li>
                <li class="{{ request()->is('dashboard/location') ? 'active' : '' }}">
                    <a href="{{url('dashboard/location')}}"><i class="fas fa-compass"></i> Locations</a>
                </li>

                <li class="{{ request()->is('dashboard/subject') ? 'active' : '' }}">
                    <a href="{{url('dashboard/subject')}}"><i class="fas fa-book"></i> Subjects</a>
                </li>
                <li class="{{ request()->is('dashboard/grade') ? 'active' : '' }}">
                    <a href="{{url('dashboard/grade')}}"><i class="fas fa-ribbon"></i> Grades</a>
                </li>
                <li class="{{ request()->is('dashboard/curriculum') ? 'active' : '' }}">
                    <a href="{{url('dashboard/curriculum')}}"><i class="fas fa-school"></i> Curriculums</a>
                </li>
                <li class="{{ request()->is('dashboard/review') ? 'active' : '' }}">
                    <a href="{{url('dashboard/review')}}"><i class="fas fa-comments"></i> Reviews</a>
                </li>

                <li class="{{ request()->is('all_languages') ? 'active' : '' }}">
                    <a href="{{url('all_languages')}}"><i class="fas fa-language"></i> Languages</a>
                </li>

                <li class="{{ request()->is('dashboard/package') ? 'active' : '' }}">
                    <a href="{{url('dashboard/package')}}"><i class="fas fa-box-open"></i> Packages</a>
                </li>

                <li class="{{ request()->is('dashboard/payment') ? 'active' : '' }}">
                    <a href="{{url('dashboard/payment')}}"><i class="fas fa-credit-card"></i> Payments</a>
                </li>

                <li class="{{ request()->is('dashboard/contacts') ? 'active' : '' }}">
                    <a href="{{url('dashboard/contacts')}}"><i class="fas fa-sms"></i> Inquiries</a>
                </li>



                

                <li class="menu-title d-none">MANAGE CONTENTS</li>
                <li class="submenu  d-none">
                    <a href="#"><i class="fas fa-home"></i> <span> Home Page</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                    <li><a href="{{ url('dashboard/menu') }}">Menus</a></li>
                    <li><a href="{{ url('dashboard/slider') }}">Slider</a></li>
                    <li><a href="{{ url('about-page') }}">Other Pages</a></li>
                    {{-- <li><a href="{{ url('web_features_list') }}">{{ __('trans.features list') }}</a></li>
                        <li><a href="{{ url('web_faq') }}">{{ __('trans.faq') }}</a></li> --}}
                    </ul>
                </li>
                {{-- <li class="">
                    <a href="index.html"><i class="fas fa-tags"></i> Tags</a>
                </li> --}}
                
                {{-- <li class="submenu">
                    <a href="#"><i class="fas fa-cube"></i> <span> {{ __('trans.blogs') }}</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('web_blog') }}">{{ __('trans.all blog') }}</a></li>
                        <li><a href="{{ url('web_category') }}">{{ __('trans.categories') }}</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">MANAGE SETTINGS</li>
                <li>
                    <a href="{{url('dashboard/settings/general-settings')}}"><i class="fas fa-cog"></i> General</a>
                </li>
                <li class="d-none">
                    <a href="{{url('all_languages')}}"><i class="fas fa-language"></i> Languages</a>
                </li>
                <br><br><br>
            </ul>

        </div>
    </div>
</div>