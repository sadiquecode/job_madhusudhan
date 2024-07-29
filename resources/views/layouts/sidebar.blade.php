<div class="sidebar" id="sidebar"> 
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <!-- Supper admin -->
            <ul>
                <li class="menu-title">MAIN</li>
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}"><i class="fas fa-home"></i> Dashboard</a>
                </li>


                <!-- <li class="menu-title">USERS</li>
                <li class="{{ request()->is('dashboard/customers') ? 'active' : '' }}">
                    <a href="{{url('dashboard/customers')}}"><i class="fas fa-users"></i> Students</a>
                </li> -->
                
                
                <li class="{{ request()->is('dashboard/academic') ? 'active' : '' }}">
                    <a href="{{url('dashboard/academic')}}"><i class="fas fa-arrow-right"></i> Academic</a>
                </li>
       
                
                <li class="{{ request()->is('dashboard/non_academic') ? 'active' : '' }}">
                    <a href="{{url('dashboard/non_academic')}}"><i class="fas fa-arrow-right"></i> Non Academic</a>
                </li>

                <li class="{{ request()->is('dashboard/expertise') ? 'active' : '' }}">
                    <a href="{{url('dashboard/expertise')}}"><i class="fas fa-arrow-right"></i> Expertise</a>
                </li>
                
                <li class="{{ request()->is('dashboard/speciality') ? 'active' : '' }}">
                    <a href="{{url('dashboard/speciality')}}"><i class="fas fa-arrow-right"></i> Speciality</a>
                </li>

                
                <li class="{{ request()->is('dashboard/subject') ? 'active' : '' }}">
                    <a href="{{url('dashboard/subject')}}"><i class="fa fa-arrow-right"></i> Subjects</a>
                </li>
                

                <br><br><br>
            </ul>

        </div>
    </div>
</div>