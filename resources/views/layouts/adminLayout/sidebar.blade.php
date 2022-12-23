<!--**********************************
Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Doctor</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/add-doctor')}}">Add Doctors</a></li>
                            <li><a href="{{ url('/view-doctor')}}">View Doctors</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Appointments</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/view-appointments')}}">View Appointments</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->