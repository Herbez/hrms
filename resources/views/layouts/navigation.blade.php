<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('/')?'active':'' }} ">
                <a href="/">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('user')?'active':'' }} ">
                <a href="/user">
                    <i class="fa fa-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="{{ Request::is('jobTitle')?'active':'' }} ">
                <a href="/jobTitle">
                    <i class="fa fa-list"></i>
                    <p>Job List</p>
                </a>
            </li>
            <li class="{{ Request::is('department')?'active':'' }} ">
                <a href="/department">
                    <i class="fa fa-building"></i>
                    <p>Departments</p>
                </a>
            </li>
            <li class="{{ Request::is('employee')?'active':'' }} ">
                <a href="/employee">
                    <i class="fa fa-users"></i>
                    <p>Employees</p>
                </a>
            </li>
           
            <li class="{{ Request::is('attendance')?'active':'' }} ">
                <a href="/attendance">
                    <i class="fa fa-clock-o"></i>
                    <p>Attendance</p>
                </a>
            </li>
          
        </ul>
    </div>
</div>