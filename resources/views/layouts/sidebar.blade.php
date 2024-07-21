<div class="sidebar" id="sidebar"> 
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <!-- Supper admin -->
            <ul>
                <li class="menu-title">MAIN</li>
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>


                <!-- <li class="menu-title">USERS</li>
                <li class="{{ request()->is('dashboard/customers') ? 'active' : '' }}">
                    <a href="{{url('dashboard/customers')}}"><i class="fas fa-users"></i> Students</a>
                </li> -->
                

                <li class="{{ request()->is('dashboard/result') ? 'active' : '' }}">
                    <a href="{{url('dashboard/result')}}"><i class="fas fa-school"></i> Results</a>
                </li>
               
                

                <br><br><br>
            </ul>

        </div>
    </div>
</div>