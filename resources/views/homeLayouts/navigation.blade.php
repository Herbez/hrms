<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                HRMS
            </a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('/')?'active':'' }} ">
                <a href="/">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <hr>
            <li class="{{ Request::is('userAttendance')?'active':'' }} ">
                <a href="/userAttendance">
                    <i class="fa fa-clock-o"></i>
                    <p>Attendance</p>
                </a>
            </li>

        </ul>
    </div>
</div>
