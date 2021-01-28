<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

       

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="">
                        <i data-feather="calendar"></i>
                        <span> Teacher Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('teacher.profile') }}">
                        <i data-feather="user"></i>
                        <span> User Profile </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarMultilevel2" data-toggle="collapse">
                        <i data-feather="shopping-cart"></i>
                        <span> SMS </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel2">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('course.management') }}">Course Management</a>
                            </li>
                            <li>
                                <a href="{{ route('assignment.teacher') }}">Assignment</a>
                            </li>
                            <li>
                               <a href="{{ route('your.student') }}">Students</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('exam.teacher') }}">
                        <i data-feather="calendar"></i>
                        <span> Exam </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('result.calculator') }}">
                        <i data-feather="calendar"></i>
                        <span> Result Calculator </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->